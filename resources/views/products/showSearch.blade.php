<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        width: 40%;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    .container {
        padding: 2px 16px;
    }
    </style>
</head>

<body>
    <form action="/products/help_show" method="post">
        @csrf
        <input style="margin-left:35%;" type="text" name="value" id="search">
        <input style="display:none;" type="number" type="hidden" name="filterPrice" value="10">
        <input type="submit" value="Search Project by numeric ID">
        <script>
        var value = localStorage.getItem('key');
        var x = document.getElementById("search");
       if(value != 'vuoto'){ 
        x.setAttribute("value", value);
        } 
        </script>
    </form>

    <br>
    <br>
    <form action="/products/help_show" method="post">
        <label for="categoria">Prezzo prodotto</label> <br>
        @csrf
        <input type="range" name="valueSearchPrice" min="1" max="100"
            oninput="this.nextElementSibling.value = this.value">
        <output>24</output><i>€</i>
        <input style="display:none;" type="number" type="hidden" name="filterPrice" id="id" value="20">
        <input style="display:none;" type="text" type="hidden" name="nameSearch" class="filter" value="">
        <input style="display:inline-block;" type="submit" value="Cerca">
    </form>

    <form action="/products/help_show" method="post">
        @csrf
        <input  style="display:none;" type="number" name="valueSearchPrice" value="25">
        <input style="display:none;" type="number" type="hidden" name="filterPrice" id="id" value="30">
        <input style="display:none;" type="text" type="hidden" name="nameSearch" class="filter" value="">
        <input type="submit" value="Fino a 25€">
    </form>

    <form action="/products/help_show" method="post">
        @csrf
        <input  style="display:none;" type="number" name="valueSearchPrice" value="1">
        <input  style="display:none;" type="number" name="valueSearchPrice1" value="25">
        <input  style="display:none;" type="number" name="valueSearchPrice2" value="45">
        <input style="display:none;" type="number" type="hidden" name="filterPrice" id="id" value="40">
        <input style="display:none;" type="text" type="hidden" name="nameSearch" class="filter" value="">
        <input type="submit" value="25€ a 45€">
    </form>

    <form action="/products/help_show" method="post">
        @csrf
        <input  style="display:none;" type="number" name="valueSearchPrice" value="1">
        <input  style="display:none;" type="number" name="valueSearchPrice1" value="45">
        <input  style="display:none;" type="number" name="valueSearchPrice2" value="65">
        <input style="display:none;" type="number" type="hidden" name="filterPrice" id="id" value="40">
        <input style="display:none;" type="text" type="hidden" name="nameSearch" class="filter" value="">
        <input type="submit" value="45€ a 65€">
    </form>

    <form action="/products/help_show" method="post">
        @csrf
        <input  style="display:none;" type="number" name="valueSearchPrice" value="1">
        <input  style="display:none;" type="number" name="valueSearchPrice1" value="65">
        <input  style="display:none;" type="number" name="valueSearchPrice2" value="85">
        <input style="display:none;" type="number" type="hidden" name="filterPrice" id="id" value="40">
        <input style="display:none;" type="text" type="hidden" name="nameSearch" class="filter" value="">
        <input type="submit" value="65€ a 85€">
    </form>

    <form action="/products/help_show" method="post">
        @csrf
        <input  style="display:none;" type="number" name="valueSearchPrice" value="1">
        <input  style="display:none;" type="number" name="valueSearchPrice1" value="85">
        <input  style="display:none;" type="number" name="valueSearchPrice2" value="100">
        <input style="display:none;" type="number" type="hidden" name="filterPrice" id="id" value="40">
        <input style="display:none;" type="text" type="hidden" name="nameSearch" class="filter" value="">
        <input type="submit" value="85€ a 100€">
    </form>

    <form action="/products/help_show" method="post">
        <label for="categoria">Quantità prodotto</label> <br>
        @csrf
        <input   type="number" name="valueSearchAmount" value="">
        <input  style="display:none;" type="number" name="valueSearchPrice" value="1">
        <input style="display:none;" type="number" type="hidden" name="filterPrice" id="id" value="50">
        <input style="display:none;" type="text" type="hidden" name="nameSearch" class="filter" value="">
        <input style="display:inline-block;" type="submit" value="Cerca">
    </form>



    <script>
    const countElementsWithClassFilter = document.getElementsByClassName('filter');
    var value = localStorage.getItem('key');
    for (let i = 0; i < countElementsWithClassFilter.length; i++) {
        var x = document.getElementsByClassName("filter")[i];
        x.setAttribute("value", value);
    }
    </script>


    <br>
    @if($reviews->count())
   
    @foreach($reviews as $review )
    <div class="card">
    <img src="{{$review->immagine}}" alt="Avatar" style="width:100%">
        <div class="container">
            <h4><b>{{$review->categoria}}</b></h4>
            <p>{{$review->id}}</p>
            <p>{{$review->nameProdotto}}</p>
            <p>{{$review->descrizione}}</p>
            <p>Prezzo {{$review->prezzoProdotto}}€</p>
            <p><a href="/products/{{$review->id}}">Apri</a> </p>
        </div>
    </div>
    

    @endforeach
    @elseif (count($reviews) == 0)
        <b>Nessun elemento è stato trovato </b>
    @endif 
   
    {!! $reviews->render() !!}
    

  


    <footer>
        <br>
        <hr width="40%" style="text-align:left;margin-left:0">
        <a href="/">Home</a><BR>
        <a href="/README.md">Show README.md</a>
    </footer>



</body>

</html>