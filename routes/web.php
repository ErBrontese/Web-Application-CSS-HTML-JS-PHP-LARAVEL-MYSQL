<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\Cart_productController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MetamaskController;
use App\Models\Product;
use App\Models\Review;
use Symfony\Component\Routing\Loader\Configurator\Traits\RouteTrait;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::resource('/products', ProductController::class);

Route::delete('/products', [ProductController::class, 'destroyAll']);

Route::resource('/carts', CartController::class);

Route::delete('/carts', [CartController::class, 'destroyAll']);

Route::resource('/clients', ClientController::class);

Route::delete('/clients', [ClientController::class, 'destroyAll']);

Route::resource('/shoppings', ShoppingController::class);

Route::delete('/shoppings', [ShoppingController::class, 'destroyAll']);

Route::resource('/cart_products', Cart_productController::class);

Route::delete('/cart_products', [Cart_productController::class, 'destroyAll']);

Route::resource('/reviews', ReviewController::class);

Route::get('/showAccount', [ReviewController::class, 'showAccount']);

Route::delete('/reviews', [ReviewController::class, 'destroyAll']);

Route::post('/products/help_show', [ProductController::class, 'help_show']);

Route::get('print_show/{value}/{valuePrice}/{range}', [ProductController::class, 'print_show']);

Route::get('login', [ClientController::class, 'login']);

Route::get('logout', [ClientController::class, 'logout']);

Route::get('account', [ClientController::class, 'account']);

Route::post('authentication', [ClientController::class, 'authentication']);

Route::get('/shoppings/info_Shopping/{infoClient}', [ShoppingController::class, 'info_Shopping']);

Route::post('/clients/help_show', [ClientController::class, 'help_show']);


Route::get('show_Shopping/{value}', [ShoppingController::class, 'show_Shopping']);


Route::post('pay', [PaymentController::class, 'pay'])->name('payment');

Route::get('success', [PaymentController::class, 'success']);

Route::get('error', [PaymentController::class, 'error']);


Route::view('/shop', 'products.shopProduct');


Route::prefix('metamask')->group(function () {
    Route::post('/transaction/create', [MetamaskController::class, 'create'])->name('metamask.transaction.create');
});

Route::get('/about', function () {
    $countProdotti = "";
    $idCart = "";

    $id= DB::table('sessione')
        ->where('id', '1')
        ->value('name');

    $idUtente = DB::table('carts')
        ->where('id', $id)
        ->value('clientCarts_id');

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

        $idCart = $id;
        return view('about.about', compact('countProdotti', 'idCart', 'idUtente', 'prodotti', 'somma'));

    } else {
        $countProdotti = 0;
        $idCart = $id;
        return view('about.about', compact('countProdotti', 'idCart', 'idUtente'));

    }
});



