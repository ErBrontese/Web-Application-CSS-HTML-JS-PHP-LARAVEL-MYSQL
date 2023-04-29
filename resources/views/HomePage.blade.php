@extends('Layouts.LayoutHome')
@section('classe','template-index home8-jewellery belle')
@section('content')

<?php 
    $image=array();
    array_push($image,'/images/pistacchio.jpg');
    array_push($image,"/images/noci.jpg");
    array_push($image,"/images/noccioline.jpg");
    array_push($image,"/images/Mandorle.jpg");
    array_push($image,"/images/olio.jpg");
    $name=array();
    array_push($name,"Pistacchio");
    array_push($name,"Noci");
    array_push($name,"Noccioline");
    array_push($name,"Mandorle");
    array_push($name,"Olio");
    

?>

<style>
.container2 {
    max-width: 1300px;
    padding-left: 30px;
    padding-right: 30px;
}


@media (max-width: 575px) {
    .container2 {
        max-width: 300px;
        padding-left: 15px;
        padding-right: 15px;
        margin-top: 93%;
        margin-left: 10%;
        margin-right: 13%;
    }
}

@media (max-width: 575px) {
    .container2 {
        max-width: 300px;
        padding-left: 15px;
        padding-right: 15px;
        margin-top: 93%;
        margin-left: 10%;
        margin-right: 10%;
    }

    .variants.add .btn {
        padding: 5px 12px;
        font-size: 10px;
        background-color: #000;
    }

    .logoImg {
        width: 30px;
        height: 30px;
    }

    .logo {
        padding-top: 20px;
        padding-bottom: 11px;
        margin: 0;
    }
}

@media (min-width: 576px) and (max-width: 767px) {
    .container2 {
        max-width: 500px;
        padding-left: 0px;
        padding-right: 0px;
        margin-top: 47%;
        margin-left: 7%;
    }

    .variants.add .btn {
  padding: 5px 12px;
  font-size: 10px;
  
}
}


@media (max-width: 999px) {
    .container2 {

        margin-left: -1%;
    }
}


@media (max-width: 1300px) {
    .container2 {

        margin-left: 2%;
    }
}

@media (min-width: 1350px) {
    .container2 {

        margin-left: 5%;
    }
}
</style>


<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

<!--Search Form Drawer-->

<!--End Mobile Menu-->

<!--Body Content-->
<div id="page-content">

    <!--Home slider-->
    <div class="slideshow slideshow-wrapper pb-section">
        <div class="home-slideshow">
            <div class="slide">
                <div class="blur-up lazyload">
                    <img class="blur-up lazyload" data-src="/images/mappa-siciliaMod.jpg"
                        src="/images/mappa-sicilia.jpg" alt="Wedding bands" title="Wedding bands" />
                    <div class="slideshow__text-wrap slideshow__overlay classic middle">
                        <div class="slideshow__text-content middle">
                            <div class="container">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container2">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-header text-center">
                        <h2 class="h2 heading-font">Categorie prodotti</h2>
                        <p>Guarda le Categorie di prodotti che SiciliyMarket ti offre</p>
                    </div>
                </div>
            </div>

            <div class="productSlider-style2 grid-products">
                <?php $j=0 ?>
                @for($i=0,$j=0,$k=0;$i<'5';$i++,$k++,$j++) <div class="col-12 item">

                    <!-- start product image -->
                    <div class="product-image">
                        <!-- start product image -->
                        <a class="grid-view-item__link">
                            <!-- image -->
                            <img class="primary blur-up lazyload imgProd" data-src="{{$image[$i]}}" src="{{$image[$i]}}"
                                alt="image" title="product">
                            <!-- End image -->
                            <!-- Hover image -->
                            <img class="hover blur-up lazyload imgProd" data-src="{{$image[$i]}}" src="{{$image[$i]}}"
                                alt="image" title="product">
                            <!-- End hover image -->
                        </a>
                        <!-- end product image -->
                        <!-- Start product button -->


                        <form class="variants add" action="/products/help_show" method="post">
                            @csrf
                            <input style="display:none; class=" search__input" type="search" name="value" id="value"
                                value="{{$name[$j]}}">
                            <input style="display:none;" type="number" type="hidden" name="filterPrice" value="10">

                            <input class="btn btn-addto-cart" type="submit" value="{{$name[$j]}}">
                        </form>



                    </div>
                    <!-- end product image -->
                    <!--start product details -->


            </div>

            @endfor
        </div>

    </div>

</div>



<!--End  Category -->

