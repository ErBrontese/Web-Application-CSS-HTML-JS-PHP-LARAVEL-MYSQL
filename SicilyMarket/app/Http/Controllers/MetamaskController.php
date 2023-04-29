<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Shopping;

class MetamaskController extends Controller
{
    
    public function create(Request $request)
    {   
        $array = Session::get('array');
        $total = Session::get('total');
        $countElement = Session::get('countElement');
        $idCartUtente = Session::get('idCartUtente');
        
        $idClient= DB::table('carts')
                        ->where('id',$idCartUtente)
                        ->value('clientCarts_id');

        $txHash = $request->txHash;
    
        Transaction::create([
            "txHash" => $request->txHash,
            "amount" => $request->amount,
        ]);
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln("<info>Ciao1</info>");

        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
                            $output->writeln("<info>$idClient</info>");

        DB::table('transactions')
                     ->where('txHash', $txHash)
                    ->update(['id_utente' =>  $idClient]);
                    $output = new \Symfony\Component\Console\Output\ConsoleOutput();
                    $output->writeln("<info>Ciao3</info>");
                    $exploded = preg_split('/[-\D]/', $array); 
                    
                    foreach($exploded as $index){ 
                        if(!empty($index)){
                            $output = new \Symfony\Component\Console\Output\ConsoleOutput();
                            $output->writeln("<info>Ciao2</info>");
                    
                            
                        //Id carello del utente 
                        $cart_id= DB::table('cart_products')
                            ->where('id',$index)
                            ->value('cart_id');
                        //Id prodotto 
                        $product_id= DB::table('cart_products')
                            ->where('id',$index)
                            ->value('product_id');
    
                         //   ALTER TABLE shoppings DROP FOREIGN KEY cart_product_id;
    
                        $shopping = new Shopping;
                        $shopping->totale=$total;
                        $shopping->cart_id=$cart_id;
                        $shopping->product_id=$product_id;
                        $shopping->save();
                        $quantita= DB::table('cart_products')
                                      ->where('id',$index)
                                      ->value('quantità');
                        
                        DB::table('cart_products')
                            ->join('products', 'cart_products.product_id', '=', 'products.id')
                            ->select('cart_products.quantità','products.quantitaProdotto')
                            ->where('cart_products.id',$index)
                            ->decrement('products.quantitaProdotto',$quantita);
    
    
                        DB::table('cart_products')
                            ->where('cart_products.id',$index)
                            ->delete();
                        }
                    }

        $stato=DB::table('transactions')
                ->where('txHash', $txHash)
                ->value('status');
        
       
        if($stato == 1){
            $msgStatus='La transazione è andata a buon fine';
            $status=1;
            $success=1;
            Session::put('msgStatus', $msgStatus);
            Session::put('status', $status);
            Session::put('success', $success);
        }else{
            $msgStatus='La transazione non è andata  a buon fine';
            $status=1;
            $success=0;
            Session::put('msgStatus', $msgStatus);
            Session::put('status', $status);
            Session::put('success', $success);
        }
    }
}
