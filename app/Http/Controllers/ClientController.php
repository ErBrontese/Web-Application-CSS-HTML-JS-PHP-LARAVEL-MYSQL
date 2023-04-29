<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Models\Cart;
use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;





class ClientController extends Controller
{


    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }


    

    public function create()
    {
        $countProdotti="";
        $idCart="";
        return view('clients.register' ,compact('countProdotti','idCart'));
    }

    function CountReview($productID)
    {
        $array = [];
       
        $exploded = preg_split('/[-\D]/', $productID);

        foreach ($exploded as $index) {
            if (!empty($index)) {
                

                $reviewslist = Review::where('product_id', '=', $index)->get();
                $reviewCount = $reviewslist->count();

                $reviewslist5 = Review::where('product_id', '=', $index)
                    ->where('votes', '=', 5)
                    ->get();
                $reviewCount5 = $reviewslist5->count();

                $reviewslist4 = Review::where('product_id', '=', $index)
                    ->where('votes', '=', 4)
                    ->get();
                $reviewCount4 = $reviewslist4->count();

                $reviewslist3 = Review::where('product_id', '=', $index)
                    ->where('votes', '=', 3)
                    ->get();
                $reviewCount3 = $reviewslist3->count();


                $reviewslist2 = Review::where('product_id', '=', $index)
                    ->where('votes', '=', 2)
                    ->get();
                $reviewCount2 = $reviewslist2->count();

                $reviewslist1 = Review::where('product_id', '=', $index)
                    ->where('votes', '=', 1)
                    ->get();
                $reviewCount1 = $reviewslist1->count();
                $totalReview5 = 0;
                $totalReview4 = 0;
                $totalReview3 = 0;
                $totalReview2 = 0;
                $totalReview1 = 0;

                if ($reviewCount != 0) {
                    $totalReview5 = (int) ($reviewCount5 / $reviewCount * 100);
                    $totalReview4 = (int) ($reviewCount4 / $reviewCount * 100);
                    $totalReview3 = (int) ($reviewCount3 / $reviewCount * 100);
                    $totalReview2 = (int) ($reviewCount2 / $reviewCount * 100);
                    $totalReview1 = (int) ($reviewCount1 / $reviewCount * 100);
                }

                $mediaReview = $reviewCount * 5;
                $totalSommaReview = ($reviewCount5 * 5) + ($reviewCount4 * 4) + ($reviewCount3 * 3) + ($reviewCount2 * 2) + ($reviewCount1 * 1);
                $resultMedia = 0;
                if ($mediaReview != 0) {
                    $resultMedia = $totalSommaReview / $mediaReview * 5;
                    array_push($array,$resultMedia);

                }else{
                    $nada=0;
                    array_push($array,$nada);
                }
            }
        }
        return $array;
    }



    public function account(){

        

        $id= DB::table('sessione')
        ->where('id', '1')
        ->value('name');

        $idUtente= DB::table('carts')
        ->where('id', $id)
        ->value('clientCarts_id');

        $count = DB::table('products')
        ->select('*')
        ->where('client_id', $idUtente)
        ->get();
        $countProduct=$count->count();


        $product = DB::table('products')
        ->select('*')
        ->where('client_id', $idUtente)
        ->paginate(5);

        $productArray = DB::table('products')
        ->select('*')
        ->where('client_id', $idUtente)
        ->get()
        ->toArray();
        $collection = collect($productArray);
        $CountReviews= $this->CountReview($collection);


        $count = DB::table('reviews')
        ->select('*')
        ->where('client_id', $idUtente)
        ->get();

        $countReview=$count->count();

        $reviews = DB::table('reviews')
        ->select('*')
        ->where('client_id', $idUtente)
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();


        $countResult=$product->count();

        $client = DB::table('clients')
        ->join('carts', 'clients.id', '=', 'carts.clientCarts_id')
        ->select('clients.*')
        ->where('carts.id', $idUtente)
        ->get();

        
        if (!empty($id)) {
            $carelsProd = DB::table('cart_products')
                ->select('product_id')
                ->where('cart_id', $id)
                ->pluck('product_id')
                ->toArray();

            $prodotti = DB::table('cart_products')
                ->join('products', 'cart_products.product_id', '=', 'products.id')
                ->select('cart_products.*', 'products.categoria', 'products.nameProdotto', 'products.descrizione', 'products.quantitaProdotto', 'products.prezzoProdotto', 'products.immagine', 'products.id AS identificativo')
                ->where('cart_products.cart_id', $id)
                ->whereIn('products.id', $carelsProd)
                ->get();
                $countProdotti = $prodotti->count();
            $somma = DB::table('cart_products')
                ->join('products', 'cart_products.product_id', '=', 'products.id')
                ->select(DB::raw('sum(cart_products.quantità * products.prezzoProdotto) as total'))
                ->where('cart_products.cart_id', $id)
                ->whereIn('products.id', $carelsProd)
                ->get();

                $idCart=$id;
                return view('clients.account',compact('countProdotti','idCart','client' ,'product','countResult','CountReviews','reviews','countReview','countProduct','idUtente','prodotti','somma'));
        
        }else{
            $countProdotti=$countProduct;
            $idCart=$id;
            return view('clients.account',compact('countProdotti','idCart','client' ,'product','countResult','CountReviews','reviews','countReview','countProduct','idUtente'));
    
        }


    }



    public function login()
    {
        return view('clients.login');
    }


    public function logout(){
        Session::forget('ID');

        $SessioneUser=DB::table('sessione')
        ->where('id', '1')                          
        ->update(['name' => ""]);
        Session::forget('ADMIN');
        return redirect('/');
    }

    public function authentication()
    {

        $email = request('email');
        $password = request('password');

        if($email=='1000005206@gmail.com' && $password=='admin'){
            $lock=0;
            Session::put('ADMIN',$lock);
            return redirect('/admin');
        }

        $authenticationID = DB::table('clients')
                          ->where('emailVenditore', $email)
                          ->value('id');
       
        if (!empty($authenticationID)) {
            $authentication2 = DB::table('clients')
                ->select('password')
                ->where('id', $authenticationID)
                ->value('password');    
                $decrypted = Crypt::decryptString($authentication2);
            if ($decrypted == $password) {
                $msgStatus = "L'autenticazione è andata a buon fine";
                $status = 1;
                $success = 1;
                $idCart = DB::table('carts')
                ->where('clientCarts_id', $authenticationID)
                ->value('id'); 
                Session::put('ID',$idCart);
                $SessioneUser=DB::table('sessione')
                ->where('id', '1')                          
                ->update(['name' => $authenticationID]);
                Session::put('msgStatus', $msgStatus);
                Session::put('status', $status);
                Session::put('success', $success);
                return redirect('/');
            }else{
            $msgStatus = "Password o Email non corrette";
            $status = 1;
            $success = 0;
            Session::put('ID',$authenticationID);
            Session::put('msgStatus', $msgStatus);
            Session::put('status', $status);
            Session::put('success', $success);
            return redirect('login');
            }
        } else {
            $msgStatus = "Password o Email non corrette";
                $status = 1;
                $success = 0;
                Session::put('ID',$authenticationID);
        
                Session::put('msgStatus', $msgStatus);
                Session::put('status', $status);
                Session::put('success', $success);
            return redirect('login');
        }
    }


    public function store()
    {
        $clients = new Client;
        $carts = new Cart;
        $clients->nomeVenditore = request('nome');
        $clients->emailVenditore = request('email');
        $clients->telefonoVenditore = request('telefono');
        $clients->indirizzoVenditore = request('indirizzo');

        $password = request('password');
        $PasswordCrypt = Crypt::encryptString($password);
        $clients->Password = $PasswordCrypt;

        $clients->save();
        $carts->clientCarts_id = $clients->id;
        $carts->save();
       
        return redirect('/');
    }


    public function show(Client $client)
    {
        $id= DB::table('sessione')
        ->where('id', '1')
        ->value('name');

        $idUtente= DB::table('carts')
        ->where('id', $id)
        ->value('clientCarts_id');

        $count = DB::table('products')
        ->select('*')
        ->where('client_id', $idUtente)
        ->get();
        $countProduct=$count->count();


        $product = DB::table('products')
        ->select('*')
        ->where('client_id', $idUtente)
        ->paginate(5);

        $productArray = DB::table('products')
        ->select('*')
        ->where('client_id', $idUtente)
        ->get()
        ->toArray();
        $collection = collect($productArray);
        $CountReviews= $this->CountReview($collection);


        $count = DB::table('reviews')
        ->select('*')
        ->where('client_id', $idUtente)
        ->get();

        $countReview=$count->count();

        $reviews = DB::table('reviews')
        ->select('*')
        ->where('client_id', $idUtente)
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();


        $countResult=$product->count();

        $client = DB::table('clients')
        ->join('carts', 'clients.id', '=', 'carts.clientCarts_id')
        ->select('clients.*')
        ->where('carts.id', $idUtente)
        ->get();

        
        if (!empty($id)) {
            $carelsProd = DB::table('cart_products')
                ->select('product_id')
                ->where('cart_id', $id)
                ->pluck('product_id')
                ->toArray();

            $prodotti = DB::table('cart_products')
                ->join('products', 'cart_products.product_id', '=', 'products.id')
                ->select('cart_products.*', 'products.categoria', 'products.nameProdotto', 'products.descrizione', 'products.quantitaProdotto', 'products.prezzoProdotto', 'products.immagine', 'products.id AS identificativo')
                ->where('cart_products.cart_id', $id)
                ->whereIn('products.id', $carelsProd)
                ->get();
                $countProdotti = $prodotti->count();
            $somma = DB::table('cart_products')
                ->join('products', 'cart_products.product_id', '=', 'products.id')
                ->select(DB::raw('sum(cart_products.quantità * products.prezzoProdotto) as total'))
                ->where('cart_products.cart_id', $id)
                ->whereIn('products.id', $carelsProd)
                ->get();

                $idCart=$id;
                return view('clients.show',compact('countProdotti','idCart','client' ,'product','countResult','CountReviews','reviews','countReview','countProduct','idUtente','prodotti','somma'));
        
        }else{
            $countProdotti=$countProduct;
            $idCart=$id;
            return view('clients.show',compact('countProdotti','idCart','client' ,'product','countResult','CountReviews','reviews','countReview','countProduct','idUtente'));
    
        }


    }

    public function decrypt($prova)
    {
         $decrypt= Crypt::decryptString($prova);
         return $decrypt;
    }


    public function edit(Client $client)
    {
        $decrypt= Crypt::decryptString($client->Password);
        return view('clients.edit', compact('client','decrypt'));
    }


    public function update(Client $client)
    {
        $client->nomeVenditore = request('nomeVenditore');
        $client->emailVenditore = request('emailVenditore');
        $Password = request('Password');
        $PasswordCrypt = Crypt::encryptString($Password);
        $client->Password = $PasswordCrypt;
        $client->telefonoVenditore = request('telefonoVenditore');
        $client->indirizzoVenditore = request('indirizzoVenditore');
        $client->save();
        return redirect('/');
    }


    public function help_show()
    {
        $id = request('id');
        return redirect("/clients/$id");
    }


    public function destroy(Client $client)
    {
        $client->delete();
        return redirect('/');

    }
}