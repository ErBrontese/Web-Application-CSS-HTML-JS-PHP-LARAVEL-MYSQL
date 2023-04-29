<?php include '/Users/TSDW/ProvaPaypal/SicilyMarket/resources/views/Admin/inc/config.php'; // Meta data and header ?>
<?php include '/Users/TSDW/ProvaPaypal/SicilyMarket/resources/views/Admin/inc/top.php'; // Meta data and header ?>
<?php include '/Users/TSDW/ProvaPaypal/SicilyMarket/resources/views/Admin/inc/nav.php'; // Navigation content ?>




<!-- Page Content -->
<div id="page-content">
    <!-- Navigation info -->
    <ul id="nav-info" class="clearfix">
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li class="active"><a href="">Dashboard</a></li>
        <li><a id="logout" href="logout" onclick="logout()">Logout</a></li>

    </ul>
   

    <!-- END Navigation info -->
    <!-- Tiles -->
    <!-- Row 1 -->
    <div class="dash-tiles row">
        <!-- Column 1 of Row 1 -->
        <div class="col-sm-3">
            <!-- Total Users Tile -->
            <div class="dash-tile dash-tile-ocean clearfix animation-pullDown">
                <div class="dash-tile-header">
                    <div class="dash-tile-options">
                        <div class="btn-group">
                            <a href="/admin/info" class="btn btn-default" data-toggle="tooltip" title="Manage Users"><i
                                    class="fa fa-cog"></i></a>
                        </div>
                    </div>
                    Utente totali
                </div>
                <div class="dash-tile-icon"><i class="fa fa-users"></i></div>
                <div class="dash-tile-text">{{$countUser}}</div>
            </div>
            <!-- END Total Users Tile -->

            <!-- Total Profit Tile -->
            <div class="dash-tile dash-tile-leaf clearfix animation-pullDown">
                <div class="dash-tile-header">

                    Profito totale
                </div>
                <div class="dash-tile-icon"><i class="fa fa-money"></i></div>
                @foreach($somma as $value)
                <div class="dash-tile-text">{{$value->total}}€</div>
                @endforeach
            </div>
            <!-- END Total Profit Tile -->
        </div>
        <!-- END Column 1 of Row 1 -->

        <!-- Column 2 of Row 1 -->
        <div class="col-sm-3">
            <!-- Total Sales Tile -->
            <div class="dash-tile dash-tile-flower clearfix animation-pullDown">
                <div class="dash-tile-header">
                    <div class="dash-tile-options">
                        <div class="btn-group">
                            <a href="/admin/info" class="btn btn-default" data-toggle="tooltip" title="Manage Users"><i
                                    class="fa fa-cog"></i></a>
                        </div>
                    </div>

                    Vendite totali
                </div>
                <div class="dash-tile-icon"><i class="fa fa-tags"></i></div>
                <div class="dash-tile-text">{{$countSales}}</div>
            </div>
            <!-- END Total Sales Tile -->

            <!-- Total Downloads Tile -->
            <div class="dash-tile dash-tile-fruit clearfix animation-pullDown">
                <div class="dash-tile-header">
                    <div class="dash-tile-options">
                        <div class="btn-group">
                            <a href="/admin/info" class="btn btn-default" data-toggle="tooltip" title="Manage Users"><i
                                    class="fa fa-cog"></i></a>
                        </div>
                    </div>
                    Totale prodotti inseriti
                </div>
                <div class="dash-tile-icon"><svg xmlns="http://www.w3.org/2000/svg" width="56" height="56"
                        fill="currentColor" class="bi bi-box" viewBox="0 0 16 16">
                        <path
                            d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                    </svg></div>
                <div class="dash-tile-text">{{$countProduct}}</div>
            </div>
            <!-- END Total Downloads Tile -->
        </div>
        <!-- END Column 2 of Row 1 -->

        <!-- Column 3 of Row 1 -->
        <div class="col-sm-3">
            <!-- Popularity Tile -->
            <div class="dash-tile dash-tile-oil clearfix animation-pullDown">
                <div class="dash-tile-header">
                    <div class="dash-tile-options">
                        <div class="btn-group">
                            <a href="/admin/info" class="btn btn-default" data-toggle="tooltip" title="Manage Users"><i
                                    class="fa fa-cog"></i></a>
                        </div>
                    </div>
                    Carelli presenti
                </div>
                <div class="dash-tile-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor"
                        class="bi bi-cart" viewBox="0 0 16 16">
                        <path
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg></i></i>
                </div>
                <div class="dash-tile-text">{{$countCart}}</div>
            </div>
            <!-- END Popularity Tile -->

            <!-- Server Downtime Tile -->
            <div class="dash-tile dash-tile-dark clearfix animation-pullDown">
                <div class="dash-tile-header">
                    <div class="dash-tile-options">
                        <div class="btn-group">
                            <a href="/admin/info" class="btn btn-default" data-toggle="tooltip" title="Manage Users"><i
                                    class="fa fa-cog"></i></a>
                        </div>
                    </div>
                    Recensione inserite
                </div>
                <div class="dash-tile-icon"><svg xmlns="http://www.w3.org/2000/svg" width="56" height="56"
                        fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
                        <path
                            d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                        <path
                            d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                    </svg></div>
                <div class="dash-tile-text">{{$countReview}}</div>
            </div>
            <!-- END Server Downtime Tile -->
        </div>
        <!-- END Column 3 of Row 1 -->

        <!-- Column 4 of Row 1 -->
        <div class="col-sm-3">
            <!-- RSS Subscribers Tile -->
            <div class="dash-tile dash-tile-balloon clearfix animation-pullDown">
                <div class="dash-tile-header">
                    <div class="dash-tile-options">
                        <div class="btn-group">
                            <a href="/admin/info" class="btn btn-default" data-toggle="tooltip" title="Manage Users"><i
                                    class="fa fa-cog"></i></a>
                        </div>
                    </div>
                    Pagamenti con PayPal
                </div>
                <div class="dash-tile-icon"><svg xmlns="http://www.w3.org/2000/svg" width="56" height="56"
                        fill="currentColor" class="bi bi-paypal" viewBox="0 0 16 16">
                        <path
                            d="M14.06 3.713c.12-1.071-.093-1.832-.702-2.526C12.628.356 11.312 0 9.626 0H4.734a.7.7 0 0 0-.691.59L2.005 13.509a.42.42 0 0 0 .415.486h2.756l-.202 1.28a.628.628 0 0 0 .62.726H8.14c.429 0 .793-.31.862-.731l.025-.13.48-3.043.03-.164.001-.007a.351.351 0 0 1 .348-.297h.38c1.266 0 2.425-.256 3.345-.91.379-.27.712-.603.993-1.005a4.942 4.942 0 0 0 .88-2.195c.242-1.246.13-2.356-.57-3.154a2.687 2.687 0 0 0-.76-.59l-.094-.061ZM6.543 8.82a.695.695 0 0 1 .321-.079H8.3c2.82 0 5.027-1.144 5.672-4.456l.003-.016c.217.124.4.27.548.438.546.623.679 1.535.45 2.71-.272 1.397-.866 2.307-1.663 2.874-.802.57-1.842.815-3.043.815h-.38a.873.873 0 0 0-.863.734l-.03.164-.48 3.043-.024.13-.001.004a.352.352 0 0 1-.348.296H5.595a.106.106 0 0 1-.105-.123l.208-1.32.845-5.214Z" />
                    </svg></div>
                <div class="dash-tile-text">{{$countpaymentsPayPal}}</div>
            </div>
            <!-- END RSS Subscribers Tile -->

            <!-- Total Tickets Tile -->
            <div class="dash-tile dash-tile-doll clearfix animation-pullDown">
                <div class="dash-tile-header">
                    <div class="dash-tile-options">
                        <div class="btn-group">
                            <a href="/admin/info" class="btn btn-default" data-toggle="tooltip" title="Manage Users"><i
                                    class="fa fa-cog"></i></a>
                        </div>
                    </div>
                    Pagamenti con Metamask
                </div>
                <div class="dash-tile-icon"><svg xmlns="http://www.w3.org/2000/svg" width="56" height="56"
                        fill="currentColor" class="bi bi-currency-bitcoin" viewBox="0 0 16 16">
                        <path
                            d="M5.5 13v1.25c0 .138.112.25.25.25h1a.25.25 0 0 0 .25-.25V13h.5v1.25c0 .138.112.25.25.25h1a.25.25 0 0 0 .25-.25V13h.084c1.992 0 3.416-1.033 3.416-2.82 0-1.502-1.007-2.323-2.186-2.44v-.088c.97-.242 1.683-.974 1.683-2.19C11.997 3.93 10.847 3 9.092 3H9V1.75a.25.25 0 0 0-.25-.25h-1a.25.25 0 0 0-.25.25V3h-.573V1.75a.25.25 0 0 0-.25-.25H5.75a.25.25 0 0 0-.25.25V3l-1.998.011a.25.25 0 0 0-.25.25v.989c0 .137.11.25.248.25l.755-.005a.75.75 0 0 1 .745.75v5.505a.75.75 0 0 1-.75.75l-.748.011a.25.25 0 0 0-.25.25v1c0 .138.112.25.25.25L5.5 13zm1.427-8.513h1.719c.906 0 1.438.498 1.438 1.312 0 .871-.575 1.362-1.877 1.362h-1.28V4.487zm0 4.051h1.84c1.137 0 1.756.58 1.756 1.524 0 .953-.626 1.45-2.158 1.45H6.927V8.539z" />
                    </svg></i></div>
                <div class="dash-tile-text">{{$countransactionsMetaMask}}</div>
            </div>
            <!-- END Total Tickets Tile -->
        </div>
        <!-- END Column 4 of Row 1 -->
    </div>
    <!-- END Row 1 -->

    <!-- Row 2 -->
    <div class="row">
        <!-- Column 1 of Row 2 -->
        <div class="col-sm-3">
            <!-- RSS Subscribers Tile -->
            <div class="dash-tile dash-tile-mio1 clearfix animation-pullDown">
                <div class="dash-tile-header">
                    <div class="dash-tile-options">
                        <div class="btn-group">
                            <a href="/admin/image" class="btn btn-default" data-toggle="tooltip" title="Manage Users"><i
                                    class="fa fa-cog"></i></a>
                        </div>
                    </div>
                    Immagini presenti
                </div>
                <div class="dash-tile-icon"><svg xmlns="http://www.w3.org/2000/svg" width="56" height="56"
                        fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                        <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                        <path
                            d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
                    </svg></div>
                <div class="dash-tile-text">{{$imageCount}}</div>
            </div>
            <!-- END RSS Subscribers Tile -->

            <!-- Total Tickets Tile -->
            <div class="dash-tile dash-tile-mio2 clearfix animation-pullDown">
                <div class="dash-tile-header">
                    <div class="dash-tile-options">
                        <div class="btn-group">
                            <a href="/admin/info" class="btn btn-default" data-toggle="tooltip" title="Manage Users"><i
                                    class="fa fa-cog"></i></a>
                        </div>
                    </div>
                    Numero prodotti nei carelli
                </div>
                <div class="dash-tile-icon"><svg xmlns="http://www.w3.org/2000/svg" width="56" height="56"
                        fill="currentColor" class="bi bi-basket-fill" viewBox="0 0 16 16">
                        <path
                            d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717L5.07 1.243zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3z" />
                    </svg></div>
                <div class="dash-tile-text">{{$countcart_products}}</div>
            </div>
            <!-- END Total Tickets Tile -->
        </div>

        <!-- END Column 1 of Row 2 -->

        <!-- Column 2 of Row 2 -->
        <div class="col-sm-6">
            <!-- Projects Tile -->
            <div class="dash-tile dash-tile-2x">
                <div class="dash-tile-header">
                    Media delle recensioni
                </div>
                <div class="dash-tile-content">
                    <div class="dash-tile-content-inner scrollable-tile-2x">
                        <h5 class="page-header-sub"><a href="javascript:void(0)">#5 - Stelle</a></h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" style="width: <?php print $totalReview5 ?>%">
                                {{$totalReview5}}%</div>
                        </div>
                        <h5 class="page-header-sub"><a href="javascript:void(0)">#4 - Stelle</a></h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" style="width: <?php print $totalReview4 ?>%">
                                {{$totalReview4}}%</div>
                        </div>
                        <h5 class="page-header-sub"><a href="javascript:void(0)">#3 - Stelle</a></h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning" style="width: <?php print $totalReview3 ?>%">
                                {{$totalReview3}}%</div>
                        </div>
                        <h5 class="page-header-sub"><a href="javascript:void(0)">#2 - Stelle</a></h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger" style="width: <?php print $totalReview2 ?>%">
                                {{$totalReview2}}%</div>
                        </div>
                        <h5 class="page-header-sub"><a href="javascript:void(0)">#1 - Stelle</a></h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger" style="width: <?php print $totalReview1 ?>%">
                                {{$totalReview1}}%</div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- END Projects Tile -->
        </div>
        <!-- END Column 2 of Row 2 -->
        <div class="col-sm-3">
            <!-- Projects Tile -->
            <div class="dash-tile dash-tile-2x">
                <div class="dash-tile-header">
                    Categorie più acquistate
                </div>
                <div class="dash-tile-content">
                    <div class="dash-tile-content-inner scrollable-tile-2x">
                        <h5 class="page-header-sub"><a href="javascript:void(0)">Pistacchio</a></h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success"
                                style="width: <?php print $totalPistacchio ?>%">{{$totalPistacchio}}%</div>
                        </div>
                        <h5 class="page-header-sub"><a href="javascript:void(0)">Noci</a></h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" style="width: <?php print $totalNoci ?>%">
                                {{$totalNoci}}%</div>
                        </div>
                        <h5 class="page-header-sub"><a href="javascript:void(0)">Mandorle</a></h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning"
                                style="width: <?php print $totalMandorle ?>%">{{$totalMandorle}}%</div>
                        </div>
                        <h5 class="page-header-sub"><a href="javascript:void(0)">Noccioline</a></h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger"
                                style="width: <?php print $totalNoccioline ?>%">{{$totalNoccioline}}%</div>
                        </div>
                        <h5 class="page-header-sub"><a href="javascript:void(0)">Olio</a></h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger" style="width: <?php print $totalOlio ?>%">
                                {{$totalOlio}}%</div>
                        </div>
                        <h5 class="page-header-sub"><a href="javascript:void(0)">Limone</a></h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger" style="width: <?php print $totalOlio ?>%">
                                {{$totalLimone}}%</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Projects Tile -->
        </div>


        <!-- END Column 3 of Row 2 -->
    </div>
    <!-- END Row 2 -->

    <!-- Row 3 -->

    <!-- END Row 3 -->
    <!-- END Tiles -->
