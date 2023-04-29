@extends('Layouts.LayoutProduct')
<style>


img {
  width: 200px;
  height: 400px;
  border: 1px solid #000;
  margin: 10px 0;
}



.ImgCart {
  height: 125px;
}


</style>
@section('classe','template-collection belle')
@section('content')





<div id="page-content">
<div class="bredcrumbWrap">
            <div class="container breadcrumbs">
                <a href="/" title="Back to the home page">Home</a><span aria-hidden="true">›</span>
                <a href="/account" title="Back to the home page">Account</a><span aria-hidden="true">›</span>
                <span aria-hidden="true">I miei acquisti</span>
            </div>
        </div>

    <!--Collection Banner-->
    <div class="collection-header" style="margin-top:-3%;">
        <div class="collection-hero" >
            <div class="collection-hero__image ">
                <img  data-src="/images/Myshopping.jpg"
                    src="/images/Myshopping.jpg" alt="Women" style="object-fit: cover;"  title="Women" />
            </div>

        </div>
    </div>

   
    <!--End Collection Banner-->

    <div class="container2">
        <div class="row">
            <!--Sidebar-->
            
            <!--End Sidebar-->
            <!--Main Content-->
            <div class="col-15 col-sm-15 col-md-10 col-lg-10 main-col" id="showProduct" >
            <h2 class="h2 heading-font">Prodotti acquistati</h2>

                <hr>
                <div class="productList">
                    <!--Toolbar-->
                   
                    <div class="toolbar">
                        <div class="filters-toolbar-wrapper">
                            <div class="row">
                                

                                <div
                                    class="col-4 col-md-4 col-lg-4 text-center filters-toolbar__item filters-toolbar__item--count d-flex justify-content-center align-items-center">
                                    <span class="filters-toolbar__product-count">Elementi acquistati:
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