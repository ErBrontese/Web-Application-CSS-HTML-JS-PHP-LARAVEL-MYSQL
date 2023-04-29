@extends('Layouts.LayoutProduct')

<style>
/*Help*/
.big-text {
    font-size: 76px;
    font-weight: 400;

}

.med-text {
    font-size: 40px;
}

.normal-text {
    font-size: 20px;
}

.small-text {
    font-size: 14px;
}



.mt-1 {
    margin-top: 50px;
}

.mt-2 {
    margin-top: 100px;
}

.mt-3 {
    margin-top: 150px;
}

.text_white {
    color: white;
}


/*Help*/

/*Menu-alto */


.navbar-brand,
.navbar-nav>li>a {

    height: 80px;
    line-height: 50px;
}


.name {
    display: inline-block;
}

p {
    margin-top: 0;
    margin-bottom: 1rem;
    display: inline-block;
}


.navbar {

    padding-top: .5rem;
    padding-bottom: .10rem;
}


.navbar-toggler {
    padding: .25rem .75rem;
    font-size: 1.25rem;
    line-height: 1;
    background-color: transparent;
    border-radius: .25rem;
    transition: box-shadow .15s ease-in-out;
}


.navbar-nav {
    padding-left: 20px;
    margin-bottom: 0;
    list-style: none;
}


dl,
ol,
ul {
    margin-top: 10px;
    margin-bottom: 1rem;
}


#logo {
    height: 70px;
    width: 70px;
}




@media (max-width: 767px) {
    #navbar-brand-title {
        font-size: 40px;
    }

}






/*Menu-alto */

/*COVER-INIZIO*/


.poster {
    display: flex;
    height: 100vh;
    width: 100%;
    align-items: center;
}

.poster__img {


    width: 65%;
    height: 100%;
}

.poster__img img {
    object-fit: cover;
    width: 100%;
    height: 100%;
}

.poster__content {
    width: 35%;
    padding: 50px;
}


#prodottiInseriti {
    display: none;
}

#text {
    margin-top: 20px;
    margin-left: 100px;
    position: absolute;
}


#carousel-item-title {
    margin-top: 50px;
    margin-left: 5px;
    position: absolute;
}

#carousel-item-description {
    margin-top: 130px;
    margin-left: 5px;
    position: absolute;
}


#mobile {
    visibility: hidden;
}


@media (max-width: 767px) {
    .big-text {
        font-size: 40px;
        font-weight: 900;

    }


    .med-text {
        font-size: 30px;
    }


    #mobile {
        visibility: visible;
        margin-top: 0;
        margin-left: 0;

    }

}


/*COVER-FINE*/


/*HEADER-INZIALE*/


@media (max-width: 768px) {
    .poster {
        flex-wrap: wrap;
        height: auto;
    }

    .poster__img,
    .poster__content {
        width: 150%;
    }

    .poster__img {
        width: 250%;
        margin-left: 0px;


    }
}

/*HEADER-FINALE*/



/*HEADER-INIZIALE-2*/
.bg-cover {
    display: flex;
    padding: 100px 0;
    background: linear-gradient(0deg, rgba(0, 0, 0, .7), rgba(0, 0, 0, .7)),
        url("/images/pexels-francesco-frilli-6511682.jpg") no-repeat center center;
    background-size: cover;

}

.menu a:hover {
    color: red;
}




@media (min-width: 768px) {
    .bg-cover {
        flex-wrap: wrap;
        height: auto;
        background-position: -10% 10%;
    }

    .bg-cover__text,
    .bg-cover__title {
        width: 100%;
    }

}

.bg-cover__text {
    width: 50%;
    padding: 30px;
}

.bg-cover__title {
    width: 50%;
    padding: 50px;
    display: flex;
    align-items: center;
}


.grid {
    display: flex;
    max-width: 1350px;
    padding: 0 30px;
    margin: 0 auto;
}

.grid .col {
    width: 100%;
}

@media (max-width: 767px) {
    .grid {
        flex-wrap: wrap;
    }

    .normal-text {
        font-size: 14px;
    }

}

/*HEADER-FINALE-2*/




/* Carousel con i vari prodotti */

