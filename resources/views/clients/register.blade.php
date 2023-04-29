@extends('Layouts.LayoutProduct')
@section('classe','page-template belle')


<style>
    .site-cart{
        display: none;
    }
</style>
@section('content')


<!--Body Content-->
<div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper">
                <h1 class="page-width">Creazione account</h1>
            </div>
        </div>
    </div>
    <!--End Page Title-->

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                <div class="mb-4">
                    <form method="post" action="/clients" id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">
                    @csrf
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="FirstName">Nome</label>
                                    <input type="text" name="nome" placeholder="" id="FirstName"
                                        autofocus="">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="LastName">Email</label>
                                    <input type="text" name="email"  placeholder="" id="LastName">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerEmail">Password</label>
                                    <input type="password"  name="password" placeholder="" id="CustomerEmail"
                                        class="" autocorrect="off" autocapitalize="off" autofocus="">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerPassword">Telefono</label>
                                    <input  type="text" value="" name="telefono" placeholder=""
                                        id="CustomerPassword" class="">
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerPassword">Indirizzo</label>
                                    <input  type="text" value="" name="indirizzo" placeholder=""
                                        id="CustomerPassword" class="">
                                </div>
                            </div>
                        </div>
                       
                        <input type="submit" class="btn mb-3" style="margin-left:42%;" value="Crea">
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