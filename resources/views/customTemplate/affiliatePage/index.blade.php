<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bangla Kings</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{!! asset('/customTemplate/') !!}/styles/style.css">
    <link rel="stylesheet" href="{!! asset('/customTemplate/') !!}/styles/respons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    {{--<script src="{!! asset('/customTemplate/') !!}/js/modernizr.custom.js"></script>--}}
    {{--product--}}



    {{--<script type="text/javascript">--}}
    {{--jQuery(document).ready(function($) {--}}
    {{--$(".scroll").click(function(event){--}}
    {{--event.preventDefault();--}}
    {{--$('html,body').animate({scrollTop:$(this.hash).offset().top},900);--}}
    {{--});--}}
    {{--});--}}
    {{--</script>--}}


</head>

<body>
<div class="container">
    <br/>
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-xs-4">
            <button type="button" class="navbar-toggler" data-target="#hideMenu" data-toggle="collapse" style="margin-left: 20px;">
                <span>Menu</span>
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
        </div>
        <br/>
        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-8 col-xs-8">

            <div class="row">
                <h1>Welcome To Home Page</h1>
                @foreach($products as $product)
                    <div class="col-md-3">
                        <div class="card" style="width:400px">
                            @foreach($images as $image)
                                @if($product->id == $image->product_id)
                                    <img class="card-img-top" src="{!!asset($image->medium_image) !!}" alt="Card image" style="width:50%">
                                    @break
                                @endif
                            @endforeach
                            <div class="card-body" style="margin-left: 50px; margin-top: 10px;">
                                <h4 class="card-title">{!! $product->product_name_eng!!}</h4>
                                <p class="card-text" style="width: 230px; margin-top: 15px;">TK.{!! $product->product_price_eng !!}</p>
                                <a href="{!! url('/afflite-product-view/'.$product->id) !!}" name="btn" class="btn btn-success btn-block" style="margin-top: 15px; width: 130px;">Product Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $products->links() }}
        </div>
    </div>
</div>
</div>







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
