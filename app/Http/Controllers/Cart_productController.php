<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Cart_product;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;




use Illuminate\Http\Request;




class Cart_productController extends Controller
{
    protected $fillable = ['quantità'];

    public function store()
    {
        $product_id = request('product_id');
        $quantità = request('quantità');
        $id= DB::table('sessione')
        ->where('id', '1')
        ->value('name');






        $curPageName = request('curPageName');
        
        if($id == null){
            $msgStatusQuantity = 'Devi prima essere loggato';
            $statusQuantity = 1;
            $success=0;
            Session::put('msgStatus', $msgStatusQuantity);
            Session::put('status', $statusQuantity);
            Session::put('success', $success);
        }else{

        $quantityAvailable = DB::table('products')
            ->where('id', $product_id)
            ->value('quantitaProdotto');
        if ($quantityAvailable >= $quantità) {

            $Insert = Cart_product::updateOrCreate(
                ['cart_id' => $id, 'product_id' => $product_id],
                ['quantità' => $quantità]
            );
        } else {
            $msgStatus = 'La quantità richiesta è meggiore di quella disponibile';
            $statusQuantity = 1;
            $success=0;
            Session::put('msgStatus', $msgStatus);
            Session::put('status', $statusQuantity);
            Session::put('success', $success);   
        }
        $quantityAvailable = 0;
        }
        return redirect($curPageName);
    }


    public function show($cart_product)
    {
        $id= DB::table('sessione')
        ->where('id', '1')
        ->value('name');

        $idUtente= DB::table('carts')
        ->where('id', $id)
        ->value('clientCarts_id');

        $clients = DB::table('clients')
        ->join('carts', 'clients.id', '=', 'carts.clientCarts_id')
        ->select('clients.*')
        ->where('carts.id', $idUtente)
        ->get();

    
        $idCart=$id;

        if(!empty($id)){
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

            $countProdotti= $prodotti->count();
            $somma = DB::table('cart_products')
            ->join('products', 'cart_products.product_id', '=', 'products.id')
            ->select(DB::raw('sum(cart_products.quantità * products.prezzoProdotto) as total'))
            ->where('cart_products.cart_id', $id)
            ->whereIn('products.id', $carelsProd)
            ->get();

            
            return view('cart_products.cart', compact('somma', 'prodotti','countProdotti','somma','idCart','clients'));

        }else{
            $prodotti="";
            $somma="";
            $countProdotti=0;
            return view('cart_products.cart', compact('somma', 'prodotti','countProdotti','somma','idCart','clients'));

        }
    }



    public function edit(Cart $cart)
    {
        //
    }

    public function update($cart_product)
    {

        $quantità = request('quantità');
        $id = request('id');
        $curPageName = request('curPageName');

        

        $quantityAvailable = DB::table('products')
            ->where('id', $id)
            ->value('quantitaProdotto');
        
      
       
    
        if ($quantityAvailable >= $quantità) {
           

            $update = Cart_product::where('cart_id', $cart_product)
                                    ->where('product_id', $id)
                     ->update(['quantità' => $quantità]);

        } else {
            $msgStatusQuantity = 'La quantità richiesta è maggiore di quella disponibile';
            $statusQuantity = 1;
            $success=0;
            Session::put('msgStatus', $msgStatusQuantity);
            Session::put('status', $statusQuantity);
            Session::put('success', $success);
        }
        $quantityAvailable = 0;

        return redirect($curPageName);
    }


    public function destroy($identificativo)
    {
       
        $deleteElement = DB::table('cart_products')
            ->select('id')
            ->where('product_id', $identificativo)
            ->pluck('id')
            ->toArray();

        Cart_product::whereIn('id', $deleteElement)
            ->delete();
        return redirect('/');
    }



}