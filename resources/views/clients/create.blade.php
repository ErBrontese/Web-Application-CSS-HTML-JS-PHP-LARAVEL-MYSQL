@extends('layout')

@section('content')
    <h1>Registrazione  Utente</h1>
    <form action="/clients" method="post">
        @csrf
        <label for="nomeVenditore">Nome</label> <br>
        <input type="text" name="nomeVenditore" id="nomeVenditore"> <br><br>

        <label for="emailVenditore">Email</label> <br>
        <input type="text" name="emailVenditore" id="emailVenditore"> <br><br>

        <label for="telefonoVenditore">Telefono</label> <br>
        <input type="text" name="telefonoVenditore" id="telefonoVenditore"> <br><br>

        <label for="indirizzoVenditore">indirizzoVenditore</label> <br>
        <input type="text" name="indirizzoVenditore" id="indirizzoVenditore"> <br><br>



        <input type="submit" value="Registrati">
    </form>
@endsection

