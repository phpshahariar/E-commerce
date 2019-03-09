<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bangla Kings</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{!! asset('/customTemplate/') !!}/styles/style.css">
    <link rel="stylesheet" href="{!! asset('/customTemplate/') !!}/styles/respons.css">
    <link rel="stylesheet" href="{!! asset('/customTemplate/') !!}/styles/gallery.css">
    <link rel="stylesheet" href="{!! asset('/customTemplate/') !!}/affiliate/css/lightbox.min.css">
    <script type="text/javascript" src="{!! asset('/customTemplate/') !!}/affiliate/js/lightbox-plus-jquery.min.js"></script>
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

    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <br/>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-xs-4">
                    <button type="button" class="navbar-toggler" data-target="#hideMenu" data-toggle="collapse" style="margin-left: 20px;">
                        <span>Menu</span>
                    </button>
                    <div class="collapse navbar-collapse" id="hideMenu">
                        <br/>
                        <div class="well" style="height: 400px;">
                            <ul class="nav" style="height: 400px; border: 0px solid #000000;">
                                @foreach($categories as $category)
                                    <li><a href="{!! url('/afflite-category-product', $category->id)!!}">{!! $category->category_name !!}</a> </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="cart_count" style="float: right; font-size: 20px;"><i class="fas fa-shopping-cart text-primary"> : <span>{{Cart::getTotalQuantity()}}</span></i><br/>
                        <strong style="font-size: 20px;">৳ {{Cart::getSubTotal()}}</strong>
                    </div>
                </div>
                <br/>
                <br/>
                <div class="col-xl-6 col-lg-6 col-md-5 col-xs-5" style="border-right: 1px solid #a0a0a0; height: 410px;">
                        <div class="gallery">
                            @foreach($product_images as $product_image)
                            <a href="{{asset($product_image->large_image)}}" data-lightbox="Banglaking"><img src="{{asset($product_image->medium_image)}}"/></a>
                            {{--<a href="{{asset('/customTemplate/')}}/affiliate/images/8558295633_f34a55c1c6_b.jpg" data-lightbox="Banglaking"><img src="{{asset('/customTemplate/')}}/affiliate/images/8558295633_f34a55c1c6_b.jpg"/></a>--}}
                            {{--<a href="{{asset('/customTemplate/')}}/affiliate/images/8563475581_df05e9906d_b.jpg" data-lightbox="Banglaking"><img src="{{asset('/customTemplate/')}}/affiliate/images/8563475581_df05e9906d_b.jpg"/></a>--}}
                            @endforeach
                        </div>
                    <div class="middle-content">
                        @foreach($product_images as $product_image)
                            <a href="{{asset($product_image->large_image)}}" data-lightbox="Banglaking"><img src="{{asset($product_image->medium_image)}}"/></a>
                            @break
                        @endforeach
                    </div>
                    <div class="end-content" style="margin-left: 130px; margin-top: 10px;">
                        @foreach($product_images as $product_image)
                            <a href="{{asset($product_image->large_image)}}" data-lightbox="Banglaking"><img src="{{asset($product_image->medium_image)}}"/></a>
                        @endforeach
                    </div>
                </div>
                @foreach($products as $product)
                        {{Form::open(['url'=> '/afflite-add-cart', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                            <div class="col-xl-3 col-lg-3 col-md-3 col-xs-3" style="border: 0px solid #000000;">
                                <strong style="float: right;">View : {!! $product->view_total !!}</strong>
                                <h2>{!! $product->product_name_eng !!}</h2>
                                <p>{!! $product->product_short_description_eng !!}</p>
                                <b>Deal Code : {!! $product->id !!}</b><br/>
                                <h1>Tk.{!! $product->product_price_eng !!}/-</h1>
                                <div class="product_quantity">
                                    <strong style="color: #8c8c8c" >Quantity: </strong>
                                    <input id="quantity_input" class="form-control" name="product_qty" type="number" pattern="[0-9]*" value="1" min="1" >
                                    <input type="hidden" name="product_id" value="{!! $product->id !!}">
                                </div>
                                <script>
                                    function indsdald() {
                                        var qt = $('#quantity_input').val();
                                        if (qt >= {{$product->product_qty - 1}}){
                                            // $('quantity_inc_button').removeClass('quantity_inc')
                                            $('#quantity_input').val({{$product->product_qty - 1}});
                                        }
                                    }
                                </script>
                                @if($size_arry != null)
                                <select id="select_size" style="height: 48px; margin-top: 10px; display: block; color: black" name="product_size" class="form-control product_color">
                                    <option >--Select Size--</option>
                                    @foreach($sizes as $size)
                                        <option value="">{!! $size->product_size_name !!}</option>
                                    @endforeach
                                </select>
                                @endif
                            <br/>
                                <div class="button_container">
                                    <button type="submit" name="btn" value="addToCart" class="btn btn-primary " style="font-size: 12px">Add to Cart</button>
                                    <button type="submit" name="btn" value="orderNow" class="btn btn-danger " style="background-color: red; font-size: 12px">Order</button>
                                    <a href="{!! url('/afflite-cart-page') !!}"  class="btn btn-success" style="background-color: #0a8f08; font-size: 12px">Cart Page</a>
                                </div>
                            <br/>
                                <nav class="navbar">
                                    <ul class="navbar-nav nav">
                                        <li><a href="#"><img src="{{asset('customTemplate/images')}}/logos_1.png" alt=""></a></li>
                                        <li><a href="#"><img src="{{asset('customTemplate/images')}}/logos_2.png" alt=""></a></li>
                                        <li><a href="#"><img src="{{asset('customTemplate/images')}}/logos_3.png" alt=""></a></li>
                                        <li><a href="#"><img src="{{asset('customTemplate/images')}}/logos_4.png" alt=""></a></li>
                                    </ul>
                                </nav>
                            </div>
                    {{Form::close()}}
                @endforeach
            </div>
            <div class="col-sm-12" style="border: 0px solid #000000;">
                <div class="col-sm-8" style="border-left: 0px solid #CCCBC6;">
                    @foreach($products as $product)
                        <h2><i><u>Product Details : </u></i></h2>
                        <p>{!! $product->prodcut_long_description_eng !!}<br/></p>
                    @endforeach
                </div>
                <div class="col-sm-4" style="border-left: 1px solid #CCCBC6;">
                    <div class="card">
                        <div class="card-header"><h3 style="background-color: #a0a0a0; font-weight: bold; text-align: center;">Related Product</h3>
                            <div class="card-body">
                                @foreach($reletedProducts as $reletedProduct)
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <h4>{{$reletedProduct->product_name_eng}}</h4>
                                            <h4>৳ {{$reletedProduct->product_price_eng}}</h4>
                                            <a href="{{URL::to('/afflite-product-view/'.$reletedProduct->id)}}"><button class="btn btn-info">add to cart</button></a>
                                        </div>
                                        @foreach($rp_image as $rpi)
                                            @if($reletedProduct->id == $rpi->product_id)
                                                <div class="col-4"><img src="{{asset($rpi->small_image)}}"/></div>
                                                @break
                                            @endif
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="col-sm-12 well">--}}
                {{--@foreach($info as $info)--}}
                    {{--{{$info->custom_description_eng}}--}}
                {{--@endforeach--}}
            {{--</div>--}}
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

    // ElevateZoom Active
    $("#zoom_01").elevateZoom({
        gallery:'salide-image',
        cursor: 'pointer',
        galleryActiveClass: 'active',
        imageCrossfade: true
    });

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