.main-carousel {
    padding: 40px 0;

}

.carousel-cell {
    height: 350px;
    width: 350px;
    background: #316bff;
    border-radius: 100%;
    line-height: 350px;
    text-align: center;
    margin-right: 40px;


}

.bottone--menu {
    border-radius: 100%;
    height: 350px;
    width: 350px;
    opacity: 0;



}




/*footer*/
.footer {
    background: #010e30;
    padding: 150px 10px;
}




/*Help*/
.big-text {
    font-size: 70px;
    font-weight: 900;

}

.med-text {
    font-size: 40px;
}

.normal-text {
    font-size: 20px;
}

.small-text {
    font-size: 14px;
}



.mt-1 {
    margin-top: 50px;
}

.mt-2 {
    margin-top: 100px;
}

.mt-3 {
    margin-top: 150px;
}

.text_white {
    color: white;
}


/*Help*/

/*Menu-alto */


.navbar-brand,
.navbar-nav>li>a {

    height: 80px;
    line-height: 50px;
}


.navbar {

    padding-top: .5rem;
    padding-bottom: .10rem;
}


.navbar-toggler {
    padding: .25rem .75rem;
    font-size: 1.25rem;
    line-height: 1;
    background-color: transparent;
    border-radius: .25rem;
    transition: box-shadow .15s ease-in-out;
}


.navbar-nav {
    padding-left: 20px;
    margin-bottom: 0;
    list-style: none;
}


dl,
ol,
ul {
    margin-top: 10px;
    margin-bottom: 1rem;
}


#logo {
    height: 70px;
    width: 70px;
}




@media (max-width: 767px) {
    #navbar-brand-title {
        font-size: 40px;
    }

}




#inserimentoProdotto {
    display: none;
}

#gestione {
    display: none;
}


#logout {

    display: none;

}



/*Menu-alto */

/*COVER-INIZIO*/


.poster {
    display: flex;
    height: 100vh;
    width: 100%;
    align-items: center;
}

.poster__img {


    width: 65%;
    height: 100%;
}

.poster__img img {
    object-fit: cover;
    width: 100%;
    height: 100%;
}

.poster__content {
    width: 35%;
    padding: 50px;
}

#text {
    margin-top: 20px;
    margin-left: 100px;
    position: absolute;
}


#carousel-item-title {
    margin-top: 50px;
    margin-left: 5px;
    position: absolute;
}

#carousel-item-description {
    margin-top: 130px;
    margin-left: 5px;
    position: absolute;
}


#mobile {
    visibility: hidden;
}


#descrizioneAcquistare {
    font-size: 25px;
}

@media (max-width: 970px) {
    .big-text {
        font-size: 45px;
        font-weight: 900;

    }
}


.btn-primary {
    color: #fff;
    background-color: #0d6efd;
    border-color: #0d6efd;
    display: block;
}

@media (max-width: 813px) {
    .big-text {
        font-size: 35px;
        font-weight: 900;

    }

    #descrizioneAcquistare {
        font-size: 20px;
        width: 300px;
        padding-top: 91%;
        margin-left: -18%;
    }

}



@media (max-width: 870px) {
    .big-text {
        font-size: 36px;
        font-weight: 900;

    }
}


@media (max-width: 767px) {
    .big-text {
        font-size: 40px;
        font-weight: 900;

    }


    .med-text {
        font-size: 30px;
    }


    #mobile {
        visibility: visible;
        margin-top: 0;
        margin-left: 0;

    }

}


/*COVER-FINE*/


/*HEADER-INZIALE*/


@media (max-width: 768px) {
    .poster {
        flex-wrap: wrap;
        height: auto;
    }

    .poster__img,
    .poster__content {
        width: 150%;
    }

    .poster__img {
        width: 250%;
        margin-left: 0px;


    }
}

/*HEADER-FINALE*/



/*HEADER-INIZIALE-2*/


.menu a:hover {
    color: red;
}




@media (min-width: 768px) {
    .bg-cover {
        flex-wrap: wrap;
        height: auto;
        background-position: -10% 10%;
    }

    .bg-cover__text,
    .bg-cover__title {
        width: 100%;
    }
    

}

