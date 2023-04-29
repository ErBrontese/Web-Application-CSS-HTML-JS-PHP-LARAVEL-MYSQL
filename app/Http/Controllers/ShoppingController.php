<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShoppingRequest;
use App\Http\Requests\UpdateShoppingRequest;
use App\Models\Shopping;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Review;
use App\Models\Client;


class ShoppingController extends Controller
{
   
    public function index()
    {
       
    }


    public function info_Shopping($infoClient){
    
        $clients = DB::table('clients')
        ->join('carts', 'clients.id', '=', 'carts.clientCarts_id')
        ->select('clients.*')
        ->where('carts.id', $infoClient)
        ->get();


        $carels = DB::table('cart_products')
            ->select('product_id')
            ->where('cart_id', $infoClient)
            ->pluck('product_id')
            ->toArray();



        $prodotti = DB::table('cart_products')
            ->join('products', 'cart_products.product_id', '=', 'products.id')
            ->select('cart_products.*', 'products.categoria', 'products.nameProdotto', 'products.descrizione', 'products.quantitaProdotto', 'products.prezzoProdotto', 'products.immagine', 'products.id AS identificativo')
            ->where('cart_products.cart_id', $infoClient)
            ->whereIn('products.id', $carels)
            ->get();

        $countProdotti=$prodotti->count();
        
            $somma = DB::table('cart_products')
            ->join('products', 'cart_products.product_id', '=', 'products.id')
            ->select(DB::raw('sum(cart_products.quantità * products.prezzoProdotto) as total'))
            ->where('cart_products.cart_id', $infoClient)
            ->whereIn('products.id', $carels)
            ->get();





        return view('shoppings.show',compact('clients','somma','prodotti','countProdotti'));
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


    public function show_Shopping($infoClient){

        //Ci andiamo a prendere l'id del carrello che è stato assegnato al cliente 
        $idCart= DB::table('carts')
                 ->where('clientCarts_id',$infoClient)
                 ->value('id');
        //==>Valore 1 

 
        $productid=DB::table('shoppings')
                 ->where('cart_id',$idCart)
                 ->pluck('product_id')
                 ->toArray();

        $countresult =DB::table('products')
                 ->whereIn('id',$productid)
                 ->get();
        $countResult=$countresult->count();
            
        $product =DB::table('products')
                    ->whereIn('id',$productid)
                    ->simplePaginate(6);

        $count = DB::table('products')
                    ->select('*')
                    ->where('client_id', $infoClient)
                    ->get();
       $countProduct=$count->count();
            

        $productArray = DB::table('products')
                    ->select('*')
                    ->where('client_id', $infoClient)
                    ->get()
                    ->toArray();
        $collection = collect($productArray);
        $CountReviews= $this->CountReview($collection);


        $id= DB::table('sessione')
        ->where('id', '1')
        ->value('name');
        $idUtente = DB::table('carts')
            ->where('id', $id)
            ->value('clientCarts_id');

        /////////////////////////////////////////////


        $idCart = $id;
        
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

        
        
        return view('shoppings.myShopping',compact('product','countResult','CountReviews','countProduct','idCart','countProdotti','prodotti','somma'));


    }

    
    public function create()
    {
        //
    }

    
    public function store()
    {
    $array = request('array');
    $total = request('total');
    $countElement = request('countElement');
    $output = new \Symfony\Component\Console\Output\ConsoleOutput();
    $output->writeln("<info>Array=$array,Total=$total, Count=$countElement </info>");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function show(Shopping $shopping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function edit(Shopping $shopping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShoppingRequest  $request
     * @param  \App\Models\Shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShoppingRequest $request, Shopping $shopping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shopping $shopping)
    {
        //
    }
}