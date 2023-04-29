@extends('Layouts.LayoutProduct')
@section('classe','page-template belle')
<?php $countProdotti="";$idCart="";?>
@section('content')


<!--Body Content-->
<div id="page-content">
<div class="bredcrumbWrap" >
        <div class="container breadcrumbs">
            <a href="/" title="Back to the home page">Home</a><span aria-hidden="true">›</span>
            <a href="/account" title="Back to the home page">Account</a><span aria-hidden="true">›</span>
            <a href="/" title="Back to the home page">Modifica account</a>
        </div>
    <!--Page Title-->
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper">
                <h1 class="page-width">Modifica account</h1>
            </div>
        </div>
    </div>
    <!--End Page Title-->

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                <div class="mb-4">
                <form action="/clients/{{$client->id}}" method="post">
                    @csrf
                    @method('PATCH')
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="FirstName">Nome</label>
                                    <input type="text" name="nomeVenditore" id="nome" value="{{$client->nomeVenditore}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="LastName">Email</label>
                                    <input type="text"  name="emailVenditore" id="nome" value="{{$client->emailVenditore}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                    <label for="LastName">Password</label>
                                    <input type="text"  name="Password" id="nome" value="{{$decrypt}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerPassword">Telefono</label>
                                    <input type="text" name="telefonoVenditore" id="nome" value="{{$client->telefonoVenditore}}">
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerPassword">Indirizzo</label>
                                    <input type="text" name="indirizzoVenditore" id="nome" value="{{$client->indirizzoVenditore}}"> 
                                </div>
                            </div>

                            
                        </div>
                       
                        <input type="submit" class="btn mb-3" style="margin-left:42%;" value="Modifica">
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


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

@endsection


       