.bg-cover__text {
    width: 50%;
    padding: 30px;
}

.bg-cover__title {
    width: 50%;
    padding: 50px;
    display: flex;
    align-items: center;
}


.grid {
    display: flex;
    max-width: 1350px;
    padding: 0 30px;
    margin: 0 auto;
}

.grid .col {
    width: 100%;
}

@media (max-width: 767px) {
    .grid {
        flex-wrap: wrap;
    }

    .normal-text {
        font-size: 14px;
    }

}

/*HEADER-FINALE-2*/




/* Carousel con i vari prodotti */

.main-carousel {
    padding: 40px 0;

}

.carousel-cell {
    height: 350px;
    width: 350px;
    background: #316bff;
    border-radius: 100%;
    line-height: 350px;
    text-align: center;
    margin-right: 40px;


}

.bottone--menu {
    border-radius: 100%;
    height: 350px;
    width: 350px;
    opacity: 0;



}


.bg-cover {
    display: flex;
    padding: 100px 0;
    background: linear-gradient(0deg, rgba(0, 0, 0, .7), rgba(0, 0, 0, .7)),
        url("/images/pexels-francesco-frilli-6511682.jpg") no-repeat center center;
    background-size: cover;

}



/*footer*/
.footer {
    background: #010e30;
    padding: 150px 10px;
}




.footerflex {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
}


.items1 {
    flex-grow: 2;
}


.items2 {
    flex-grow: 2;
}



.items3 {
    flex-grow: 2;
}

.slideshow .slideshow__title {
    color: #ffffff;

    font-size: 66px;

    line-height: 1.1;
}
</style>
@section('classe','page-template belle')
@section('content')

<!--Body Content-->
<div id="page-content">

    <div class="bredcrumbWrap">
        <div class="container breadcrumbs">
            <a href="/" title="Back to the home page">Home</a><span aria-hidden="true">›</span><span>About
            </span>
        </div>
    </div>
    <!--Page Title-->
    <div class="slideshow slideshow-wrapper pb-section">
        <div class="home-slideshow">
            <div class="slide">
                <div class="blur-up lazyload">
                    <img class="blur-up lazyload" data-src="/images/mappa-siciliaMod.jpg"
                        src="/images/mappa-sicilia.jpg" alt="Wedding bands" title="Wedding bands" />
                </div>
            </div>
        </div>


    </div>

    <!--End Page Title-->


    <!-- COVER-FINE -->


    <!-- HEADER-INIZIO -->

    <div class="poster mt-3">
        <div class="poster__img">
            <img src="/images/logo-2.png" alt=" Caretto ">
        </div>

        <div class="poster__content">
            <h3 class="big-text">Cosa è Sicily Market </h3>
            <p>
                Siamo un e-commerce il cui scopo è dare rilievo e dignità al lavoro e ai sacrifici che si celano
                dietro
                ogni piccolo produttore di prodotti tipici siciliani;
                tramite Sicily Market potrai mettere in vendita il tuo prodotto senza costi aggiuntivi, diventando
                così
                indipidentente dai commercianti e grandi aziende.<br> Entra a far parte della nostra community!
                <br>
                <br>
                Nella vita puoi ottenere tutto quello che vuoi se aiuti le altre persone ad ottenere quello che loro
                vogliono!
                (Zig Ziglar)


            </p>

        </div>
    </div>

    <!-- HEADER-FINE -->




    <!-- HEADER-INIZIALE-2 -->

    <div class="bg-cover mt-3">
        <div class="bg-cover__title ">
            <h3 class="big-text text_white"> Perchè aquistare un prodotto su Sicily Market</h3>
        </div>

        <div class="bg-cover__text ">


            <p class="text_white" id="descrizioneAcquistare">


                Si tratta del primo e-commerce in cui , comodomante da casa, potrai scegliere tra un'ampia gamma di
                prodotti selezionati al prezzo che ritieni più conveniente.

                Non vendiamo prodotti, ma storie e tradizioni siciliane direttamente a casa tua.
            </p>




        </div>



    </div>


</div>

</div>
<!--End Body Content-->

<!--Footer-->

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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>

@endsection