<!--Start prodotti recenti-->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="section-header text-center">
                    <h2 class="h2 heading-font">Nuovi prodotti</h2>
                    <p>Acquistali prima che finiscano</p>
                </div>
            </div>
        </div>

        <div class="productSlider-style2 grid-products">
            <?php $j=0 ?>
            @foreach ($products as $product)
            <div class="col-12 item">

                <!-- start product image -->
                <div class="product-image">
                    <!-- start product image -->
                    <a href="/products/{{$product->id}}" class="grid-view-item__link">
                        <!-- image -->
                        <img class="primary blur-up lazyload imgProd" data-src="{{$product->immagine}}"
                            src="{{$product->immagine}}" alt="image" title="product">
                        <!-- End image -->
                        <!-- Hover image -->
                        <img class="hover blur-up lazyload imgProd" data-src="{{$product->immagine}}"
                            src="{{$product->immagine}}" alt="image" title="product">
                        <!-- End hover image -->
                    </a>
                    <!-- end product image -->
                    <!-- Start product button -->


                    <?php $curPageName = $_SERVER['REQUEST_URI'];?>
                    <form class="variants add" action="/cart_products" method="post">
                        @csrf
                        <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
                        <input type="hidden" name="quantità" value="1">
                        <input type="hidden" name="cart_id" id="cart_id">
                        <input type="hidden" name="curPageName" id="id" value="{{$curPageName}}">
                        <button class="btn btn-addto-cart" onclick="CallMe();" tabindex="0">Add To Cart</button>
                        <script>
                        var y = localStorage.getItem('key2');
                        if (y.length != 0) {
                            var x = document.getElementById("cart_id");
                            x.setAttribute("value", y);

                        }
                        </script>
                    </form>


                    
                    <!-- end product button -->
                </div>
                <!-- end product image -->
                <!--start product details -->
                <div class="product-details text-center">
                    <!-- product name -->
                    <div class="product-name">
                        <a href="/products/{{$product->id}}">{{$product->nameProdotto}}</a>
                    </div>
                    <!-- End product name -->
                    <!-- product price -->
                    <div class="product-price">
                        <span class="price">{{$product->prezzoProdotto}}Є</span>
                    </div>
                    <div class="reviewLink">

                        @for($i=0;$i<'5';$i++) @if($i<$CountReviewsProducts[$j]) <i class="font-13 fa fa-star"></i>
                            @else
                            <i class="font-13 fa fa-star-o"></i>
                            @endif
                            @endfor

                    </div>
                    <!-- End product price -->
                </div>
                <!-- End product details -->

            </div>
            <?php $j++; ?>
            @endforeach
        </div>

    </div>

</div>

<!--Start prodotti più votati-->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="section-header text-center">
                    <h2 class="h2 heading-font">I più votati</h2>
                    <p>Provali anche tu </p>
                </div>
            </div>
        </div>

        <div class="productSlider-style2 grid-products">
            <?php $j=0 ?>
            @foreach ($productsTop as $product)
            <div class="col-12 item">

                <!-- start product image -->
                <div class="product-image">
                    <!-- start product image -->
                    <a href="/products/{{$product->id}}" class="grid-view-item__link">
                        <!-- image -->
                        <img class="primary blur-up lazyload imgProd" data-src="{{$product->immagine}}"
                            src="{{$product->immagine}}" alt="image" title="product">
                        <!-- End image -->
                        <!-- Hover image -->
                        <img class="hover blur-up lazyload imgProd" data-src="{{$product->immagine}}"
                            src="{{$product->immagine}}" alt="image" title="product">
                        <!-- End hover image -->
                    </a>
                    <!-- end product image -->
                    <!-- Start product button -->
                    <?php $curPageName = $_SERVER['REQUEST_URI'];?>
                    <form class="variants add" action="/cart_products" method="post">
                        @csrf
                        <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
                        <input type="hidden" name="quantità" value="1">
                        <input type="hidden" name="curPageName" id="id" value="{{$curPageName}}">
                        <button class="btn btn-addto-cart" onclick="CallMe();" tabindex="0">Add To Cart</button>
                        <script>
                        var y = localStorage.getItem('key2');
                        if (y.length != 0) {
                            var x = document.getElementById("cart_id");
                            x.setAttribute("value", y);

                        }
                        </script>
                    </form>
                    <!-- end product button -->
                </div>
                <!-- end product image -->
                <!--start product details -->
                <div class="product-details text-center">
                    <!-- product name -->
                    <div class="product-name">
                        <a href="/products/{{$product->id}}">{{$product->nameProdotto}}</a>
                    </div>
                    <!-- End product name -->
                    <!-- product price -->
                    <div class="product-price">
                        <span class="price">{{$product->prezzoProdotto}}Є</span>
                    </div>

                    <div class="reviewLink">

                        @for($i=0;$i<'5';$i++) <i class="font-13 fa fa-star"></i>

                            @endfor

                    </div>
                    <!-- End product price -->
                </div>
                <!-- End product details -->

            </div>
            <?php $j++; ?>
            @endforeach
        </div>

    </div>

