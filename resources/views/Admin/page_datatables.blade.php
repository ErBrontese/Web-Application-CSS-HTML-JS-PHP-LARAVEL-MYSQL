<?php include '/Users/TSDW/ProvaPaypal/SicilyMarket/resources/views/Admin/inc/config.php'; // Meta data and header ?>
<?php include '/Users/TSDW/ProvaPaypal/SicilyMarket/resources/views/Admin/inc/top.php'; // Meta data and header ?>
<?php include '/Users/TSDW/ProvaPaypal/SicilyMarket/resources/views/Admin/inc/nav.php'; // Navigation content ?>


<!-- Page Content -->
<div id="page-content">
    <!-- Navigation info -->
    <ul id="nav-info" class="clearfix">
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li><a href="/admin">Home Account</a></li>
        <li class="active"><a href="">DataTables</a></li>
    </ul>
    <ul id="nav-info" class="clearfix">

        <li><a href="#Utenti">Utenti</a></li> 
        <li><a href="#Vendite">Venidite totali</a></li>
        <li><a href="#Prodotti">Prodotti inseriti</a></li>
        <li><a href="#Carelli">Carelli</a></li>
        <li><a href="#Recensioni">Recensioni</a></li>
        <li><a href="#PayPal">PayPal</a></li>
        <li><a href="#Meta mask">MetaMask</a></li>
        <li><a href="#ProdottiCarelli">Prodotti presenti nei carelli</a></li>

    </ul>
    <!-- END Navigation info -->
    <h3 class="page-header">Utenti<small> informazioni</small></h3>
    <a name="Utenti"></a>
    <table id="example-datatables" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
              
                <th class="cell-small text-center hidden-xs hidden-sm">Id</th>
                <th><i class="fa fa-user"></i>Nome</th>
                <th class="hidden-xs hidden-sm hidden-md"><i class="fa fa-envelope-o"></i> Email</th>
                <th><i class="fa fa-bolt"></i>Telefono</th>
                <th><i class="fa fa-bolt"></i>Indirizzo</th>
                <th><i class="fa fa-bolt"></i>Password</th>
            </tr>
        </thead>
        <tbody>
           
           @foreach($clients as $client)
            <tr>
                <td class="text-center hidden-xs hidden-sm">{{$client->id}}</td>
                <td><a href="javascript:void(0)">{{$client->nomeVenditore}}</a></td>
                <td class="hidden-xs hidden-sm hidden-md">{{$client->emailVenditore}}</td>
                <td class="hidden-xs hidden-sm hidden-md">{{$client->telefonoVenditore}}</td>
                <td class="hidden-xs hidden-sm hidden-md">{{$client->indirizzoVenditore}}</td>
                <td class="hidden-xs hidden-sm hidden-md">....</td>
                <p>{{ $clients->links() }}</p>
            </tr>
            
            @endforeach
        </tbody>
    </table>
    <!-- END Datatables -->

    <!-- Datatables in the grid -->
    <a name="Vendite"></a>
    <h3 class="page-header">Venidite totali<small> Informazioni</small></h3>
    <table id="example-datatables1" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>

                <th><i class="fa fa-user"></i>Id</th>
                <th><i class="fa fa-bolt"></i>Totale</th>
                <th><i class="fa fa-bolt"></i>Data acquisto</th>
                <th><i class="fa fa-bolt"></i>Id prodotto</th>
                <th><i class="fa fa-bolt"></i>Id Carrello</th>
            </tr>
        </thead>
        <tbody>
           
           @foreach($shoppingTotal as $shopping)
            <tr>
                <td class="text-center hidden-xs hidden-sm">{{$shopping->id}}</td>
                <td><a href="javascript:void(0)">{{$shopping->totale}}€</a></td>
                <td class="hidden-xs hidden-sm hidden-md">{{$shopping->created_at}}</td>
                <td class="hidden-xs hidden-sm hidden-md">{{$shopping->product_id}}</td>
                <td class="hidden-xs hidden-sm hidden-md">{{$shopping->cart_id}}</td>
                <p>{{ $clients->links() }}</p>
            </tr>
            
            @endforeach
        </tbody>
    </table>

    <a name="Prodotti"></a>
    <h3 class="page-header">Prodotti inseriti<small> Informazioni</small></h3>
    <table id="example-datatables2" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th><i class="fa fa-user"></i>Id</th>
                <th><i class="fa fa-bolt"></i>Categoria</th>
                <th><i class="fa fa-bolt"></i>Nome prodotto</th>
                <th><i class="fa fa-bolt"></i>Descrizione</th>
                <th><i class="fa fa-bolt"></i>quantita prodotto</th>
                <th><i class="fa fa-bolt"></i>Prezzo prodotto</th>
                <th><i class="fa fa-bolt"></i>Inserimento</th>
                <th><i class="fa fa-bolt"></i>Utente</th>
                <th><i class="fa fa-bolt"></i>Immagine 1</th>
                <th><i class="fa fa-bolt"></i>Immagine 2</th>
                <th><i class="fa fa-bolt"></i>Immagine 3</th>

            </tr>
        </thead>
        <tbody>
           
           @foreach($productTotal as $product)
            <tr>
                
                <td class="text-center hidden-xs hidden-sm">{{$product->id}}</td>
                <td><a href="javascript:void(0)">{{$product->categoria}}</a></td>
                <td class="hidden-xs hidden-sm hidden-md">{{$product->nameProdotto}}</td>
                <td class="hidden-xs hidden-sm hidden-md">{{$product->descrizione}}</td>
                <td class="hidden-xs hidden-sm hidden-md">{{$product->quantitaProdotto}}</td>
                <td class="hidden-xs hidden-sm hidden-md">{{$product->prezzoProdotto}}</td>
                <td class="hidden-xs hidden-sm hidden-md">{{$product->created_at}}</td>
                <td class="hidden-xs hidden-sm hidden-md">{{$product->client_id}}</td>
                <td class="hidden-xs hidden-sm hidden-md">{{$product->immagine}}</td>
                <td class="hidden-xs hidden-sm hidden-md">{{$product->immagine2}}</td>
                <td class="hidden-xs hidden-sm hidden-md">{{$product->immagine2}}</td>
                
                <p>{{ $productTotal->links() }}</p>
            </tr>
            
            @endforeach
        </tbody>
    </table>


    <a name="Carelli"></a>
    <h3 class="page-header">Carelli presenti<small> Informazioni</small></h3>
    <table id="example-datatables3" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>

                <th><i class="fa fa-user"></i>Id</th>
                <th><i class="fa fa-bolt"></i>Data creazione</th>
                <th><i class="fa fa-bolt"></i>Id client</th>
            </tr>
        </thead>
        <tbody>
           
           @foreach($cartTotal as $cart)
            <tr>
                
                <td class="text-center hidden-xs hidden-sm">{{$cart->id}}</td>
                <td><a href="javascript:void(0)">{{$cart->created_at}}</a></td>
                <td class="hidden-xs hidden-sm hidden-md">{{$cart->clientCarts_id}}</td>
                <p>{{ $cartTotal->links() }}</p>
            </tr>
            
            @endforeach
        </tbody>
    </table>

    <a name="Recensioni"></a>
    <h3 class="page-header">Recensioni<small> Informazioni</small></h3>
    <table id="example-datatables4" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>

                <th><i class="fa fa-user"></i>Id</th>
                <th><i class="fa fa-bolt"></i>Voto</th>
                <th><i class="fa fa-bolt"></i>Descrizione</th>
                <th><i class="fa fa-bolt"></i>Creazione</th>
                <th><i class="fa fa-bolt"></i>Id prodotto</th>
                <th><i class="fa fa-bolt"></i>Id client</th>
            </tr>
        </thead>
        <tbody>
           
           @foreach($reviewsTotal as $review)
            <tr>
                
                <td class="text-center hidden-xs hidden-sm">{{$review->id}}</td>
                <td><a href="javascript:void(0)">{{$review->votes}}</a></td>
                <td class="hidden-xs hidden-sm hidden-md">{{$review->review}}</td>
                <td class="text-center hidden-xs hidden-sm">{{$review->created_at}}</td>
                <td><a href="javascript:void(0)">{{$review->product_id}}</a></td>
                <td class="hidden-xs hidden-sm hidden-md">{{$review->client_id}}</td>
                <p>{{ $cartTotal->links() }}</p>
            </tr>
            
            @endforeach
        </tbody>
    </table>

    <a name="PayPal"></a>
    <h3 class="page-header">PayPal<small> Informazioni</small></h3>
    <table id="example-datatables5" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>

                <th><i class="fa fa-user"></i>Id</th>
                <th><i class="fa fa-bolt"></i>Payment_id</th>
                <th><i class="fa fa-bolt"></i>Payer_id</th>
                <th><i class="fa fa-bolt"></i>Payer_email</th>
                <th><i class="fa fa-bolt"></i>Importo</th>
                <th><i class="fa fa-bolt"></i>Payment_status</th>
                <th><i class="fa fa-bolt"></i>Id utente</th>
                <th><i class="fa fa-bolt"></i>Data</th>
            </tr>
        </thead>
        <tbody>
           
           @foreach($paymentsTotal as $payments)
            <tr>
                
                <td class="text-center hidden-xs hidden-sm">{{$payments->id}}</td>
                <td><a href="javascript:void(0)">{{$payments->payment_id}}</a></td>
                <td class="hidden-xs hidden-sm hidden-md">{{$payments->payer_id}}</td>
                <td class="text-center hidden-xs hidden-sm">{{$payments->payer_email}}</td>
                <td><a href="javascript:void(0)">{{$payments->amount}}</a></td>
                <td class="hidden-xs hidden-sm hidden-md">{{$payments->payment_status}}</td>
                <td class="hidden-xs hidden-sm hidden-md">{{$payments->id_utente}}</td>
                <td class="hidden-xs hidden-sm hidden-md">{{$payments->created_at}}</td>
                <p>{{ $paymentsTotal->links() }}</p>
            </tr>
            
            @endforeach
        </tbody>
    </table>

    <a name="Meta mask"></a>
    <h3 class="page-header">Metamask<small> Informazioni</small></h3>
    <table id="example-datatables6" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>

                <th><i class="fa fa-user"></i>Id</th>
                <th><i class="fa fa-bolt"></i>txHash</th>
                <th><i class="fa fa-bolt"></i>Status</th>
                <th><i class="fa fa-bolt"></i>Data</th>
                <th><i class="fa fa-bolt"></i>Id Utente</th>
            </tr>
        </thead>
        <tbody>
           
           @foreach($transactionsTotal as $transaction)
            <tr>
                
                <td class="text-center hidden-xs hidden-sm">{{$transaction->id}}</td>
                <td><a href="javascript:void(0)">{{$transaction->amount}}</a></td>
                <td class="hidden-xs hidden-sm hidden-md">{{$transaction->txHash}}</td>
                <td class="text-center hidden-xs hidden-sm">{{$transaction->status}}</td>
                <td><a href="javascript:void(0)">{{$transaction->id_utente}}</a></td>
                <p>{{ $transactionsTotal->links() }}</p>
            </tr>
            
            @endforeach
        </tbody>
    </table>

    <a name="ProdottiCarelli"></a>
    <h3 class="page-header">Prodotti nei carelli<small> Informazioni</small></h3>
    <table id="example-datatables7" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>

                <th><i class="fa fa-user"></i>Id</th>
                <th><i class="fa fa-bolt"></i>quantità</th>
                <th><i class="fa fa-bolt"></i>Data</th>
                <th><i class="fa fa-bolt"></i>Id carrello</th>
                <th><i class="fa fa-bolt"></i>Id prodotto</th>
            </tr>
        </thead>
        <tbody>
           
           @foreach($cart_productsTotal as $cart_products)
            <tr>
                
                <td class="text-center hidden-xs hidden-sm">{{$cart_products->id}}</td>
                <td><a href="javascript:void(0)">{{$cart_products->quantità}}</a></td>
                <td class="hidden-xs hidden-sm hidden-md">{{$cart_products->created_at}}</td>
                <td class="text-center hidden-xs hidden-sm">{{$cart_products->cart_id}}</td>
                <td><a href="javascript:void(0)">{{$cart_products->product_id}}</a></td>
                <p>{{ $cart_productsTotal->links() }}</p>
            </tr>
            
            @endforeach
        </tbody>
    </table>




    
</div>
<!-- END Page Content -->

<?php include '/Users/TSDW/ProvaPaypal/SicilyMarket/resources/views/Admin/inc/footer.php'; // Navigation content ?>

<!-- Javascript code only for this page -->
<script>
    $(function(){
        /* Initialize Datatables */
        $('#example-datatables').dataTable({ columnDefs: [ { orderable: false, targets: [ 0 ] } ] });
        $('#example-datatables2').dataTable();
        $('#example-datatables1').dataTable();
        $('#example-datatables3').dataTable();
        $('#example-datatables4').dataTable();
        $('#example-datatables5').dataTable();
        $('#example-datatables6').dataTable();
        $('#example-datatables7').dataTable();
        $('.dataTables_filter input').attr('placeholder', 'Search');
    });
</script>

<?php include '/Users/TSDW/ProvaPaypal/SicilyMarket/resources/views/Admin/inc/bottom.php'; // Navigation content ?>