Route::get('/admin', function () {
    $lock = Session::get('ADMIN');
    $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln("<info>{{$lock}}</info>");
    if($lock!=""){
    $User = DB::table('clients')
        ->select("*")
        ->get();
    $countUser = $User->count();

    $somma = DB::table('shoppings')
        ->select(DB::raw('sum(totale) as total'))
        ->get();
    
    $Sales = DB::table('shoppings')
        ->select('*')
        ->get();

    $countSales = $Sales->count();

    $product = DB::table('products')
        ->select('*')
        ->get();
    $countProduct = $product->count();

    $cart = DB::table('carts')
        ->select('*')
        ->get();
    $countCart = $cart->count();

    $reviews = DB::table('reviews')
        ->select('*')
        ->get();
    $countReview = $reviews->count();

    $payments = DB::table('payments')
        ->select('*')
        ->get();
    $countpaymentsPayPal = $payments->count();


    $transactions = DB::table('transactions')
        ->select('*')
        ->get();
    $countransactionsMetaMask = $transactions->count();

    $cart_products = DB::table('cart_products')
        ->select('*')
        ->get();
    $countcart_products = $cart_products->count();
    ////////////////////////////Media recensioni//////////////////////////////////////
    $reviewslist = Review::get();
    $reviewCount = $reviewslist->count();

    $reviewslist5 = Review::where('votes', '=', 5)
        ->get();
    $reviewCount5 = $reviewslist5->count();

    $reviewslist4 = Review::where('votes', '=', 4)
        ->get();
    $reviewCount4 = $reviewslist4->count();

    $reviewslist3 = Review::where('votes', '=', 3)
        ->get();
    $reviewCount3 = $reviewslist3->count();


    $reviewslist2 = Review::where('votes', '=', 2)
        ->get();
    $reviewCount2 = $reviewslist2->count();

    $reviewslist1 = Review::where('votes', '=', 1)
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
    ////////////////////////////Media categorie//////////////////////////////////

    $countSales = $Sales->count(); //Numero totale di acquisiti

    //Numero totale di Acquisti per categoria:Pistacchio

    $Pistacchio = DB::table('shoppings')
        ->join('products', 'products.id', '=', 'shoppings.product_id')
        ->where('products.categoria', 'LIKE', '%' . 'Pistacchio' . '%')
        ->get();
    $PistacchioCount = $Pistacchio->count();

    $Noci = DB::table('shoppings')
        ->join('products', 'products.id', '=', 'shoppings.product_id')
        ->where('products.categoria', 'LIKE', '%' . 'Noci' . '%')
        ->get();
    $NociCount = $Noci->count();

    $Mandorle = DB::table('shoppings')
        ->join('products', 'products.id', '=', 'shoppings.product_id')
        ->where('products.categoria', 'LIKE', '%' . 'Mandorle' . '%')
        ->get();
    $MandorleCount = $Mandorle->count();

    $Noccioline = DB::table('shoppings')
        ->join('products', 'products.id', '=', 'shoppings.product_id')
        ->where('products.categoria', 'LIKE', '%' . 'Noccioline' . '%')
        ->get();
    $NocciolineCount = $Noccioline->count();

    $Olio = DB::table('shoppings')
        ->join('products', 'products.id', '=', 'shoppings.product_id')
        ->where('products.categoria', 'LIKE', '%' . 'Olio' . '%')
        ->get();
    $OlioCount = $Olio->count();


    $Limone = DB::table('shoppings')
        ->join('products', 'products.id', '=', 'shoppings.product_id')
        ->where('products.categoria', 'LIKE', '%' . 'Limone' . '%')
        ->get();
    $LimoneCount = $Limone->count();


    

   
    $totalPistacchio = 0;
    $totalNoci = 0;
    $totalMandorle = 0;
    $totalNoccioline = 0;
    $totalOlio = 0;
    $totalLimone = 0;

    if ($countSales != 0) {
        $totalPistacchio = (int) ($PistacchioCount / $countSales * 100);
        $totalNoci = (int) ($NociCount / $countSales * 100);
        $totalMandorle = (int) ($MandorleCount / $countSales * 100);
        $totalNoccioline = (int) ($NocciolineCount / $countSales * 100);
        $totalOlio = (int) ($OlioCount / $countSales * 100);
        $totalLimone = (int) ($LimoneCount / $countSales * 100);
    }




    /////////////////////////////////////////////////////////////////////////
    $image = DB::table('products')
    ->select('immagine')
    ->where('immagine' ,'!=' , NULL)
    ->get();

    $image2 = DB::table('products')
    ->select('immagine2')
    ->where('immagine2' ,'!=' , NULL)
    ->get();

    $image3 = DB::table('products')
    ->select('immagine3')
    ->where('immagine3' ,'!=' , NULL)
    ->get();

    $imageCount = $image->count(); 
    $imageCount +=$image2->count();
    $imageCount +=$image3->count();



    return view('Admin.indexAdmin', compact('countUser', 'somma', 'countSales', 'countProduct',
     'countCart', 'countReview', 'countpaymentsPayPal', 'countransactionsMetaMask',
      'countcart_products', 'totalReview5', 'totalReview4', 'totalReview3', 'totalReview2', 'totalReview1'
        ,'totalPistacchio','totalNoci','totalMandorle','totalNoccioline','totalOlio','totalLimone','imageCount'
    ));

    }
});


