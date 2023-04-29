@extends('layout')


@section('content')

@foreach($reviews as $review )
<b>Utente:</b> {{$review->nomeVenditore}} <br>
<b>Valutazione:</b> {{$review->votes}} <br>
<b>Recensito il:</b> {{$review->updated_at}} <br>
<b>Recensione:</b> {{$review->review}} <br>
<hr>
@endforeach

<li> <a href="/products/{{$product_id}}">Torna al prodotto</a> </li>

@endsection