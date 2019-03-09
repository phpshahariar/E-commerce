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
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h2><b>Register</b></h2>
                <br/>
                {{Form::open(['url'=> '/register-new-customer', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                    <div class="form-group">
                        <input type="text" name="customer_name" style="height: 50px;"  class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">
                    </div>
                    <div class="form-group">
                        <input type="number" style="height: 50px;" name="customer_phone_number"  class="form-control" placeholder="Enter your phone number " required="required" data-error="Name is required.">
                    </div>
                    <div class="form-group">
                        <input type="email" style="height: 50px;" name="customer_email" class="form-control" placeholder="Enter your email" required="required" data-error="Name is required.">
                    </div>
                    <div class="form-group">
                        <input type="password" style="height: 50px;" name="customer_password"  class="form-control" placeholder="Enter your password" required="required" data-error="Name is required.">
                    </div>
                    <div class="form-group">
                        <input type="password" style="height: 50px;" name="customer_confirm_password" class="form-control" placeholder="Enter your confirm password" required="required" data-error="Name is required.">
                    </div>
                    <div class="form-group">
                        <button type="submit" style="height: 40px;" name="btn" class="btn btn-primary btn-block">Register</button>
                    </div>
                {{Form::close()}}
                <h2 class="text-center">--------oR--------</h2>
                <h2><b>Login</b></h2>
                <br/>
                {{Form::open(['url'=> '/customer-login', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                <div class="form-group">
                    <input type="text" style="height: 50px;" name="customer_email"  class="form-control" placeholder="Enter your email" required="required" data-error="Name is required.">
                </div>
                <div class="form-group">
                    <input type="password" style="height: 50px;" name="customer_password" class="form-control" placeholder="Enter your password" required="required" data-error="Name is required.">
                </div>
                <div class="form-group">
                    <button type="submit" style="height: 40px;" name="btn" class="btn btn-success btn-block">Login</button>
                </div>
                {{Form::close()}}
                <div class="form-group">
                    <a href="{{URL::to('/login/facebook')}}"><button style="background-color: #4267b2; color: #ffffff; height: 40px;" class="form-control btn btn-block"></span>Continue with Facebook</button></a>
                </div>
            </div>
            </div>
            <div class="col-sm-3" style="border: 0px solid #CCCCCC";></div>
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

</body>
</html>