Route::get('/admin/image',function(){

    $images = DB::table('products')
    ->select('immagine')
    ->where('immagine' ,'!=' , NULL)
    ->paginate(10);

    $imagesGet = DB::table('products')
    ->select('immagine')
    ->where('immagine' ,'!=' , NULL)
    ->get();

    $imagesCount=$imagesGet->count();

////////////////////////////////////////////////////////////////

    $images2 = DB::table('products')
    ->select('immagine2')
    ->where('immagine2' ,'!=' , NULL)
    ->paginate(10);

    $images2Get = DB::table('products')
    ->select('immagine2')
    ->where('immagine2' ,'!=' , NULL)
    ->get();
    $images2Count=$images2Get->count();


////////////////////////////////////////////////////////////////
    $images3 = DB::table('products')
    ->select('immagine3')
    ->where('immagine3' ,'!=' , NULL)
    ->paginate(10);

    $images3Get = DB::table('products')
    ->select('immagine3')
    ->where('immagine3' ,'!=' , NULL)
    ->get();
    $images3Count=$images3Get->count();

    return view('Admin.page_gallery',compact('images','images2','images3','images3Count','images2Count','imagesCount'));

});


Route::get('/admin/info', function () {
    $clients = DB::table('clients')
    ->select("*")
    ->paginate(10);

    $shoppingTotal = DB::table('shoppings')
    ->select('*')
    ->paginate(10);

    $productTotal = DB::table('products')
    ->select('*')
    ->paginate(10);

    $cartTotal = DB::table('carts')
     ->select('*')
     ->paginate(10);

    $reviewsTotal = DB::table('reviews')
     ->select('*')
     ->paginate(10);
    
    $paymentsTotal = DB::table('payments')
        ->select('*')
        ->paginate(10);

    $transactionsTotal = DB::table('transactions')
        ->select('*')
        ->paginate(10);
    
    $cart_productsTotal = DB::table('cart_products')
        ->select('*')
        ->paginate(10);
    
    


    return view('Admin.page_datatables',compact('clients','shoppingTotal','productTotal','cartTotal','reviewsTotal','paymentsTotal','transactionsTotal','cart_productsTotal'));
});




