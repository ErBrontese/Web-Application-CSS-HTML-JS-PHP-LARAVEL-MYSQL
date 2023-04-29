<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Omnipay\Omnipay;
use App\Models\Shopping;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{

    private $gateway;
    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Express');
        $this->gateway->setUsername(config('services.paypal.username'));
        $this->gateway->setPassword(config('services.paypal.password'));
        $this->gateway->setSignature(config('services.paypal.signature'));
        $this->gateway->setTestMode(true);
    }


    public function pay(Request $request)
    {

        $array = request('array');
        $total = request('total');
        $countElement = request('countElement');
        $idCartUtente = request('idCartUtente');


        Session::put('array', $array);
        Session::put('total', $total);
        Session::put('countElement', $countElement);
        Session::put('idCartUtente', $idCartUtente);



        try {

            $response = $this->gateway->purchase(
                array(
                    'amount' => $request->amount,
                    'currency' => env('PAYPAL_CURRENCY'),
                    'returnUrl' => url('success'),
                    'cancelUrl' => url('error')
                )
            )->send();

            if ($response->isRedirect()) {

                $response->redirect();
            } else {
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function success(Request $request)
    {
        $array = Session::get('array');
        $total = Session::get('total');
        $countElement = Session::get('countElement');
        $idCartUtente = Session::get('idCartUtente');


        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(
                array(
                    'payer_id' => $request->input('PayerID'),
                    'transactionReference' => $request->input('paymentId')
                )
            );

            $response = $transaction->send();

            if ($response->isSuccessful()) {

                $idClient = DB::table('carts')
                    ->where('id', $idCartUtente)
                    ->value('clientCarts_id');

                $arr = $response->getData();

                $payment = new Payment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];
                $payment->id_Utente = $idClient;

                $payment->save();

                $exploded = preg_split('/[-\D]/', $array);
                foreach ($exploded as $index) {
                    if (!empty($index)) {

                        //Id carello del utente 
                        $cart_id = DB::table('cart_products')
                            ->where('id', $index)
                            ->value('cart_id');
                        //Id prodotto 
                        $product_id = DB::table('cart_products')
                            ->where('id', $index)
                            ->value('product_id');

                        //   ALTER TABLE shoppings DROP FOREIGN KEY cart_product_id;

                        $shopping = new Shopping;
                        $shopping->totale = $total;
                        $shopping->cart_id = $cart_id;
                        $shopping->product_id = $product_id;
                        $shopping->save();
                        $quantita = DB::table('cart_products')
                            ->where('id', $index)
                            ->value('quantità');

                        DB::table('cart_products')
                            ->join('products', 'cart_products.product_id', '=', 'products.id')
                            ->select('cart_products.quantità', 'products.quantitaProdotto')
                            ->where('cart_products.id', $index)
                            ->decrement('products.quantitaProdotto', $quantita);


                        DB::table('cart_products')
                            ->where('cart_products.id', $index)
                            ->delete();


                    }
                }


                $msgStatus = 'La transazione è andata a buon fine';
                $status = 1;
                $success=1;
                Session::put('msgStatus', $msgStatus);
                Session::put('status', $status);
                Session::put('success', $success);


                return redirect('/');



            } else {
                return $response->getMessage();

            }
        } else {
            $msgStatus = 'La transazione non è andata  a buon fine';
            $status = 1;
            $success=0;
            Session::put('msgStatus', $msgStatus);
            Session::put('status', $status);
            Session::put('success', $success);
          
            return redirect('/');

        }
    }

    public function error()
    {
        return 'User declined the payment!';
        
    }

}