@extends('Layouts.LayoutProduct')
@section('classe','template-collection belle')
@section('style','background-color:white;')


<style>
/* Please ❤ this if you like it! */


@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800,900');


a {
    cursor: pointer;
    transition: all 200ms linear;
}

a:hover {
    text-decoration: none;
}

.link {
    color: #c4c3ca;
}

.site-cart{
    display: none;
}

.link:hover {
    color: #ffeba7;
}

p {
    font-weight: 500;
    font-size: 14px;
    line-height: 1.7;
}

h4 {
    color: black;
    margin-top: -50%;
}

h6 span {
    padding: 0 20px;
    text-transform: uppercase;
    font-weight: 700;
}

.section {
    position: relative;
    width: 100%;

    display: block;
}

.full-height {
    min-height: 100vh;
}

[type="checkbox"]:checked,
[type="checkbox"]:not(:checked) {
    position: absolute;
    left: -9999px;
}

.checkbox:checked+label,
.checkbox:not(:checked)+label {
    position: relative;
    display: block;
    text-align: center;
    width: 60px;
    height: 16px;
    border-radius: 8px;
    padding: 0;
    margin: 10px auto;
    cursor: pointer;
    background-color: #ffeba7;
}

.checkbox:checked+label:before,
.checkbox:not(:checked)+label:before {
    position: absolute;
    display: block;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    color: #ffeba7;
    background-color: #102770;
    font-family: 'unicons';
    content: '\eb4f';
    z-index: 20;
    top: -10px;
    left: -10px;
    line-height: 36px;
    text-align: center;
    font-size: 24px;
    transition: all 0.5s ease;
}

.checkbox:checked+label:before {
    transform: translateX(44px) rotate(-270deg);
}


.card-3d-wrap {
    position: relative;
    width: 440px;
    max-width: 100%;
    height: 400px;
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
    perspective: 800px;
    margin-top: 60px;
}

.card-3d-wrapper {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
    transition: all 600ms ease-out;
}

.card-front,
.card-back {
    width: 140%;
    height: 120%;
    background-color: white;
    backdrop-filter: blur(10px);
    background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/pat.svg');
    background-position: bottom center;
    background-repeat: no-repeat;
    background-size: 300%;
    position: absolute;
    border-radius: 6px;
    left: 0;
    top: 0;
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
    -o-backface-visibility: hidden;
    backface-visibility: hidden;
}




.card-back {
    transform: rotateY(180deg);
}

.checkbox:checked~.card-3d-wrap .card-3d-wrapper {
    transform: rotateY(180deg);
}




.center-wrap {
    position: absolute;
    width: 100%;
    padding: 0 35px;
    top: 50%;
    left: 0;
    transform: translate3d(0, -50%, 35px) perspective(100px);
    z-index: 20;
    display: block;
}


.form-group {
    position: relative;
    display: block;
    margin: 0;
    padding: 0;
}

.form-style {
    padding: 13px 20px;
    padding-left: 20px;
    padding-left: 55px;
    height: 48px;
    width: 100%;
    font-weight: 500;
    border-radius: 4px;
    font-size: 14px;
    line-height: 22px;
    letter-spacing: 0.5px;
    outline: none;
    color: black;
    background-color: #fdfdfd;
    border: 1 solid black;
    -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
}


.form-style-textarea {
    padding: 13px 20px;
    padding-left: 20px;
    padding-left: 30px;
    height: 100%;
    width: 100%;
    font-weight: 500;
    border-radius: 4px;
    font-size: 14px;
    line-height: 22px;
    letter-spacing: 0.5px;
    outline: none;
    color: black;
    background-color: #fdfdfd;
    border: 1 solid black;
    -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
}

.form-style:focus,
.form-style:active {
    border: 1 solid black;
    outline: none;
}

.input-icon {
    position: absolute;
    top: 0;
    left: 18px;
    height: 48px;
    font-size: 24px;
    line-height: 48px;
    text-align: left;
    color: #ffeba7;
    -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
}

.form-group input:-ms-input-placeholder {
    color: #c4c3ca;
    opacity: 0.7;
    -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
}

.form-group input::-moz-placeholder {
    color: #c4c3ca;
    opacity: 0.7;
    -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
}

.form-group input:-moz-placeholder {
    color: #c4c3ca;
    opacity: 0.7;
    -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
}

.form-group input::-webkit-input-placeholder {
    color: #c4c3ca;
    opacity: 0.7;
    -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
}

.form-group input:focus:-ms-input-placeholder {
    opacity: 0;
    -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
}

.form-group input:focus::-moz-placeholder {
    opacity: 0;
    -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
}

.form-group input:focus:-moz-placeholder {
    opacity: 0;
    -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
}

.form-group input:focus::-webkit-input-placeholder {
    opacity: 0;
    -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
}

