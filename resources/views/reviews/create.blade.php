@extends('layout')





@section('content')


<form action="/reviews" method="post">
    @csrf

    <label for="votes">Valutazione</label> <br>
    <input type="number" name="votes" id="votes"> <br><br>

    <label for="review">Descrizione</label> <br>
    <textarea name="review" id="review" cols="30" rows="10"></textarea> <br><br>

    <label for="votes">Utente</label> <br>
    <input type="number" name="client_id" id="client_id"> <br><br>

    <input  style="display:none;" type="text" type="hidden" name="product_id" id="product_id" value="{{$productID}}">
    
    <input type="submit" value="Inserisci recensione">
</form>

@endsection
