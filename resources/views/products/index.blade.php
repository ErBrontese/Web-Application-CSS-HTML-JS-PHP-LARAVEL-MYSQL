@extends('layout')



@section('content')
    <h1>Prodotti</h1>
    <ul>
        @foreach ($products as $product)
        
            <li> <a href="/products/{{$product->id}}">{{$product->nameProdotto}} Utente :{{$product->client_id}} </a> </li>
        @endforeach
    </ul>

    <div class="container">
    {!! $products->render() !!}
</div>
@endsection

