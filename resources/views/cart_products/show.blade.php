@extends('layout')
@section('content')
<?php 
 $status = Session::get('statusQuantity');
 $msgStatus = Session::get('msgStatusQuantity');
?>
   
    @if($status==1)
    <div  class="alert alert-info">
        <ul>
            <li><?php echo $msgStatus ?></li>
            <?php 
            Session::forget('statusQuantity');
            ?>
        </ul>
    </div>
@endif
<div class="contenitore">
@if ($prodotti->count())

    <div class="product">
        @foreach($prodotti as $prod )

        <b>categoria:</b> {{$prod->categoria}} <br>
        <b>Nome prodotto:</b> {{$prod->nameProdotto}} <br>
        <b>Descrizione:</b> {{$prod->descrizione}} <br>
        <b>Prezzo:</b> {{$prod->prezzoProdotto}} <br>
        <form action="/cart_products/{{$prod->quantità}}" method="post">
            @csrf
            @method('PATCH')
            <?php $curPageName = $_SERVER['REQUEST_URI'];?>
            <div class="quantityProductInput">
                <label for="Quantità">Quantità</label> <br>
                <input type="text" name="quantità" id="quantità" value="{{$prod->quantità}}">
                <div style="display:none;"> <input type="text" name="id" id="id" value="{{$prod->id}}"></div>
                <div style="display:none;"> <input type="text" name="curPageName" id="id" value="{{$curPageName}}">
                </div>
                <input type="submit" value="Save users">
            </div>
        </form>


        <form class="deleteProductForm" action="/cart_products/{{$prod->id}}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" class="deleteProductInput" value="Elimina prodotto">
        </form>
        <a href="/products/{{$prod->identificativo}}">Apri</a><br><br>


        @endforeach
      
    </div>
    <form action="/shoppings/info_Shopping/{{$prod->cart_id}}" method="get">
        <input type="submit" value="Procedi con il pagamento"> <br><br>
    </form>


    @if ($somma->count())
    @foreach($somma as $num )

    <b>totale:</b> {{$num->total}} <br>

    @endforeach
@endif 
@elseif (count($prodotti) == 0)
        <b>Nessun elemento è presente nel carrello </b>
@endif 
@endsection

