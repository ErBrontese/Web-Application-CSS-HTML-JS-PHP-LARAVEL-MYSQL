@extends('layout')

@section('content')
    <h1>Projects</h1>
    <ul>
        @foreach ($clients as $client)
        <li> <a href="/clients/{{$client->id}}">{{$client->nomeVenditore}}</a> </li>
        @endforeach
    </ul>
@endsection


         
          