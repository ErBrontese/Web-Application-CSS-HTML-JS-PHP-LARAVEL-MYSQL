@extends('layout')

@php
use App\Models\Client;

$client = Client::findOrFail($product->client_id);
@endphp


@section('content')
<b>Categoria:</b> {{$product->categoria}} <br>
<b>Nome prodotto:</b> {{$product->nameProdotto}} <br>
<b>Descrizione:</b> {{$product->descrizione}} <br>
<b>Quantità prodotto:</b> {{$product->quantitaProdotto}} <br>
<b>Prezzo prodotto:</b> {{$product->prezzoProdotto}}<br>
<b>Immagine:</b> {{$product->immagine}}<br>
<b>FROM PROJECT:</b> <a href="/clients/{{$client->id}}">{{$client->nomeVenditore}}</a> <br><br>
<form action="/products/{{$product->id}}/edit" method="get">
    <input type="submit" value="Edit/Delete Task">
</form>

<br>

<form action="/reviews/create" method="get">
    <input type="submit" value="Nuova recensione"> <br><br>
    <input style="display:none;" type="text" type="hidden" name="id" id="id" value="{{$product->id}}">
</form>
<h1>Recensione prodotto</h1>
<form action="/reviews/{{$product->id}}" method="get">

    <div><input type="submit" value="5" name="vote">&nbsp&nbsp<i>stelle</i></div>
    <div style="width:20%; margin-left:6%; margin-top:-2%">
        <div class="w3-border" style="border-radius:5px;">
            <div class="w3-blue" style="height:24px;width:{{$totalReview5}}%; border-radius:5px;"></div>
        </div>
    </div><div style=" margin-left:27%; margin-top:-1.5%"> {{$totalReview5}}%</div><br><br>


    <div><input type="submit" value="4" name="vote">&nbsp&nbsp<i>stelle</i></div>
    <div style="width:20%; margin-left:6%; margin-top:-2%">
        <div class="w3-border" style="border-radius:5px;">
            <div class="w3-blue" style="height:24px;width:{{$totalReview4}}%; border-radius:5px;"></div>
        </div>
    </div><div style=" margin-left:27%; margin-top:-1.5%"> {{$totalReview4}}%</div><br><br>

    
    <div><input type="submit" value="3" name="vote">&nbsp&nbsp<i>stelle</i></div>
    <div style="width:20%; margin-left:6%; margin-top:-2%">
    <div class="w3-border" style="border-radius:5px;" >
        <div class="w3-blue" style="height:24px;width:{{$totalReview3}}%; border-radius:5px;"></div>
    </div>
    </div><div style=" margin-left:27%; margin-top:-1.5%"> {{$totalReview3}}%</div><br><br>

    
    <div><input type="submit" value="2" name="vote">&nbsp&nbsp<i>stelle</i></div>
    <div style="width:20%; margin-left:6%; margin-top:-2%">
    <div class="w3-border" style="border-radius:5px;" >
        <div class="w3-blue" style="height:24px;width:{{$totalReview2}}%; border-radius:5px;"></div>
    </div>
    </div><div style=" margin-left:27%; margin-top:-1.5%"> {{$totalReview2}}%</div><br><br>

    <div><input type="submit" value="1" name="vote">&nbsp&nbsp<i>stelle</i></div>
    <div style="width:20%; margin-left:6%; margin-top:-2%">
    <div class="w3-border" style="border-radius:5px;" >
        <div class="w3-blue" style="height:24px;width:{{$totalReview1}}%; border-radius:5px;"></div>
    </div>
    </div><div style=" margin-left:27%; margin-top:-1.5%"> {{$totalReview1}}%</div><br><br>

    <input style="display:none;" type="text" type="hidden" name="id" id="id" value="{{$product->id}}">
</form>
<hr>
@foreach($reviews as $review )

<a href="/clients/{{$review->client_id}}"><b>Utente:</b> {{$review->nomeVenditore}} <br></a> 
<b>Valutazione:</b> {{$review->votes}} <br>
<b>Recensito il:</b> {{$review->updated_at}} <br>
<b>Recensione:</b> {{$review->review}} <br>

<hr>
@endforeach

@endsection