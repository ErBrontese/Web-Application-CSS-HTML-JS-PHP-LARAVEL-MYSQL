<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Review;
use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Support\Facades\Session;
use Image;


use Auth;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;



class ProductController extends Controller
{


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
                    array_push($array, $resultMedia);

                } else {
                    $nada = 0;
                    array_push($array, $nada);
                }
            }
        }
        return $array;
    }



    public function index()
    {

        $products = Product::orderBy('created_at', 'desc')->simplePaginate(1);
        return view('Home', compact('products'));
    }

    public function print_show($value, $valuePrice_id, $range)
    {
        $rangeValue = str_split($range, 2);
        $countProdotti = "";
        $valuePrice = Crypt::decryptString($valuePrice_id);
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln("<info>{{$rangeValue[0]}}</info>");

        switch ($rangeValue[0]) {
            case 10:
                $product = DB::table('products')
                    ->where('categoria', 'LIKE', '%' . $value . '%')
                    ->orWhere('nameProdotto', 'LIKE', '%' . $value . '%')
                    ->paginate(9);

                $productArray = DB::table('products')
                    ->select('id')
                    ->where('categoria', 'LIKE', '%' . $value . '%')
                    ->orWhere('nameProdotto', 'LIKE', '%' . $value . '%')
                    ->get()
                    ->toArray();
                $collection10 = collect($productArray);
                $CountReviews10 = $this->CountReview($collection10);
                $CountReviews = $CountReviews10;
                echo "<script>localStorage.setItem('key', '$value');</script>";
                $reviewCount1 = $product->count();
                $countResult = $reviewCount1;
                if ($reviewCount1 == 0) {
                    $empty = 1;
                }
                break;
            case 20:

                $product = Product::where('prezzoProdotto', $valuePrice)
                    ->where('nameProdotto', 'LIKE', '%' . $value . '%')
                    ->paginate(9);
                $countResult = $product->count();
                $output = new \Symfony\Component\Console\Output\ConsoleOutput();
                $output->writeln("<info>Result :{{$countResult}}</info>");
                $productArray = Product::select('id')
                    ->where('prezzoProdotto', $valuePrice)
                    ->where('nameProdotto', 'LIKE', '%' . $value . '%')
                    ->get()
                    ->toArray();
                $collection20 = collect($productArray);
                $CountReviews20 = $this->CountReview($collection20);
                $CountReviews = $CountReviews20;
                $query2 = $product->where('prezzoProdotto', $valuePrice)->all();
                if (empty($query2)) {
                    $empty = 1;
                }

                break;
            case 30:


                $product = Product::where('nameProdotto', 'LIKE', '%' . $value . '%')
                    ->where('prezzoProdotto', '<=', $valuePrice)->paginate(9);
                $countResult = $product->count();
                $productArray = Product::select('id')
                    ->where('nameProdotto', 'LIKE', '%' . $value . '%')
                    ->where('prezzoProdotto', '<=', $valuePrice)
                    ->get()
                    ->toArray();
                $collection30 = collect($productArray);
                $CountReviews30 = $this->CountReview($collection30);
                $CountReviews = $CountReviews30;

                $query2 = $product->where('prezzoProdotto', '<=', $valuePrice)->all();
                if (empty($query2)) {
                    $empty = 1;
                }

                break;
            case 40:

                $product = Product::where('nameProdotto', 'LIKE', '%' . $value . '%')
                    ->whereBetween('prezzoProdotto', [$rangeValue[1], $rangeValue[2]])->paginate(9);
                $countResult = $product->count();
                $productArray = Product::select('id')
                    ->where('nameProdotto', 'LIKE', '%' . $value . '%')
                    ->whereBetween('prezzoProdotto', [$rangeValue[1], $rangeValue[2]])
                    ->get()
                    ->toArray();
                $collection40 = collect($productArray);
                $CountReviews40 = $this->CountReview($collection40);
                $CountReviews = $CountReviews40;

                $query2 = $product->whereBetween('prezzoProdotto', [$rangeValue[1], $rangeValue[2]])->all();
                if (empty($query2)) {
                    $empty = 1;
                }

                break;
            case 50:

                $product = Product::where('nameProdotto', 'LIKE', '%' . $value . '%')
                    ->where('quantitaProdotto', $valuePrice)->paginate(9);
                $countResult = $product->count();
                $productArray = Product::select('id')
                    ->where('nameProdotto', 'LIKE', '%' . $value . '%')
                    ->where('quantitaProdotto', $valuePrice)
                    ->get()
                    ->toArray();
                $collection50 = collect($productArray);
                $CountReviews50 = $this->CountReview($collection50);
                $CountReviews = $CountReviews50;


                $query2 = $product->where('quantitaProdotto', $valuePrice)->all();
                if (empty($query2)) {
                    $empty = 1;
                }

                break;
        }

        $id = Session::get('ID');
        $idCart = $id;
        return view('products.shopProduct', compact('product', 'CountReviews', 'countResult', 'idCart', 'countProdotti'));
    }


    public function create($client_id = 0)
    {
        $countProdotti = "";
        $id = Session::get('ID');
        $client_id = $id;
        $idCart = "";
        return view('products.create', compact('client_id', 'countProdotti', 'idCart', 'client_id'));
    }


    public function store(Request $request)
    {

        $categoria = $request->input('categoria');
        $nameProdotto = $request->input('nameProdotto');
        $descrizione = $request->input('descrizione');
        $quantitaProdotto = $request->input('quantitaProdotto');
        $prezzoProdotto = $request->input('prezzoProdotto');
        //Image one
        $request->validate([
            'image.*' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
        ]);

        if ($file = $request->hasFile('image')) {
            $file = $request->file('image');
            $input['file'] = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/images';
            $imgFile = Image::make($file->getRealPath());

            $imgFile->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['file']);



        }
        $percorso = "/images" . "/" . $input['file'];


        if ($file = $request->hasFile('image2')) {
            $file = $request->file('image2');
            $input['file'] = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/images';
            $imgFile = Image::make($file->getRealPath());

            $imgFile->resize(700, 700, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['file']);



        }
        $percorso2 = "/images" . "/" . $input['file'];







        $client_id = $request->input('client_id');
        //Image two

        $products = new Product;
        $products->categoria = $categoria;
        $products->nameProdotto = $nameProdotto;
        $products->descrizione = $descrizione;
        $products->quantitaProdotto = $quantitaProdotto;
        $products->prezzoProdotto = $prezzoProdotto;
        $products->immagine = $percorso;
        $products->immagine2 = $percorso2;
        $products->client_id = $client_id;

        $products->save();
        return redirect('/');


    }


    public function show(Product $product)
    {
        $productID = $product->id;
        $clientID = $product->client_id;

        $reviewslist = Review::where('product_id', '=', $productID)->get();
        $reviewCount = $reviewslist->count();

        $reviewslist5 = Review::where('product_id', '=', $productID)
            ->where('votes', '=', 5)
            ->get();
        $reviewCount5 = $reviewslist5->count();

        $reviewslist4 = Review::where('product_id', '=', $productID)
            ->where('votes', '=', 4)
            ->get();
        $reviewCount4 = $reviewslist4->count();

        $reviewslist3 = Review::where('product_id', '=', $productID)
            ->where('votes', '=', 3)
            ->get();
        $reviewCount3 = $reviewslist3->count();


        $reviewslist2 = Review::where('product_id', '=', $productID)
            ->where('votes', '=', 2)
            ->get();
        $reviewCount2 = $reviewslist2->count();

        $reviewslist1 = Review::where('product_id', '=', $productID)
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
        }


        $reviews = DB::table('reviews')
            ->join('clients', 'reviews.client_id', '=', 'clients.id')
            ->select('reviews.*', 'clients.nomeVenditore')
            ->where('reviews.product_id', $productID)
            ->get();

        $Category = DB::table('products')
            ->where('id', $productID)
            ->value('categoria');

        /////////////////////////////////////////////////
        $productsForCategory = DB::table('products')
            ->select('*')
            ->where('categoria', $Category)
            ->whereNot('id', $productID)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        $productsForCategoryCount = $productsForCategory->count();

        $ArrayproductsForCategory = DB::table('products')
            ->select('id')
            ->where('categoria', $Category)
            ->whereNot('id', $productID)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get()
            ->toArray();
        $collection = collect($ArrayproductsForCategory);
        $CountReviews = $this->CountReview($collection);
        /////////////////////////////////////////////////////

        $otherProducts = Product::orderBy('created_at', 'desc')
            ->whereNot('id', $productID)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        $otherProductsArray = Product::orderBy('created_at', 'desc')
            ->select('id')
            ->whereNot('id', $productID)
            ->take(10)
            ->get()
            ->toArray();
        $collection1 = collect($otherProductsArray);
        $CountReviewsOtherProducts = $this->CountReview($collection1);

        $id = Session::get('ID');
        $idUtente = DB::table('carts')
            ->where('id', $id)
            ->value('clientCarts_id');

        /////////////////////////////////////////////


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

            return view('products.short-description', compact('resultMedia', 'CountReviewsOtherProducts', 'reviewCount', 'CountReviews', 'product', 'otherProducts', 'productsForCategory', 'reviews', 'totalReview5', 'totalReview4', 'totalReview3', 'totalReview2', 'totalReview1', 'prodotti', 'countProdotti', 'somma', 'idUtente', 'productsForCategoryCount', 'idCart'));
        } else {
            $prodotti = "";
            $somma = "";
            $countProdotti = 0;
            return view('products.short-description', compact('resultMedia', 'CountReviewsOtherProducts', 'reviewCount', 'CountReviews', 'product', 'otherProducts', 'productsForCategory', 'reviews', 'totalReview5', 'totalReview4', 'totalReview3', 'totalReview2', 'totalReview1', 'prodotti', 'countProdotti', 'somma', 'idUtente', 'productsForCategoryCount', 'idCart'));

        }




    }


    public function edit(Product $product)
    {

        $countProdotti = "";
        $id = Session::get('ID');
        $client_id = $id;
        $idCart = "";
        return view('products.edit', compact('product', 'client_id', 'countProdotti', 'idCart'));
    }







    public function update(Request $request)
    {
        $categoria = $request->input('categoria');
        $nameProdotto = $request->input('nameProdotto');
        $descrizione = $request->input('descrizione');
        $quantitaProdotto = $request->input('quantitaProdotto');
        $prezzoProdotto = $request->input('prezzoProdotto');

        $client_id = request('client_id');
        $imageProdottoOne = request('image');
        $imageProdottoTwo = request('image2');
        $imageProdottoThree = request('image3');




        if ($imageProdottoOne != "") {
            $request->validate([
                'image.*' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
            ]);
            if ($file = $request->hasFile('image')) {

                $file = $request->file('image');
                $input['file'] = time() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path() . '/images';
                $imgFile = Image::make($file->getRealPath());

                $imgFile->resize(700, 700, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $input['file']);
                $percorsoOne = "/images" . "/" . $input['file'];


                $imageOld = DB::table('products')
                    ->where('client_id', $client_id)
                    ->value('immagine');
                $path = public_path() . $imageOld;

                @chmod($path, 0777);
                @unlink($path);

                DB::table('products')
                    ->where('id', $client_id)
                    ->update(['immagine' => $percorsoOne]);
            }
        }

        if ($imageProdottoTwo != "") {
            $request->validate([
                'image2.*' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
            ]);


            if ($file = $request->hasFile('image2')) {

                $file = $request->file('image2');
                $input['file'] = time() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path() . '/images';
                $imgFile = Image::make($file->getRealPath());

                $imgFile->resize(700, 700, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $input['file']);
                $percorsoTwo = "/images" . "/" . $input['file'];

                $imageOld = DB::table('products')
                    ->where('client_id', $client_id)
                    ->value('immagine2');
                $path = public_path() . $imageOld;


                @chmod($path, 0777);
                @unlink($path);


                DB::table('products')
                    ->where('client_id', $client_id)
                    ->update(['immagine2' => $percorsoTwo]);
            }


        }


        if ($imageProdottoThree != "") {
            $request->validate([
                'image3.*' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
            ]);
            if ($file = $request->hasFile('image3')) {

                $file = $request->file('image3');
                $input['file'] = time() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path() . '/images';
                $imgFile = Image::make($file->getRealPath());

                $imgFile->resize(700, 700, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $input['file']);
                $percorsoThree = "/images" . "/" . $input['file'];

                $imageOld = DB::table('products')
                    ->where('client_id', $client_id)
                    ->value('immagine3');
                $path = public_path() . $imageOld;


                @chmod($path, 0777);
                @unlink($path);


                DB::table('products')
                    ->where('id', $client_id)
                    ->update(['immagine3' => $percorsoThree]);
            }
        }






        return redirect('/');



    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/');
    }



    public function help_show()
    {

        $value = request('value'); //ok

        $valuePrice = 0;
        $valuePrice = request('valueSearchPrice'); //ok
        if ($valuePrice == 0) {
            $valuePrice = 1;
        }

        $filterValue = request('nameSearch'); //OK
        if (empty($filterValue)) {
            $filterValue = 'vuoto';
        }

        if (empty($value)) {
            $value = $filterValue;

        }
        $valuePriceRange1 = request('valueSearchPrice1'); //ok
        $valuePriceRange2 = request('valueSearchPrice2'); //ok

        if ($valuePriceRange1 == 0 && $valuePriceRange2 == 0) {
            $valuePriceRange1 = 30;
            $valuePriceRange2 = 30;
        }


        $filterAmount = 0;
        $filterAmount = request('valueSearchAmount');
        if ($filterAmount == 0) {
            $filterAmount = 1;
        } else if ($filterAmount > 1) {
            $valuePrice = $filterAmount;
        }

        $valuePrice_id = Crypt::encryptString($valuePrice);



        $typeFilter = request('filterPrice'); //ok
        $empty = 0;
        if (empty($value) && empty($valuePrice)) {
            $value = 'vuoto';
        }

        $RangeValue = array($typeFilter, $valuePriceRange1, $valuePriceRange2);
        $range = implode($RangeValue);
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln("<info>cioao</info>");

        return redirect()->action([ProductController::class, 'print_show'], [$value, $valuePrice_id, $range]);


    }



    public function destroyAll()
    {
        $products = Product::all();
        foreach ($products as $product)
            $product->delete();
        return redirect('/');
    }
}