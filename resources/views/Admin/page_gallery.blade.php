<?php include '/Users/TSDW/ProvaPaypal/SicilyMarket/resources/views/Admin/inc/config.php'; // Meta data and header ?>
<?php include '/Users/TSDW/ProvaPaypal/SicilyMarket/resources/views/Admin/inc/top.php'; // Meta data and header ?>
<?php include '/Users/TSDW/ProvaPaypal/SicilyMarket/resources/views/Admin/inc/nav.php'; // Navigation content ?>

<style>
    .imgProd{
    border-radius: 5%;
    height: 100px;
}
    </style>

<!-- Page Content -->
<div id="page-content">
    <!-- Navigation info -->
    <ul id="nav-info" class="clearfix">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <li><a href="/admin">Home admin</a></li>
        <li class="active"><a href="">Gallery</a></li>
    </ul>
    <!-- END Navigation info -->

    <!-- Gallery Default -->
    <h3 class="page-header page-header-top">Immagine 1</h3>

    <!--
    Add the value 'gallery-options' to data-toggle attribute of <ul> and include a div with class 'thumbnails-options'
    Your gallery with hover options is ready :-)
    -->
    <ul class="thumbnails clearfix" data-toggle="gallery-options">
         @if($images2Count!=0)
        @foreach($images as $image)
        <li>
            <div class="thumbnails-options">
                <div class="btn-group">
                    <button class="btn btn-sm btn-primary"><i class="fa fa-cloud-download"></i></button>
                    <button class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <a href="javascript:void(0)" class="imgProd"><img class="imgProd"src="{{$image->immagine}}" alt="fakeimg"></a>
        </li>
        @endforeach
        @else
        <p>Nesssuna immagine presente nel DB</p>
         @endif
        
    </ul>
   
    <!-- END Gallery Default -->

    <!-- Galleries Various Styles -->
    <h3 class="page-header">Immagine2</h3>
    <ul class="thumbnails clearfix" data-toggle="gallery-options">
    @if($images2Count!=0)
    @foreach($images2 as $image)
        <li>
            <div class="thumbnails-options">
                <div class="btn-group">
                    <button class="btn btn-sm btn-primary"><i class="fa fa-cloud-download"></i></button>
                    <button class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <a href="javascript:void(0)" class="imgProd"><img class="imgProd"src="{{$image->immagine2}}" alt="fakeimg"></a>
        </li>
        @endforeach
        @else
        <p>Nesssuna immagine presente nel DB</p>
         @endif
    </ul>
    <!-- Rounded Images -->
    
    <!-- END Borderless Images -->

    <!-- END Galleries Various Styles -->

    <!-- Custom Galleries -->
    <h3 class="page-header">Immagine</h3>
    <ul class="thumbnails clearfix" data-toggle="gallery-options">
    @if($images3Count!=0)
    @foreach($images3 as $image)
        <li>
            <div class="thumbnails-options">
                <div class="btn-group">
                    <button class="btn btn-sm btn-primary"><i class="fa fa-cloud-download"></i></button>
                    <button class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <a href="javascript:void(0)" class="imgProd"><img class="imgProd"src="{{$image->immagine3}}" alt="fakeimg"></a>
        </li>
        @endforeach
    </ul>
    @else
        <p>Nesssuna immagine presente nel DB</p>
    @endif
    
</div>
<!-- END Page Content -->

<?php include '/Users/TSDW/ProvaPaypal/SicilyMarket/resources/views/Admin/inc/footer.php'; // Navigation content ?>
<?php include '/Users/TSDW/ProvaPaypal/SicilyMarket/resources/views/Admin/inc/bottom.php'; // Navigation content ?>