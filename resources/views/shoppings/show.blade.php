@extends('layout')
@section('content')

<?php 
 $status = Session::get('statusQuantity');
 $msgStatus = Session::get('msgStatusQuantity');
?>
    @if($status==1)
    <div  class="alert alert-info">
        <ul>
            <li><?php echo $msgStatus ?></li>
            <?php 
            Session::forget('statusQuantity');
            ?>
        </ul>
    </div>
@endif

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


<h1>Riepilogo ordine</h1>
<br>
<?php
    $array = [];
?>
@foreach($prodotti as $prod )
<?php 

    $idCartUtente=$prod->cart_id;
    array_push($array,$prod->id);

?>
<b>categoria:</b> {{$prod->categoria}} <br>
<b>Nome prodotto:</b> {{$prod->nameProdotto}} <br>
<b>Descrizione:</b> {{$prod->descrizione}} <br>
<b>Prezzo:</b> {{$prod->prezzoProdotto}} <br>
<form action="/cart_products/{{$prod->quantità}}" method="post">
    @csrf
    @method('PATCH')
    <?php $curPageName = $_SERVER['REQUEST_URI'];?>
    <div class="quantityProductInput">
        <label for="Quantità">Quantità</label> <br>
        <input type="text" name="quantità" id="quantità" value="{{$prod->quantità}}">
        <div style="display:none;"> <input type="text" name="id" id="id" value="{{$prod->id}}"></div>
        <div style="display:none;"> <input type="text" name="curPageName" id="id" value="{{$curPageName}}"></div>
        <input type="submit" value="Save users">
    </div><br><br>
</form>



@endforeach
</div>


@foreach($somma as $num )
<?php 
    
    $collection=collect($array);
    Session::put('array', $collection);
    Session::put('total', $num->total);
    Session::put('countElement',$countProdotti);
    Session::put('idCartUtente', $idCartUtente);
    
?>


<form action="{{route('payment')}}" id="formPay" method="post">
    @csrf
    <input type="hidden" name="amount" value="{{$num->total}}">
    <input type="hidden" name="total" value="{{$num->total}}">
    <input type="hidden" name="array" value="{{$collection}}">
    <input type="hidden" name="countElement" value="{{$countProdotti}}">
    <input type="hidden" name="idCartUtente" value="{{$idCartUtente}}">
    <input type="submit" value="Acquista">
</form>


<div class="row-justify-content-center">
    <div class="col-lg-4-text-center">
        <div class="form-group">
            <h3>Enter-Amount-Here</h3>
            <input type="hidden" class="form-control" name="amount" id="inp_amount" aria-describedby="helpId"
                placeholder="Enter-Amount-In-USD" value="{{$num->total}}">
            <button type="button" onClick="startProcess()"> PayNow </button>
        </div>
    </div>
</div>




@endforeach
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
                success: function (response) {
                    // reload page after success
                    window.location.replace("/");
                   
                }
            });
        }

</script>



@endsection


