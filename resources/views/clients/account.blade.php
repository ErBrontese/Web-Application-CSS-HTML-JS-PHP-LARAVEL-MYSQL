@extends('Layouts.LayoutProduct')


@section('classe','template-collection belle')
@section('content')

<style>

a, a:visited, a:hover, a:active {
  color: inherit;
}


.info {
    margin-top: -5px;
    margin-bottom: 5px;
    font-family: 'Montserrat', sans-serif;
    font-size: 11pt;
    color: white;
}

.name {
    margin-top: 20px;
    font-family: 'Montserrat', sans-serif;
    font-weight: 600;
    font-size: 18pt;
    color: white;

}


.stats {
    margin-top: 25px;
    text-align: center;
    padding-bottom: 20px;
    font-family: 'Montserrat', sans-serif;
    color: white;
}


.number-stat {
    padding: 0px;
    font-size: 14pt;
    font-weight: bold;
    font-family: 'Montserrat', sans-serif;
    color: white;

}

.desc-stat {
    margin-top: -15px;
    font-size: 10pt;
    color: white;

}

.col-xs-4 {
    width: 10%;
}

.button-59 {
    align-items: center;
    background-color: #fff;
    border: 2px solid #000;
    box-sizing: border-box;
    color: #000;
    cursor: pointer;
    display: inline-flex;
    fill: #000;
    font-family: Inter, sans-serif;
    font-size: 16px;
    font-weight: 600;
    height: 48px;
    justify-content: center;
    letter-spacing: -.8px;
    line-height: 24px;
    min-width: 140px;
    outline: 0;
    padding: 0 17px;
    text-align: center;
    text-decoration: none;
    transition: all .3s;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
}

.button-59:focus {
    color: #171e29;
}

.button-59:hover {
    border-color: #06f;
    color: #06f;
    fill: #06f;
}

.button-59:active {
    border-color: #06f;
    color: #06f;
    fill: #06f;
}

@media (min-width: 768px) {
    .button-59 {
        min-width: 170px;
    }
}





.container2 {
    width: 55%;
    margin-top: 2%;
    margin-left: 20%;
}

.collection-header {
    background-image: url("/images/fotoAccount.jpg")
}
</style>


