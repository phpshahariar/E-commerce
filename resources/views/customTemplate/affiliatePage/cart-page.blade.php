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
<br/>
<div class="container" style="border: 1px solid #CCCCCC;">
    <div class="col-sm-12">
        <h2 style="color: #000000;">Cart Page</h2>
        <hr/>
        @foreach($cartContents as $cartContent)
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <img  src="{{asset($cartContent->attributes->image)}}">
                    </div>
                </div>
                <style>
                    .font{
                        font-size: 18px;
                        font-weight: bold;
                    }
                </style>
                <div class="col-sm-4">
                    <div class="form-group">
                        <h6 class="font">{{str_limit($cartContent->name)}}</h6>
                        <label>Quantity</label>
                        <input onblur="updateCart({{$cartContent->id}},this.value)" id="product_qty"    style="height: 30px; margin-bottom: 10px; max-width: 100px; text-align: center" type="number" value="{{$cartContent->quantity}}"  class="form-control">
                        <h6 class="font" style="text-align: left; color: #0d82d3">Price : ৳ {{$cartContent->price}}</h6>
                        <h6 class="font" style="text-align: left;">Total : ৳ {{$cartContent->quantity*$cartContent->price}}</h6>

                    </div>
                </div>
                <div class="col-sm-4" style="margin-top: 60px;">
                    <div class="pmd-card-body">
                        <!-- Regular Input -->
                        <button  onclick="removeCart({{$cartContent->id}})" id="btn" class="btn pmd-ripple-effect btn-danger btn-block" type="submit">Remove</button>


                        <!-- Textarea -->
                    </div>
                </div>
            </div>
        @endforeach
        <hr/>
    </div>

    <div class="col-sm-12">
        <div class="row" style="text-align: center; margin: auto;">
            <div class="col-sm-5"><h4><b>Member Card</b></h4></div>
            <div class="col-sm-2"><h4>:</h4></div>
            <div class="col-sm-5"><input type="number" id="membership_id" class="form-control"></div>
        </div>
        <hr/>
    </div>
    <div class="col-sm-12">
        <div class="row" style="text-align: center; margin: auto;">
            <div class="col-sm-5"><h4><b>Sub-Total</b></h4></div>
            <div class="col-sm-2"><h4>:</h4></div>
            <div class="col-5" id="subTotal"><h4><b>৳ {{$subTotal}}</b></h4></div>
        </div>
        <hr/>
    </div>
    <div class="col-sm-12">
        <div class="row" style="text-align: center; margin: auto;">
            <div class="col-sm-5"><h4><b>Total</b></h4></div>
            <div class="col-sm-2"><h4>:</h4></div>
            <div class="col-5" ><h4><b>৳ <span id="subTotalwithDis">{{$subTotal}}</span></b></h4></div>
        </div>
        <hr/>
    </div>
    <div class="col-sm-12">
        <div class="row" style="text-align: center; margin: auto;">
            <div class="col-sm-5"><a href="{{URL::to('/index')}}" class="btn btn-primary btn-block" style="font-weight: bold;">More Shopping....</a></div>
            <div class="col-sm-2"><h4></h4></div>
            @if(Session::get('customer_id') && Session::get('billing_id') && Session::get('shipping_id'))
            <div class="col-sm-5"><a href="{{URL::to('/payment')}}" class="btn btn-success btn-block" style="font-weight: bold;">Check Out</a></div>
            @elseif(Session::get('customer_id') && Session('billing_id'))
                <div class="col-sm-5"><a href="{{URL::to('/shipping')}}" class="btn btn-success btn-block" style="font-weight: bold; font-size: 20px;">Check Out</a></div>
            @elseif(Session::get('customer_id'))
                <div class="col-sm-5"><a href="{{URL::to('/billing')}}" class="btn btn-success btn-block">Check Out</a></div>
            @else
                <div class="col-sm-5"><a href="{{URL::to('/register-affiliate-customer')}}" class="btn btn-success btn-block">Check Out</a></div>
            @endif
        </div>
        <hr/>
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

    //=== RemoveCart Option Start===//

    function removeCart(id) {
        $.ajax({
            type:'get',
            url: '{!! route('/remove-cart') !!}',
            datatype: 'html',
            data:{'id':id},

            success:function (data) {
                window.location.reload();
            }
        });
    }
    //=== RemoveCart Option End===//
    //=== UpdateCart Option Start===//
    function updateCart(id,qty) {
        // alert(id)

        $.ajax({
            type:'get',
            url: '{!! route('/update-cart-blur') !!}',
            datatype: 'html',
            data:{
                'id':id,
                'qty':qty
            },

            success:function (data) {
                // /alert(data)
                // console.log(data)
                window.location.reload();
            }
        });
    }
    //=== UpdateCart Option End===//

    //=== MemberShip Option Start===//
    $('#membership_id').blur(function () {
        var id= ($(this).val())
        var disPrice = $('#subTotalwithDis').val()
        $.ajax({
            type:'get',
            url: '{!! route('/memberCart-discount') !!}',
            datatype: 'html',
            data:{'id':id},

            success:function (data) {
                $('#subTotalwithDis').html(data);

            }
        });
    });

    //=== MemberShip Option end===//
</script>
</body>
</html>