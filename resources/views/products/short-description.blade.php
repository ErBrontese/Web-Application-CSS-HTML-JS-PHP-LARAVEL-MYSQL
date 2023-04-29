@php
use App\Models\Client;

$client = Client::findOrFail($product->client_id);
@endphp


@extends('Layouts.LayoutProduct')
@section('classe','template-product belle')
@section('content')
<style>



a:active {
    color: black;
}

a:visited {
    color: white;
}


a, a:visited, a:hover, a:active {
  color: inherit;
}



#Home:visited {
    color: black;
}
</style>


<!--Body Content-->
<div id="page-content">
    <!--MainContent-->
    <div id="MainContent" class="main-content" role="main">
        <!--Breadcrumb-->
        <div class="bredcrumbWrap">
            <div class="container breadcrumbs">
                <a id="Home" href="/" title="Back to the home page">Home</a><span
                    aria-hidden="true">›</span><span>Descrizione
                    prodotto</span>
            </div>
        </div>
        <!--End Breadcrumb-->

        <div id="ProductSection-product-template" class="product-template__container prstyle1 container">
            <!--product-single-->
            <div class="product-single">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="product-details-img">
                            <div class="product-thumb">
                                <div id="gallery" class="product-dec-slider-2 product-tab-left">
                                    <a data-image="{{$product->immagine}}" data-zoom-image="{{$product->immagine}}"
                                        class="slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true"
                                        tabindex="-1">
                                        <img class="blur-up lazyload" src="{{$product->immagine}}" alt="" />
                                    </a>
                                    <a data-image="{{$product->immagine2}}" data-zoom-image="{{$product->immagine2}}"
                                        class="slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true"
                                        tabindex="-1">
                                        <img class="blur-up lazyload" src="{{$product->immagine2}}" alt="" />
                                    </a>

                                    <a data-image="{{$product->immagine3}}" data-zoom-image="{{$product->immagine3}}"
                                        class="slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true"
                                        tabindex="-1">
                                        <img class="blur-up lazyload" src="{{$product->immagine3}}" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="zoompro-wrap product-zoom-right pl-20">
                                <div class="zoompro-span">
                                    <img class="zoompro blur-up lazyload" data-zoom-image="{{$product->immagine}}"
                                        alt="" src="{{$product->immagine}}" />


                                </div>
                                <div class="product-buttons">
                                    <a href="#" class="btn prlightbox" title="Zoom"><i
                                            class="icon anm anm-expand-l-arrows" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="lightboximages">
                                <a href="{{$product->immagine}}" data-size="1462x2048"></a>
                                <a href="{{$product->immagine2}}" data-size="1462x2048"></a>
                                <a href="{{$product->immagine3}}" data-size="1462x2048"></a>

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="product-single__meta">
                            <!--Titolo -->
                            <h1 class="product-single__title">{{$product->nameProdotto}}</h1>
                            
                            <div class="prInfoRow">
                                <div class="product-sku">Categoria:{{$product->categoria}}</div>
                                <div class="product-review">

                                    <a class="reviewLink" href="#tab2">
                                        @for($i=0;$i<'5';$i++) @if($i<$resultMedia) <i class="font-13 fa fa-star"></i>
                                            @else
                                            <i class="font-13 fa fa-star-o"></i>
                                            @endif
                                            @endfor
                                    </a>

                                    <span class="spr-badge-caption">{{$reviewCount}} recensioni</span>
                                </div>
                            </div>

                            <p class="product-single__price product-single__price-product-template">

                                <span
                                    class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                    <span id="ProductPrice-product-template"><span
                                            class="money">{{$product->prezzoProdotto}}€</span></span>
                                </span>
                            </p>

                        </div>
                        <div class="product-single__description rte">
                            <!-- Descrizione -->
                            <div>{{$product->descrizione}} </div>
                        </div>


                        <div class="swatch clearfix swatch-1 option2" data-option-index="1">
                            <!--Quantità -->
                            <div class="product-form__item">
                                <label class="header">Quantità: <span
                                        class="slVariant">{{$product->quantitaProdotto}}</span></label>
                            </div>
                        </div>

                        <div class="swatch clearfix swatch-0 option1" data-option-index="0">
                            <div class="product-form__item">
                                <label class="header">Venditore: <a
                                        href="/clients/{{$client->id}}">{{$client->nomeVenditore}}</a></label>
                            </div>
                        </div>

                        <div class="product-action clearfix">

                            <div class="product-form__item--quantity">
                                <?php $curPageName = $_SERVER['REQUEST_URI'];?>
                                <form class="wrapQtyBtn" action="/cart_products" method="post">
                                    @csrf
                                    <input type="hidden" name="cart_id" id="cart_id">
                                    <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">

                                    <div class="product-form__item--quantity">
                                                <div class="wrapQtyBtn">
                                                    <div class="qtyField">
                                                        <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                                        
                                                        <input type="text" id="Quantity" name="quantità" 
                                                        value="1" class="product-form__input qty">
                                                        <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                    </div>   

                                    


                                    <div class="product-form__item--submit">
                                        <button class="btn product-form__cart-submit" type="submit" tabindex="0">Add To
                                            Cart</button>

                                    </div>



                                    <script>
                                    var y = localStorage.getItem('key2');
                                    if (y.length != 0) {
                                        var x = document.getElementById("cart_id");
                                        x.setAttribute("value", y);
                                    }
                                    </script>
                                    <input type="hidden" name="curPageName" id="id" value="{{$curPageName}}">

                                </form>
                            </div>
                            <div class="shopify-payment-button" data-shopify="payment-button">
                                <button type="button"
                                    class="shopify-payment-button__button shopify-payment-button__button--unbranded">
                                    <a href="/cart_products/{{$idCart}}">Acquista</a>
                                </button>
                            </div>
                        </div>
                        <!-- End Product Action -->
                        </form>
                    </div>
                </div>
            </div>
            <!--End-product-single-->

            <!--Product Tabs-->
            <div class="tabs-listing">
                <ul class="product-tabs">
                    <li rel="tab1"><a class="tablink">Visualizza recensioni</a></li>
                    <li rel="tab2"><a class="tablink">Inserisci una recensione</a></li>
                </ul>
                <div class="tab-container">
                    <div id="tab1" class="tab-content">
                        <div id="shopify-product-reviews">
                            <div class="spr-container">
                                <form action="/reviews/{{$product->id}}" method="get">

                                    <input type="submit" value="5 Stelle" style="background-color: #53cb7f;" name="vote"
                                        class="buttonReview">
                                    <div class="structureReview">
                                        <div class="w3-border structureBar">
                                            <div class="w3-blue bar" style="width:{{$totalReview5}}%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="percentage"> {{$totalReview5}}%</div>
                                    <br><br>


                                    <input type="submit" value="4 Stelle" name="vote" class="buttonReview">
                                    <div class="structureReview">
                                        <div class="w3-border structureBar">
                                            <div class="w3-blue bar" style="width:{{$totalReview4}}%;">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="percentage"> {{$totalReview4}}%</div>
                                    <br><br>


                                    <input type="submit" value="3 Stelle" style="background-color: #d1df72;" name="vote"
                                        class="buttonReview">
                                    <div class="structureReview">
                                        <div class="w3-border structureBar">
                                            <div class="w3-blue bar" style="width:{{$totalReview3}}%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="percentage"> {{$totalReview3}}%</div>
                                    <br><br>


                                    <input type="submit" value="2 Stelle" name="vote" style="background-color: #e47382;"
                                        class="buttonReview">
                                    <div class="structureReview">
                                        <div class="w3-border structureBar">
                                            <div class="w3-blue bar" style="width:{{$totalReview2}}%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="percentage"> {{$totalReview2}}%</div>
                                    <br><br>

                                    <input type="submit" value="1 Stelle" name="vote" style="background-color: #e47382;"
                                        class="buttonReview">
                                    <div class="structureReview">
                                        <div class="w3-border structureBar">
                                            <div class="w3-blue bar" style="width:{{$totalReview1}}%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="percentage"> {{$totalReview1}}%</div>
                                    <br><br>

                                    <input style="display:none;" type="text" type="hidden" name="id" id="id"
                                        value="{{$product->id}}">
                                </form>


                                @foreach($reviews as $review )
                                <div class="spr-review">
                                    <div class="spr-review-header">
                                        <span class="product-review spr-starratings spr-review-header-starratings">
                                            @for($i=0;$i<'5';$i++) @if($i<$review->votes) <i
                                                    class="font-13 fa fa-star"></i>
                                                @else
                                                <i class="font-13 fa fa-star-o"></i>
                                                @endif
                                                @endfor
                                        </span>
                                        <h3 class="spr-review-header-title">{{$product->nameProdotto}}
                                        </h3>
                                        <span class="spr-review-header-byline">
                                            <strong>
                                                <a href="/clients/{{$review->client_id}}"><b>Utente:</b>
                                                    {{$review->nomeVenditore}}
                                                </a>
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
                                </div>

                                @endforeach


                            </div>
                        </div>
                    </div>
                    <div id="tab2" class="tab-content">
                        <div class="feedback">
                            <form action="/reviews" method="post">
                                @csrf

                                <label for="votes">Valutazione</label> <br>
                                <div class="rate">
                                    <input type="radio" id="star5" name="votes" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="votes" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="votes" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="votes" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="votes" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div>

                                <br><br><br>
                                <label for="review">Descrizione</label> <br>
                                <textarea name="review" id="review" cols="30" rows="10"></textarea> <br><br>


                                <input type="hidden" name="client_id" id="client_id" value="{{$idUtente}}"> <br><br>
                                <?php $curPageName = $_SERVER['REQUEST_URI'];?>
                                <div style="display:none;"> <input type="text" name="curPageName" id="id"
                                        value="{{$curPageName}}"></div>
                                <input style="display:none;" type="text" type="hidden" name="product_id" id="product_id"
                                    value="{{$product->id}}">
                                <input type="submit" value="Inserisci recensione">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Product Tabs-->
        @if($productsForCategoryCount !=0)
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                            <h2 class="h2 heading-font">Prodotti della stessa categoria</h2>
                        </div>
                    </div>
                </div>

                <div class="productSlider-style2 grid-products">
                    <?php $j=0 ?>
                    @foreach ($productsForCategory as $product)
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
                            <div class="reviewLink" href="#tab2">

                                @for($i=0;$i<'5';$i++) @if($i<$CountReviews[$j]) <i class="font-13 fa fa-star"></i>
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
            @endif


            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="section-header text-center">
                                <h2 class="h2 heading-font">Altri prodotti</h2>
                            </div>
                        </div>
                    </div>

                    <div class="productSlider-style2 grid-products">
                        <?php $k=0 ?>
                        @foreach ($otherProducts as $product)
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
                                    <button class="btn btn-addto-cart" onclick="CallMe();" tabindex="0">Add To
                                        Cart</button>
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

                                <div class="reviewLink" href="#tab2">

                                    @for($i=0;$i<'5';$i++) @if($i<$CountReviewsOtherProducts[$k]) <i
                                        class="font-13 fa fa-star"></i>
                                        @else
                                        <i class="font-13 fa fa-star-o"></i>
                                        @endif
                                        @endfor

                                </div>
                                <!-- End product price -->
                            </div>
                            <!-- End product details -->

                        </div>
                        <?php $k++; ?>
                        @endforeach
                    </div>

                </div>

            </div>



        </div>
        <!--#ProductSection-product-template-->
    </div>
    <!--MainContent-->
</div>
<!--End Body Content-->


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
<script src="/js/showProduct.js"></script>
<script src="/js/Home.js"></script>
<!-- Photoswipe Gallery -->
<script src="/js/vendor/photoswipe.min.js"></script>
<script src="/js/vendor/photoswipe-ui-default.min.js"></script>
<script>
$(':radio').change(function() {
    console.log('New star rating: ' + this.value);
});
</script>


<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div><button class="pswp__button pswp__button--close"
                    title="Close (Esc)"></button><button class="pswp__button pswp__button--share"
                    title="Share"></button><button class="pswp__button pswp__button--fs"
                    title="Toggle fullscreen"></button><button class="pswp__button pswp__button--zoom"
                    title="Zoom in/out"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button><button
                class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>
@endsection