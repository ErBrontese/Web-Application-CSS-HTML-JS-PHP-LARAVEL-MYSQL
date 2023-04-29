<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Product;
use App\Models\Client;
use App\Models\Review;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ReviewController extends Controller
{
   
    public function index()
    {
        //
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

    public function create()
    {
        $productID= request('id');
        return view('reviews.create',compact('productID'));
    }

    public function store()
    {
        
        $votes = request('votes');
        $review = request('review');
        $product_id = request('product_id');
        $client_id = request('client_id');
        $curPageName = request('curPageName');

        $checkReview = DB::table('shoppings')
        ->where('product_id', $client_id)
        ->where('product_id', $product_id)
        ->get();
        
        if($checkReview!=0){
        $Insert = Review::updateOrCreate(
            ['product_id' => $product_id, 'client_id' => $client_id],
            ['votes' => $votes , 'review' => $review ]
        );
        }
        return redirect($curPageName);
    }

    
    public function show($product_id)
    {
        $voto= request('vote');
        

        $reviews = DB::table('reviews')
            ->join('clients', 'reviews.client_id', '=', 'clients.id')
            ->select('reviews.*', 'clients.nomeVenditore')
            ->where('reviews.product_id', $product_id)
            ->where('reviews.votes', $voto)
            ->get();
        

            return view('reviews.show', compact('reviews' , 'product_id'));
    }


    public function showAccount(){


        $id= DB::table('sessione')
        ->where('id', '1')
        ->value('name');

        $idUtente= DB::table('carts')
        ->where('id', $id)
        ->value('clientCarts_id');

        $product = DB::table('products')
        ->select('*')
        ->where('client_id', $idUtente)
        ->paginate(9);

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
        ->paginate(3);


        $client = DB::table('clients')
        ->join('carts', 'clients.id', '=', 'carts.clientCarts_id')
        ->select('clients.*')
        ->where('carts.id', $idUtente)
        ->get();

        $countProdotti="";
        $idCart="";
        
        return view('reviews.showReviews', compact('reviews' ,'countProdotti','idCart','product','client','countReview'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReviewRequest  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