</div>
<!-- END Page Content -->


<?php include '/Users/TSDW/ProvaPaypal/SicilyMarket/resources/views/Admin/inc/footer.php'; // Navigation content ?>

<!-- Javascript code only for this page -->
<script>
$(function() {
    // Initialize dash Datatables
    $('#dash-example-orders').dataTable({
        columnDefs: [{
            orderable: false,
            targets: [0]
        }],
        pageLength: 6,
        lengthMenu: [
            [6, 10, 30, -1],
            [6, 10, 30, "All"]
        ]
    });
    $('.dataTables_filter input').attr('placeholder', 'Search');

    // Dash example stats
    var dashChart = $('#dash-example-stats');

    var dashChartData1 = [
        [0, 200],
        [1, 250],
        [2, 360],
        [3, 584],
        [4, 1250],
        [5, 1100],
        [6, 1500],
        [7, 1521],
        [8, 1600],
        [9, 1658],
        [10, 1623],
        [11, 1900],
        [12, 2100],
        [13, 1700],
        [14, 1620],
        [15, 1820],
        [16, 1950],
        [17, 2220],
        [18, 1951],
        [19, 2152],
        [20, 2300],
        [21, 2325],
        [22, 2200],
        [23, 2156],
        [24, 2350],
        [25, 2420],
        [26, 2480],
        [27, 2320],
        [28, 2380],
        [29, 2520],
        [30, 2590]
    ];
    var dashChartData2 = [
        [0, 50],
        [1, 180],
        [2, 200],
        [3, 350],
        [4, 700],
        [5, 650],
        [6, 700],
        [7, 780],
        [8, 820],
        [9, 880],
        [10, 1200],
        [11, 1250],
        [12, 1500],
        [13, 1195],
        [14, 1300],
        [15, 1350],
        [16, 1460],
        [17, 1680],
        [18, 1368],
        [19, 1589],
        [20, 1780],
        [21, 2100],
        [22, 1962],
        [23, 1952],
        [24, 2110],
        [25, 2260],
        [26, 2298],
        [27, 1985],
        [28, 2252],
        [29, 2300],
        [30, 2450]
    ];

    // Initialize Chart
    $.plot(dashChart, [{
            data: dashChartData1,
            lines: {
                show: true,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.05
                    }, {
                        opacity: 0.05
                    }]
                }
            },
            points: {
                show: true
            },
            label: 'All Visits'
        },
        {
            data: dashChartData2,
            lines: {
                show: true,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.05
                    }, {
                        opacity: 0.05
                    }]
                }
            },
            points: {
                show: true
            },
            label: 'Unique Visits'
        }
    ], {
        legend: {
            position: 'nw',
            backgroundColor: '#f6f6f6',
            backgroundOpacity: 0.8
        },
        colors: ['#555555', '#db4a39'],
        grid: {
            borderColor: '#cccccc',
            color: '#999999',
            labelMargin: 5,
            hoverable: true,
            clickable: true
        },
        yaxis: {
            ticks: 5
        },
        xaxis: {
            tickSize: 2
        }
    });

    // Create and bind tooltip
    var previousPoint = null;
    dashChart.bind("plothover", function(event, pos, item) {

        if (item) {
            if (previousPoint !== item.dataIndex) {
                previousPoint = item.dataIndex;

                $("#tooltip").remove();
                var x = item.datapoint[0],
                    y = item.datapoint[1];

                $('<div id="tooltip" class="chart-tooltip"><strong>' + y + '</strong> visits</div>')
                    .css({
                        top: item.pageY - 30,
                        left: item.pageX + 5
                    })
                    .appendTo("body")
                    .show();
            }
        } else {
            $("#tooltip").remove();
            previousPoint = null;
        }
    });
});
</script>


<?php include '/Users/TSDW/ProvaPaypal/SicilyMarket/resources/views/Admin/inc/bottom.php'; // Navigation content ?>