</div>


<!--end prodotti recenti-->


<!-- Start prodotti più acquistati -->

<!--Start prodotti più votati-->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="section-header text-center">
                    <h2 class="h2 heading-font">I più acquistati</h2>
                    <p>Provali anche tu </p>
                </div>
            </div>
        </div>

        <div class="productSlider-style2 grid-products">
            <?php $z=0 ?>
            @foreach ($productMostShopping as $product)
            <div class="col-12 item">

                <!-- start product image -->
                <div class="product-image">
                    <!-- start product image -->
                    <a href="/products/{{$product->id}}" class="grid-view-item__link">
                        <!-- image -->
                        <img class="primary blur-up lazyload imgProd" data-src="{{$product->immagine}}"
                            src="{{$product->immagine}}" alt="image" title="product">
                        <!-- End image -->
                        <!-- Hover image -->
                        <img class="hover blur-up lazyload imgProd" data-src="{{$product->immagine}}"
                            src="{{$product->immagine}}" alt="image" title="product">
                        <!-- End hover image -->
                    </a>
                    <!-- end product image -->
                    <!-- Start product button -->
                    <?php $curPageName = $_SERVER['REQUEST_URI'];?>
                    <form class="variants add" action="/cart_products" method="post">
                        @csrf
                        <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
                        <input type="hidden" name="quantità" value="1">
                        <input type="hidden" name="cart_id" id="cart_id">
                        <input type="hidden" name="curPageName" id="id" value="{{$curPageName}}">
                        <button class="btn btn-addto-cart" onclick="CallMe();" tabindex="0">Add To Cart</button>
                        <script>
                        var y = localStorage.getItem('key2');
                        if (y.length != 0) {
                            var x = document.getElementById("cart_id");
                            x.setAttribute("value", y);

                        }
                        </script>
                    </form>
                    <!-- end product button -->
                </div>
                <!-- end product image -->
                <!--start product details -->
                <div class="product-details text-center">
                    <!-- product name -->
                    <div class="product-name">
                        <a href="/products/{{$product->id}}">{{$product->nameProdotto}}</a>
                    </div>
                    <!-- End product name -->
                    <!-- product price -->
                    <div class="product-price">
                        <span class="price">{{$product->prezzoProdotto}}Є</span>
                    </div>

                    <div class="reviewLink">

                        @for($i=0;$i<'5';$i++) @if($i<$productMostShoppingVotes[$z]) <i class="font-13 fa fa-star">
                            </i>
                            @else
                            <i class="font-13 fa fa-star-o"></i>
                            @endif
                            @endfor

                    </div>
                    <!-- End product price -->
                </div>
                <!-- End product details -->

            </div>
            <?php $z++; ?>
            @endforeach
        </div>

    </div>

</div>




<!--Store Feature-->
<div class="store-feature section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="display-table store-info">
                    <li class="display-table-cell">
                        <i class="icon anm anm-truck-l"></i>
                        <h5>Free Shipping Worldwide</h5>
                        <span class="sub-text">
                            Diam augue augue in fusce voluptatem
                        </span>
                    </li>
                    <li class="display-table-cell">
                        <i class="icon anm anm-money-bill-ar"></i>
                        <h5>Money Back Guarantee</h5>
                        <span class="sub-text">
                            Use this text to display your store information
                        </span>
                    </li>
                    <li class="display-table-cell">
                        <i class="icon anm anm-comments-l"></i>
                        <h5>24/7 Help Center</h5>
                        <span class="sub-text">
                            Use this text to display your store information
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--End Store Feature-->
</div>
<!-- Newsletter Popup -->

<!--End Body Content-->

<!--End Footer-->
<!--Scoll Top-->
<span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
<!--End Scoll Top-->
<!-- Newsletter Popup -->



<!-- Including Jquery -->
<script src="/js/vendor/jquery-3.3.1.min.js"></script>
<script src="/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="/js/vendor/jquery.cookie.js"></script>
<script src="/js/vendor/wow.min.js"></script>
<script src="/js/vendor/instagram-feed.js"></script>
<!-- Including Javascript -->
<script src="/js/bootstrap.min.js"></script>
<script src="/js/plugins.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/lazysizes.js"></script>
<script src="/js/main.js"></script>
<script src="/js/Home.js"></script>

<!--Instagram Js-->

<!--End Instagram Js-->
<!--For Newsletter Popup-->

<!--End For Newsletter Popup-->

@endsection