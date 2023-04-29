@extends('layout')

@section('content')

<?php 
 $status = Session::get('status');
 $msgStatus = Session::get('msgStatus');
?>
    <h1>Operazioni su prodotto</h1>
    @if($status==1)
    <div  class="alert alert-info">
        <ul>
            <li><?php echo $msgStatus ?></li>
            <?php 
            Session::forget('status');
            ?>
        </ul>
    </div>
    <?php 
        $array="<script>localStorage.getItem('key1');</script>";
        $valore=explode(",",$array)
    ?>
@endif

    <form   action="/products/help_show" method="post">
        @csrf
        <input style="margin-left:35%;" type="text" name="value" id="value">
        <input style="display:none;" type="number" type="hidden" name="filterPrice"  value="10">
        <input  type="submit" value="Search Project by numeric ID">
    </form>

    <form action="/products/create" method="get">
        <input type="submit" value="Create Project"> <br><br>
    </form>

    <form action="/products" method="get">
        <input type="submit" value="Show All Projects"> <br><br>
    </form>

    

    <form action="/products" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete All Projects"> <br><br>
    </form>


    <h1>Operazioni su clientu</h1>

    <form action="/clients/create" method="get">
        <input type="submit" value="Create Project"> <br><br>
    </form>


    <form action="/clients" method="get">
        <input type="submit" value="Mostra utenti"> <br><br>
    </form>

    <form action="/clients/help_show" method="post">
        @csrf
        <input type="submit" value="Search Task by numeric ID">
        <input type="number" name="id" id="id"> <br><br>
    </form>

    <form action="/clients" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete All Tasks">
    </form>
    <br>

    

    
@endsection