<div id="page-content">

    <!--Collection Banner-->
    <div class="collection-header">

        <div class="collection-hero" style="backdrop-filter: blur(3px);">
            <div class="collection-hero__image">
                <img class=" lazyload" id="imgLogo" data-src="/images/Account.png" src="/images/Account.png" alt="Women"
                    title="Women" />
                @foreach($client as $info)
                <div id="infoAccount" >
                    <h1 id="nameAccount" style="color:black;" class="name">{{$info->nomeVenditore}}</h1>
                    <div id="emailAccount" style="color:black;" class="info">{{$info->emailVenditore}}</div>
                </div>
                @endforeach

                <div class="stats row" id="posBar" >
                    <div class="stat col-xs-4" id="posCol-XS">
                        <p class="number-stat" style="color:black;"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{$countReview}}</p>
                        <p class="desc-stat" id="posRecensione" style="color:black;">Recenesioni</p>
                    </div>
                    <div class="stat col-xs-4"  id="posCol-XD">
                        <p class="number-stat" style="color:black;">{{$countProduct}}</p>
                        <p class="desc-stat" style="color:black;">Prodotti inseriti</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="bredcrumbWrap">
            <div class="container breadcrumbs">
                <a href="/" title="Back to the home page">Home</a><span aria-hidden="true">›</span><span>Account
                </span>
            </div>
        </div>
    </div>

    <!--End Collection Banner-->
    <div class="container">
        <div class="row">
            <!--Sidebar-->
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar">
                <div class="closeFilter d-block d-md-none d-lg-none"><i class="icon icon anm anm-times-l"></i></div>
                <div class="sidebar_tags">
                    <!--Categories-->
                    <div class="widget-title">
                        <h2>Filtri</h2>
                    </div>


                    <!--Categories-->
                    <!-- HTML !-->
                    <button class="button-59" role="button"><a href="/clients/{{$idUtente}}/edit">Modifica informazioni
                            personali</a></button>
                    <br>
                    <br>
                    <button class="button-59" role="button"><a href="/show_Shopping/{{$idUtente}}">Acquisti
                            effettuati</a></button>
                    <br>
                    <br>

                    <button class="button-59" role="button"><a href="/products/create"> Inserisci prodotto</a></button>


                    <!--end Product Tags-->
                    </div>
            </div>


            <div class="container2">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12" id="posReview">
                        <div class="section-header text-center">
                            <h2 class="heading-font" style="font-size:20px;">Recenesioni effettuate</h2>

                            <a id="mostraTutte" href="/showAccount">Mostra tutte</a>
                        </div>
                    </div>
                </div>


                <div class="spr-review" style="border:1px sold black;">
                @foreach($reviews as $review )
                    <div class="spr-review-header">
                        <span class="product-review spr-starratings spr-review-header-starratings">
                            @for($i=0;$i<'5';$i++) @if($i<$review->votes) <i class="font-13 fa fa-star"></i>
                                @else
                                <i class="font-13 fa fa-star-o"></i>
                                @endif
                                @endfor
                        </span>

                        </h3>
                        <span class="spr-review-header-byline">
                            <strong>
                            </strong>
                            <!--Nome Utente-->
                            il <strong>{{$review->updated_at}}</strong>
                        </span>
                        <!--Data-->
                    </div>

                    <div class="spr-review-content">
                        <p class="spr-review-content-body">
                            {{$review->review}}
                        </p>
                    </div>
                    @endforeach

                </div>

               
            </div>




            <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">

                <hr>
                <div class="productList">
                    <!--Toolbar-->
                    <div id="buttonOperation">
                    <button type="button" class="btn btn-filter d-block d-md-none d-lg-none"> Operazioni</button>
                    </div>
                    <div class="toolbar">
                        <div class="filters-toolbar-wrapper">
                            <div class="row">

                                <div
                                    class="col-4 col-md-4 col-lg-4 text-center filters-toolbar__item filters-toolbar__item--count d-flex justify-content-center align-items-center">

                                </div>


                            </div>
                        </div>
                    </div>
                    <!--End Toolbar-->
                    <div class="section-header text-center">
                        <h2 class="h2 heading-font">Prodotti inseriti</h2>
                    </div>

                    <div class="grid-products grid--view-items">
                        <div class="row">

                            <?php $j=0 ?>
                            @if($product->count())
                            @foreach($product as $prod )
                            <div class="col-6 col-sm-6 col-md-4 col-lg-4 item">
                                <!-- start product image -->
                                <div class="product-image">
                                    <!-- start product image -->
                                    <a href="/products/{{$prod->id}}">
                                        <!-- image -->
                                        <img class="primary blur-up lazyload imgProd" data-src="{{$prod->immagine}}"
                                            src="{{$prod->immagine}}" alt="image" title="product" />
                                        <!-- End image -->
                                        <!-- Hover image -->
                                        <img class="hover blur-up lazyload imgProd" data-src="{{$prod->immagine}}"
                                            src="{{$prod->immagine}}" alt="image" title="product" />
                                        <!-- End hover image -->
                                    </a>
                                    <!-- end product image -->

                                    <!-- Start product button -->

                                    <div class="button-set">

                                        <button class="button-59" role="button"><a
                                                href="/products/{{$prod->id}}/edit">Modifica prodotto</a></button>
                                        <form action="/products/{{$prod->id}}" style="padding-top:50%;" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="button-59" role="button"><input  type="submit" style="border:none;" value="Elimina"></button>
                                            
                                   
                                            
                                        </form>
                                

                                    </div>
                                    <!-- end product button -->
                                </div>
                                <!-- end product image -->

                                <!--start product details -->
                                <div class="product-details text-center">
                                    <!-- product name -->
                                    <div class="product-name">
                                        <a href="/products/{{$prod->id}}">{{$prod->nameProdotto}}</a>
                                    </div>
                                    <!-- End product name -->
                                    <!-- product price -->
                                    <div class="product-price">
                                        <span class="price">{{$prod->prezzoProdotto}}€</span>
                                    </div>
                                    <!-- End product price -->
                                    <div class="reviewLink">

                                        @for($i=0;$i<'5';$i++) @if($i<$CountReviews[$j]) <i class="font-13 fa fa-star">
                                            </i>
                                            @else
                                            <i class="font-13 fa fa-star-o"></i>
                                            @endif
                                            @endfor

                                    </div>


                                </div>
                                <!-- End product details -->

                            </div>
                            <?php $j++; ?>
                            @endforeach
                            @elseif (count($product) == 0)
                            <h1 style="margin-left:20%">Nessun elemento è stato trovato </h1>
                            @endif
                        </div>
                    </div>
                </div>
                <hr class="clear">

                <div class="pagination" style="margin-left:40%;">
                    <ul>

                        {{ $product->links() }}

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


</div>

<!--End Footer-->

<!--Scoll Top-->
<span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
<!--End Scoll Top-->


<!-- Including Jquery -->
<script src="/js/vendor/jquery-3.3.1.min.js"></script>
<script src="/js/vendor/jquery.cookie.js"></script>
<script src="/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="/js/vendor/wow.min.js"></script>
<!-- Including Javascript -->
<script src="/js/bootstrap.min.js"></script>
<script src="/js/plugins.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/lazysizes.js"></script>
<script src="/js/main.js"></script>
<script src="/js/Home.js"></script>
<script>
$(document).ready(function() {
    $("#menuButton").click(function() {
        $("#menu").slideToggle();
    });
});


const countElementsWithClassFilter = document.getElementsByClassName('filter');
var value = localStorage.getItem('key');
for (let i = 0; i < countElementsWithClassFilter.length; i++) {
    var x = document.getElementsByClassName("filter")[i];
    x.setAttribute("value", value);
}


var value = localStorage.getItem('key');
var x = document.getElementById("search");
if (value != 'vuoto') {
    x.setAttribute("value", value);
} else {
    window.location.replace("/");
}
</script>
@endsection