Route::get('/', function () {
    function CountReview($productID)
    {


        $array = [];
        $exploded = preg_split('/[-\D]/', $productID);

        foreach ($exploded as $index) {
            if (!empty($index)) {


                $reviewslist = DB::table('reviews')
                    ->where('product_id', '=', $index)
                    ->get();
                $reviewCount = $reviewslist->count();

                $reviewslist5 = DB::table('reviews')
                    ->where('product_id', '=', $index)
                    ->where('votes', '=', 5)
                    ->get();
                $reviewCount5 = $reviewslist5->count();

                $reviewslist4 = DB::table('reviews')
                    ->where('product_id', '=', $index)
                    ->where('votes', '=', 4)
                    ->get();
                $reviewCount4 = $reviewslist4->count();

                $reviewslist3 = DB::table('reviews')
                    ->where('product_id', '=', $index)
                    ->where('votes', '=', 3)
                    ->get();
                $reviewCount3 = $reviewslist3->count();


                $reviewslist2 = DB::table('reviews')
                    ->where('product_id', '=', $index)
                    ->where('votes', '=', 2)
                    ->get();
                $reviewCount2 = $reviewslist2->count();

                $reviewslist1 = DB::table('reviews')
                    ->where('product_id', '=', $index)
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
                    array_push($array, $resultMedia);

                } else {
                    $nada = 0;
                    array_push($array, $nada);
                }
            }
        }
        return $array;
    }

    function CountReview2($productID)
    {
        $array = [];
        $exploded = preg_split('/[-\D]/', $productID);

        foreach ($exploded as $index) {
            if (!empty($index)) {


                $reviewslist = DB::table('reviews')
                    ->where('product_id', '=', $index)
                    ->get();
                $reviewCount = $reviewslist->count();

                $reviewslist5 = DB::table('reviews')
                    ->where('product_id', '=', $index)
                    ->where('votes', '=', 5)
                    ->get();
                $reviewCount5 = $reviewslist5->count();

                $reviewslist4 = DB::table('reviews')
                    ->where('product_id', '=', $index)
                    ->where('votes', '=', 4)
                    ->get();
                $reviewCount4 = $reviewslist4->count();

                $reviewslist3 = DB::table('reviews')
                    ->where('product_id', '=', $index)
                    ->where('votes', '=', 3)
                    ->get();
                $reviewCount3 = $reviewslist3->count();


                $reviewslist2 = DB::table('reviews')
                    ->where('product_id', '=', $index)
                    ->where('votes', '=', 2)
                    ->get();
                $reviewCount2 = $reviewslist2->count();

                $reviewslist1 = DB::table('reviews')
                    ->where('product_id', '=', $index)
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
                    if($resultMedia==5){
                        $result = $resultMedia . ',' . $index;
                        array_push($array, $result);
    
                    }
                   
                
                }
            }
        }
        return $array;
    }



    /////////////////////////////////////////////////////////////////
    $products = DB::table('products')
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get();

    $productsArray = DB::table('products')
        ->select('id')
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get()
        ->toArray();

    $collection = collect($productsArray);
    $CountReviewsProducts = CountReview($collection);

    /////////////////////////////////////////////////////////////////




    ///////////////////////////////////////////////////////////////

    $collection1 = collect($productsArray);

    $CountReviewsProducts2 = CountReview2($collection1);
    $collection2 = collect($CountReviewsProducts2);
    

    $value = explode(',', $collection2);
    $i = 1;
    $lungh = count($value);
    $productTop = [];

    while ($i < $lungh) {
        $j = $i;
        $j--;
     
            array_push($productTop, $value[$i]);
            
        $i = $i + 2;
    }


    $productsTop = DB::table('products')
        ->whereIn('id', $productTop)
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get();


    ///////////////////////////////////////////////////////////////////////
    $test = Product::select('id')
        ->get()
        ->toArray();

    $array = [];
    $productMostShoppingArray = [];
    $collectiontest = collect($test);
    $exploded = preg_split('/[-\D]/', $collectiontest);

    foreach ($exploded as $index) {
        if (!empty($index)) {
            $prodShopping = DB::table('shoppings')
                ->where('product_id', $index)
                ->get();
            $countShopping = $prodShopping->count();
            if ($countShopping >= 3) {
                $output = new \Symfony\Component\Console\Output\ConsoleOutput();
                $output->writeln("<info>Prova {{$countShopping}}</info>");
                $result = $countShopping . ',' . $index;
                array_push($array, $result);
            }


        }
    }


    $collectiontest = collect($array);
    $value = explode(',', $collectiontest);
    $i = 1;
    $lungh = count($value);

    while ($i < $lungh) {
        $j = $i;
        $j--;

        array_push($productMostShoppingArray, $value[$i]);

        $i = $i + 2;
    }


    $productMostShopping = DB::table('products')
        ->whereIn('id', $productMostShoppingArray)
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get();
   
   
   
    $productMostShoppingArray = DB::table('products')
        ->select('id')
        ->whereIn('id', $productMostShoppingArray)
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get()
        ->toArray(); 

    $productMostShoppingArrayCollection = collect($productMostShoppingArray);
    $productMostShoppingVotes =CountReview($productMostShoppingArrayCollection);
    


    /////////////////////////////////////////////////////////////////

    $id= DB::table('sessione')
        ->where('id', '1')
        ->value('name');
    $idCart = $id;
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

        return view('HomePage', compact('productMostShopping', 'products', 'productsTop', 'CountReviewsProducts', 'prodotti', 'somma', 'countProdotti', 'idCart', 'productMostShoppingVotes'));


    } else {
        $prodotti = "";
        $somma = "";
        $countProdotti = 0;
        return view('HomePage', compact('products', 'productsTop', 'CountReviewsProducts', 'prodotti', 'somma', 'countProdotti', 'idCart', 'productMostShopping', 'productMostShoppingVotes'));
    }


});