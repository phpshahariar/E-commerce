<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{!! asset('/customTemplate/') !!}/styles/style.css">
    <link rel="stylesheet" href="{!! asset('/customTemplate/') !!}/styles/respons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="{!! asset('/customTemplate/') !!}/affiliate/css/all.css"/>
    <link rel="stylesheet" type="text/css" href="{!! asset('/customTemplate/') !!}/affiliate/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="{!! asset('/customTemplate/') !!}/affiliate/css/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="{!! asset('/customTemplate/') !!}/affiliate/css/nivo-slider.css"/>
    <link rel="stylesheet" type="text/css" href="{!! asset('/customTemplate/') !!}/affiliate/css/owl.carousel.min.css"/>
    <link rel="stylesheet" type="text/css" href="{!! asset('/customTemplate/') !!}/affiliate/css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="{!! asset('/customTemplate/') !!}/affiliate/css/magnific-popup.css"/>
    <link rel="stylesheet" type="text/css" href="{!! asset('/customTemplate/') !!}/affiliate/css/jquery-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="{!! asset('/customTemplate/') !!}/affiliate/css/style.css"/>





</head>
<body>
<br/>
<div class="container" style="border: 0px solid #000000;">
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-xs-4">
            <button type="button" class="navbar-toggler" data-target="#hideMenu" data-toggle="collapse" style="margin-left: 20px;">
                <span>Category Menu</span>
            </button>
            <div class="collapse navbar-collapse" id="hideMenu">
                <br/>
                <div class="well" style="height: 300px;">

                    <ul class="nav">
                        @foreach($categories as $category)
                            <li><a href="{!! url('/afflite-category-product', $category->id)!!}">{!! $category->category_name !!}</a> </li>
                        @endforeach
                    </ul>

                </div>
            </div>
            <div class="navbar-nav" id="hideMenu">
                <h3 style="font-weight: bold">Sub_Category</h3>
                <hr/>
                @foreach($sub_categories as $sub_category)
                <ul class="nav">
                    <li><a href="" class="text-dark text-uppercase" style="color: #c6c8ca; font-weight: bold;">{!! $sub_category->sub_category_name !!}</a> </li>
                </ul>
                @endforeach
            </div>
            <div class="navbar-nav" id="hideMenu">
                <h3 style="font-weight: bold">Brand</h3>
                <hr/>
                @foreach($brands as $brand)
                    <ul class="nav">
                        <li><a href="" class="text-dark text-uppercase" style="color: #c6c8ca; font-weight: bold;">{!! $brand->brand_name !!}</a> </li>
                    </ul>
                @endforeach
            </div>
        </div>
        <br/>
        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-8 col-xs-8" style="margin-top: 0px;">
            <div class="row">
                <h2 class="text-right"><em>Category Product</em></h2>
                <hr/>
                @foreach($products as $product)
                    <div class="col-md-3">
                            <div class="card" style="width:400px">
                                @foreach($images as $image)
                                    @if($product->id == $image->product_id)
                                        <a href="{!! url('/afflite-product-view/'.$product->id) !!}"><img class="card-img-top" src="{!!asset($image->medium_image) !!}" alt="Card image" style="width:40%; border-right: 2px solid red;"></a>
                                        @break
                                    @endif
                                @endforeach
                                <div class="card-body" style="margin-left: 50px; margin-top: 10px;">
                                    <h4 class="card-title text-left">{!! $product->product_name_eng!!}</h4>
                                    <p class="card-text" style="width: 230px; margin-top: 15px;">TK.{!! $product->product_price_eng !!}</p>
                                    {{--<a href="{!! url('/afflite-product-view/'.$product->id) !!}" name="btn" class="btn btn-success btn-block" style="margin-top: 15px; width: 130px;">Product Detail</a>--}}
                                </div>
                            </div>
                    </div>
                @endforeach
            </div>
            {{--{{ $products->links() }}--}}
        </div>
    </div>
</div>
</div>







<script src="{!! asset('/customTemplate/') !!}/affiliate/js/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="{!! asset('/customTemplate/') !!}/affiliate/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{!! asset('/customTemplate/') !!}/affiliate/js/wow.min.js" type="text/javascript"></script>
<script src="{!! asset('/customTemplate/') !!}/affiliate/js/jquery.nivo.slider.js" type="text/javascript"></script>
<script src="{!! asset('/customTemplate/') !!}/affiliate/js/owl.carousel.min.js" type="text/javascript"></script>
<script src="{!! asset('/customTemplate/') !!}/affiliate/js/slick.min.js" type="text/javascript"></script>
<script src="{!! asset('/customTemplate/') !!}/affiliate/js/jquery.countdown.min.js" type="text/javascript"></script>
<script src="{!! asset('/customTemplate/') !!}/affiliate/js/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="{!! asset('/customTemplate/') !!}/affiliate/js/jquery.counterup.min.js" type="text/javascript"></script>
<script src="{!! asset('/customTemplate/') !!}/affiliate/js/jquery.magnific-popup.min.js" type="text/javascript"></script>
<script src="{!! asset('/customTemplate/') !!}/affiliate/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="{!! asset('/customTemplate/') !!}/affiliate/js/jquery.elevateZoom-3.0.8.min.js" type="text/javascript"></script>
<script src="{!! asset('/customTemplate/') !!}/affiliate/js/custom.js" type="text/javascript"></script>



<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '{your-app-id}',
            cookie     : true,
            xfbml      : true,
            version    : '{api-version}'
        });

        FB.AppEvents.logPageView();

    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

</body>
</html>