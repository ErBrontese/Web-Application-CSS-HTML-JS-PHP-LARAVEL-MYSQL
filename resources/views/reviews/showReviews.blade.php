@extends('Layouts.LayoutProduct')


@section('classe','template-collection belle')
@section('content')

<style>
#imgLogo {
    width: 10%;
    margin-top: 5%;
    margin-left: 45%;
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
    border-bottom: 1px solid #ededed;
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
    margin-left: 27%;
}
</style>


<div id="page-content">
<div class="bredcrumbWrap">
            <div class="container breadcrumbs">
                <a href="/" title="Back to the home page">Home</a><span aria-hidden="true">›</span><a href="/account" title="Back to the home page">Account</a><span aria-hidden="true">›</span><span aria-hidden="true">Tutte le recensioni</span
            </div>
        </div>
    <!--Collection Banner-->
    <div class="collection-header" style="background-color:red; margin-top:1%">
        <div class="collection-hero">
            <div class="collection-hero__image">
                <img class=" lazyload" id="imgLogo" data-src="/images/logoUtente.png" src="/images/logoUtente.png"
                    alt="Women" title="Women" />
                @foreach($client as $info)
                <div style="margin-top:1%">
                    <h1 style="margin-left:47%" class="name">{{$info->nomeVenditore}}</h1>
                    <div style="margin-left:45%" class="info">{{$info->emailVenditore}}</div>
                </div>
                @endforeach

                <div class="stats row" style="margin-left: 47%;">
                    <div class="stat col-xs-4">
                        <p class="number-stat">{{$countReview}}</p>
                        <p class="desc-stat" style="margin-left:-20%">Recenesioni</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--End Collection Banner-->
    <div class="container">
        <div class="row">
            <!--Sidebar-->
            

            <div class="container2">
            
                @foreach($reviews as $review )
                <div class="spr-review" style="border:1px sold black;">
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
                </div>
               

                @endforeach
                <div class="pagination">
                    <ul>

                    {{ $reviews->links() }}

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