.btn {
    border-radius: 4px;
    height: 44px;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    -webkit-transition: all 200ms linear;
    transition: all 200ms linear;
    padding: 0 30px;
    letter-spacing: 1px;
    display: -webkit-inline-flex;
    display: -ms-inline-flexbox;
    display: inline-flex;
    -webkit-align-items: center;
    -moz-align-items: center;
    -ms-align-items: center;
    align-items: center;
    -webkit-justify-content: center;
    -moz-justify-content: center;
    -ms-justify-content: center;
    justify-content: center;
    -ms-flex-pack: center;
    text-align: center;
    border: none;
    background-color: #ffeba7;
    color: #102770;
    box-shadow: 0 8px 24px 0 rgba(255, 235, 167, .2);
}

.btn:active,
.btn:focus {
    background-color: #102770;
    color: #ffeba7;
    box-shadow: 0 8px 24px 0 rgba(16, 39, 112, .2);
}

.btn:hover {
    background-color: #102770;
    color: #ffeba7;
    box-shadow: 0 8px 24px 0 rgba(16, 39, 112, .2);



}


#label {
    color: black;
    margin-left: -80%;
    font-size: 14px;
}


body {
    background-image: url("/images/ProvaCreate.jpg");
    background-size: cover;
    backdrop-filter: blur(13px);
}




#help {
    font-size: 11px;
    color: rgba(0, 0, 0, 0);
    text-align: center;
}
</style>

@section('content')
<div id="page-content">
    <div class="bredcrumbWrap">
        <div class="container breadcrumbs">
            <a href="/" title="Back to the home page">Home</a><span aria-hidden="true">›</span>
            <a href="/account" title="Back to the home page">Account</a><span aria-hidden="true">›</span>
            <a href="/" title="Back to the home page">Inserimento prodotto</a>
        </div>

    </div>
    <!--Collection Banner-->


    <div class="container">
        <div class="row">

            <div class="col-12 text-center align-self-center ">
                <div class="pb-5 pt-5 pt-sm-2 text-center">
                    <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
                    <label for="reg-log"></label>
                   
                    <h6 class="mb-0 pb-3" id="campiCreate">
                        <span  id="campoInf">Informazioni<span id="help">helphelphelp</span><span id="campoDes">Descrizione 
                            </span>
                    </h6>
                    <div class="card-3d-wrap mx-auto">
                        <form action="/products/{{$product->id}}" method="post" enctype="multipart/form-data">

                            @csrf
                            @method('PATCH')

                            <div class="card-3d-wrapper" style="margin-top:-6%;">



                                <div class="card-front" style="margin-left:-20%;">
                                    <div class="center-wrap">
                                        <div class="section text-center">

                                            <div class="form-group" style="padding-top:10%">
                                                <h4 class="mb-4 pb-4">Specifiche prodotto</h4>
                                                <label for="categoria" id="label">Categoria</label> <br>
                                                <input type="text" name="categoria" id="categoria" class="form-style"
                                                    value="{{$product->categoria}}">
                                                <br><br>
                                                <label for="nameProdotto" id="label">Nome Prodotto</label> <br>
                                                <input type="text" name="nameProdotto" id="nameProdotto"
                                                    class="form-style" value="{{$product->nameProdotto}}">
                                                <br><br>
                                                <label for="quantitaProdotto" id="label">Quantità Prodotto</label> <br>
                                                <input type="text" name="quantitaProdotto" id="quantitaProdotto"
                                                    value="{{$product->quantitaProdotto}}" class="form-style">
                                                <br><br>
                                                <label for="quantitaProdotto" id="label">Prezzo Prodotto</label> <br>
                                                <input type="text" name="prezzoProdotto" id=" name=" prezzoProdotto"
                                                    class="form-style" value="{{$product->prezzoProdotto}}">
                                                <br><br>
                                                <input type="hidden" name="client_id" id="client_id"
                                                    value="{{$client_id}}">

                                            </div>

                                        </div>
                                    </div>
                                </div>





                                <div class="card-back" style="margin-left:-20%;">
                                    <div class="center-wrap">
                                        <div class="section text-center">


                                            <div class="form-group" style="margin-top:-8%">
                                                <h4 class="mb-4 pb-3">Descrizione prodotto</h4>

                                                <textarea style="resize:none" name="descrizione" id="descrizione"
                                                    class="form-style-textarea">{{$product->descrizione}}</textarea>
                                                <br>
                                                <br>

                                                <label for="prezzoProdotto" id="label">Immagine Prodotto</label>
                                                <div>
                                                    <input type="file" class="form-control form-control-sm form-style"
                                                        name="image" style="width:30% ;display:inline;">
                                                        <input type="file" class="form-control form-control-sm form-style"
                                                        name="image2" style="width:30% ;display:inline;">
                                                        <input type="file" class="form-control form-control-sm form-style"
                                                        name="image3" style="width:30% ;display:inline;">
                                                </div>


                                            </div>





                                            <input type="submit" class="btn mt-4" value="Inserisci prodotto">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
@endsection