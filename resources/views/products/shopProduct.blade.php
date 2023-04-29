@extends('Layouts.LayoutProduct')
@section('classe','template-collection belle')



@section('content')


<div id="page-content">
<div class="bredcrumbWrap">
            <div class="container breadcrumbs">
                <a href="/" title="Back to the home page">Home</a><span aria-hidden="true">›</span><span>Prodotti
                </span>
            </div>
        </div>
    <!--Collection Banner-->
    <div class="collection-header">
        <div class="collection-hero">
            <div class="collection-hero__image"><img class=" lazyload" data-src="/images/piastrelle-marocchine-colorate-per-lo-sfondo.jpg"
                    src="/images/piastrelle-marocchine-colorate-per-lo-sfondo.jpg" alt="Women" title="Women" /></div>

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

                    <div class="sidebar_widget filterBox filter-widget">
                        <div class="widget-title">
                            <h2>Prezzo</h2>
                        </div>
                        <div id="menu" style="display:none;">
                            <form action="/products/help_show" method="post" class="price-filter">
                                <label for="categoria">Prezzo prodotto</label> <br>
                                @csrf
                                <input type="range" name="valueSearchPrice" min="1" max="100"
                                    oninput="this.nextElementSibling.value = this.value">
                                <output style="display:inline">24</output><i style="display:inline;">€</i>
                                <input style="display:none;" type="number" type="hidden" name="filterPrice" id="id"
                                    value="20">
                                <input style="display:none;" type="text" type="hidden" name="nameSearch" class="filter"
                                    value="">
                                <input style="display:inline-block;" type="submit" value="Cerca">
                            </form>
                        </div>
                    </div>





                    <div class="sidebar_widget filterBox filter-widget">
                        <div class="widget-title">
                            <h2>Range rezzo</h2>
                        </div>
                        <div id="menu" style="display:none;">
                            <form action="/products/help_show" method="post">
                                @csrf
                                <input style="display:none;" type="number" name="valueSearchPrice" value="25">
                                <input style="display:none;" type="number" type="hidden" name="filterPrice" id="id"
                                    value="30">
                                <input style="display:none;" type="text" type="hidden" name="nameSearch" class="filter"
                                    value="">
                                <input type="submit" value="Fino a 25€">
                            </form>

                            <form action="/products/help_show" method="post">
                                @csrf
                                <input style="display:none;" type="number" name="valueSearchPrice" value="1">
                                <input style="display:none;" type="number" name="valueSearchPrice1" value="25">
                                <input style="display:none;" type="number" name="valueSearchPrice2" value="45">
                                <input style="display:none;" type="number" type="hidden" name="filterPrice" id="id"
                                    value="40">
                                <input style="display:none;" type="text" type="hidden" name="nameSearch" class="filter"
                                    value="">
                                <input type="submit" value="25€ a 45€">
                            </form>

                            <form action="/products/help_show" method="post">
                                @csrf
                                <input style="display:none;" type="number" name="valueSearchPrice" value="1">
                                <input style="display:none;" type="number" name="valueSearchPrice1" value="45">
                                <input style="display:none;" type="number" name="valueSearchPrice2" value="65">
                                <input style="display:none;" type="number" type="hidden" name="filterPrice" id="id"
                                    value="40">
                                <input style="display:none;" type="text" type="hidden" name="nameSearch" class="filter"
                                    value="">
                                <input type="submit" value="45€ a 65€">
                            </form>

                            <form action="/products/help_show" method="post">
                                @csrf
                                <input style="display:none;" type="number" name="valueSearchPrice" value="1">
                                <input style="display:none;" type="number" name="valueSearchPrice1" value="65">
                                <input style="display:none;" type="number" name="valueSearchPrice2" value="85">
                                <input style="display:none;" type="number" type="hidden" name="filterPrice" id="id"
                                    value="40">
                                <input style="display:none;" type="text" type="hidden" name="nameSearch" class="filter"
                                    value="">
                                <input type="submit" value="65€ a 85€">
                            </form>

                            <form action="/products/help_show" method="post">
                                @csrf
                                <input style="display:none;" type="number" name="valueSearchPrice" value="1">
                                <input style="display:none;" type="number" name="valueSearchPrice1" value="85">
                                <input style="display:none;" type="number" name="valueSearchPrice2" value="100">
                                <input style="display:none;" type="number" type="hidden" name="filterPrice" id="id"
                                    value="40">
                                <input style="display:none;" type="text" type="hidden" name="nameSearch" class="filter"
                                    value="">
                                <input type="submit" value="85€ a 100€">
                            </form>
                        </div>
                    </div>

                    <div class="sidebar_widget filterBox filter-widget">
                        <div class="widget-title">
                            <h2>Quantità</h2>
                        </div>
                        <div id="menu" style="display:none;">
                            <form action="/products/help_show" method="post">
                                <label for="categoria">Quantità prodotto</label> <br>
                                @csrf
                                <input type="number" name="valueSearchAmount" value="">
                                <br>

                                <input style="display:none;" type="number" name="valueSearchPrice" value="1">
                                <input style="display:none;" type="number" type="hidden" name="filterPrice" id="id"
                                    value="50">
                                <input style="display:none;" type="text" type="hidden" name="nameSearch" class="filter"
                                    value="">
                                <br>
                                <input style="display:inline-block;" type="submit" value="Cerca">
                            </form>

                        </div>
                    </div>









                    <!--end Product Tags-->
                </div>
            </div>
            <!--End Sidebar-->
            <!--Main Content-->
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">

                <hr>
                <div class="productList">
                    <!--Toolbar-->
                    <button type="button" id="btnFilter" class="btn btn-filter d-block d-md-none d-lg-none"> Product
                        Filters</button>
                    <div class="toolbar">
                        <div class="filters-toolbar-wrapper">
                            <div class="row">

                                <div
                                    class="col-4 col-md-4 col-lg-4 text-center filters-toolbar__item filters-toolbar__item--count d-flex justify-content-center align-items-center">
                                    <span class="filters-toolbar__product-count">Elementi trovati:
                                        {{$countResult}}</span>
                                </div>


                            </div>
                        </div>
                    </div>
                    <!--End Toolbar-->
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
                                    <form class="variants add" action="#" onclick="window.location.href='cart.html'"
                                        method="post">
                                        <button class="btn btn-addto-cart" type="button">Add to cart</button>
                                    </form>
                                    <div class="button-set">
                                        <a href="javascript:void(0)" title="Quick View"
                                            class="quick-view-popup quick-view" data-toggle="modal"
                                            data-target="#content_quickview">
                                            <i class="icon anm anm-search-plus-r"></i>
                                        </a>
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

                <div class="pagination">
                    <ul>

                    {{ $product->links() }}

                    </ul>
                </div>
            </div>
            <!--End Main Content-->
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
}else{
    window.location.replace("/");
}
</script>
@endsection