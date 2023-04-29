@extends('Layouts.LayoutProduct')
@section('classe','template-product belle')
<style>
a:visited {
  color: black;
}
</style>
@section('content')
<?php
    $array = [];
?>

<div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper">
                <h1 class="page-width">Your cart</h1>
            </div>
        </div>
    </div>
    <!--End Page Title-->

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 main-col">
                <form action="#" method="post" class="cart style2">
                    <table>
                        <thead class="cart__row cart__header">
                            <tr>
                                <th colspan="2" class="text-center">Product</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-right">Total</th>
                                <th class="action">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($prodotti))
                            @foreach($prodotti as $prod )
                            <?php 
                            $idCartUtente=$idCart;
                             array_push($array,$prod->id);
                            ?>
                            <tr class="cart__row border-bottom line1 cart-flex border-top">
                                <td class="cart__image-wrapper cart-flex-item">
                                    <img class="cart__image imgCart" src="{{$prod->immagine}}"
                                        alt="Elastic Waist Dress - Navy / Small">
                                </td>
                                <td class="cart__meta small--text-left cart-flex-item">
                                    <div class="list-view-item__title">
                                        <a href="/products/{{$prod->identificativo}}">{{$prod->nameProdotto}}</a>
                                    </div>

                                    <div class="cart__meta-text">
                                        {{$prod->categoria}}<br><a href="/products/{{$prod->identificativo}}">Apri</a>
                                    </div>
                                </td>
                                <td class="cart__price-wrapper cart-flex-item">
                                    <span class="money">{{$prod->prezzoProdotto}}€</span>
                                </td>
                                <td class="cart__update-wrapper cart-flex-item text-right">
                                    <form action="/cart_products/{{$idCart}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <?php $curPageName = $_SERVER['REQUEST_URI'];?>
                                        <div class="quantityProductInput">

                                            <input type="hidden" name="id" id="id" value="{{$prod->identificativo}}">
                                            <input type="hidden" name="curPageName" id="id" value="{{$curPageName}}">
                                            <input id="valueQ" type="number" name="quantità"
                                                value="{{$prod->quantità}}">

                                        </div>
                                        <input type="submit" id="valueS" value="Modifica">
                                    </form>
                                </td>
                                <?php $totalCash=$prod->prezzoProdotto * $prod->quantità;  ?>
                                <td class="text-right small--hide cart-price">
                                    <div><span class="money">{{$totalCash}}€</span></div>
                                </td>
                                <td class="text-center small--hide">
                                    <form class="deleteProductForm" action="/cart_products/{{$prod->identificativo}}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="buttonCart" value="x">

                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-left"><a href="/" class="btn--link cart-continue"><i
                                            class="icon icon-arrow-circle-left"></i>
                                        Continue shopping</a></td>
                                <td colspan="3" class="text-right"><button type="submit" name="update"
                                        class="btn--link cart-update"><i class="fa fa-refresh"></i> Update</button></td>
                            </tr>
                        </tfoot>
                    </table>



                </form>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 cart__footer">
                <div class="cart-note">
                    <div class="solid-border">
                        @foreach($clients as $client)

                        <h1>Indirizzo di consegna:</h1>
                        <b> {{$client->indirizzoVenditore}}</b><br><br><br>


                        <h1>Recapito telefonico:</h1>
                        <b> {{$client->telefonoVenditore}}</b><br><br><br>
                        @endforeach

                        <b>Modifica indirizzo di consegna o numero di telefono</b><br>
                        <form action="/clients/{{$client->id}}/edit" method="get">
                            <input type="submit" value="Modifica"> <br><br>

                        </form>
                    </div>
                </div>
                <div class="solid-border">
                    <div class="row">
                        <span class="col-12 col-sm-6 cart__subtotal-title"><strong>Subtotal</strong></span>
                        <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right">

                            @foreach($somma as $num )
                            <span class="money">{{$num->total}}€</span></span>

                        <?php 
    
                     $collection=collect($array);
                     Session::put('array', $collection);
                     Session::put('total', $num->total);
                     Session::put('countElement',$countProdotti);
                    Session::put('idCartUtente', $idCartUtente);  ?>



                        </span>
                    </div>
                    <div class="cart__shipping">Shipping &amp; taxes calculated at checkout</div>
                    <p class="cart_tearm">
                        <label>
                            <input type="checkbox" name="tearm" id="cartTearm" class="checkbox" value="tearm"
                                required="">
                            I agree with the terms and conditions</label>
                    </p>

                    <form action="{{route('payment')}}" id="formPay" method="post">
                        @csrf
                        <input type="hidden" name="amount" value="{{$num->total}}">
                        <input type="hidden" name="total" value="{{$num->total}}">
                        <input type="hidden" name="array" value="{{$collection}}">
                        <input type="hidden" name="countElement" value="{{$countProdotti}}">
                        <input type="hidden" name="idCartUtente" value="{{$idCartUtente}}">
                        <input type="submit" name="checkout" id="cartCheckout" class="btn btn--small-wide checkout"
                            value="Checkout">
                    </form>

                    <div class="paymnet-img"><img src="/images/payment-img.jpg" alt="Payment"></div>
                </div>

                <div class="solid-border">
              
                    <div class="col-lg-4-text-center">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="amount" id="inp_amount"
                                aria-describedby="helpId" placeholder="Enter-Amount-In-USD" value="{{$num->total}}">
                            <button type="button" id="cartCheckoutMetamask" class="btn btn--small-wide checkout" onClick="startProcess()"> PayNow </button>
                        </div>

                    </div>       
                    <div class="imageMetamask"><img src="/images/metamask.png" alt="Payment"></div> 
                </div>

               

                @endforeach

            </div>
        </div>
    </div>

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
<script src="/js/Home.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>
function startProcess() {
    if ($('#inp_amount').val() > 0) {
        // run metamsk functions here
        EThAppDeploy.loadEtherium();
    } else {
        alert('Please Enter Valid Amount');
    }
}


EThAppDeploy = {
    loadEtherium: async () => {
        if (typeof window.ethereum !== 'undefined') {
            EThAppDeploy.web3Provider = ethereum;
            EThAppDeploy.requestAccount(ethereum);
        } else {
            alert(
                "Not able to locate an Ethereum connection, please install a Metamask wallet"
            );
        }
    },
    /****
     * Request A Account
     * **/
    requestAccount: async (ethereum) => {
        ethereum
            .request({
                method: 'eth_requestAccounts'
            })
            .then((resp) => {
                //do payments with activated account
                EThAppDeploy.payNow(ethereum, resp[0]);
            })
            .catch((err) => {
                // Some unexpected error.
                console.log(err);
            });
    },
    /***
     *
     * Do Payment
     * */
    payNow: async (ethereum, from) => {
        var amount = $('#inp_amount').val();
        ethereum
            .request({
                method: 'eth_sendTransaction',
                params: [{
                    from: from,
                    to: "0x1787Ad280fb7870eceDbf286681A2C83E94957FB",
                    value: '0x' + ((amount * 1000000000000000000).toString(16)),
                }, ],
            })
            .then((txHash) => {
                if (txHash) {
                    console.log(txHash);
                    storeTransaction(txHash, amount);
                } else {
                    console.log("Something went wrong. Please try again");
                }
            })
            .catch((error) => {
                console.log(error);
            });
    },
}


function storeTransaction(txHash, amount) {
    console.log("ciao2");
    $.ajax({
        url: "{{ route('metamask.transaction.create') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        data: {
            txHash: txHash,
            amount: amount,
        },
        success: function(response) {
            // reload page after success
            window.location.replace("/");

        }
    });
}
</script>


@endsection