<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Login | Propeller - Admin Dashboard">
    <meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">
    <title>Login </title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('backEnd/themes/')}}/images/favicon.ico">

    <!-- Google icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{asset('backEnd/assets/')}}/css/bootstrap.min.css">

    <!-- Propeller css -->
    <link rel="stylesheet" type="text/css" href="{{asset('backEnd/assets/')}}/css/propeller.min.css">

    <!-- Propeller theme css-->
    <link rel="stylesheet" type="text/css" href="{{asset('backEnd/themes/')}}/css/propeller-theme.css" />

    <!-- Propeller admin theme css-->
    <link rel="stylesheet" type="text/css" href="{{asset('backEnd/themes/')}}/css/propeller-admin.css">

</head>

<body class="body-custom">
<?php if(Session::get('messageD')){ ?>

<div style="text-align: center" class="alert alert-danger"><b>{{Session::get('messageD')}}</b></div>
<?php } ?>
<div class="logincard">
    <div class="pmd-card card-default pmd-z-depth">

        <div class="login-card">

            {{Form::open(['url'=> '/login-admin', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                <div class="pmd-card-title card-header-border text-center">
                    <div class="loginlogo">
                        <a href="javascript:void(0);"><img src="{{asset('backEnd/themes/')}}/images/logo-icon.png" alt="Logo"></a>
                    </div>
                    <h3>Sign In <span>with <strong>Bangla Kings</strong></span></h3>
                </div>

                <div class="pmd-card-body">

                    <div class="form-group pmd-textfield pmd-textfield-floating-label">
                        <label for="inputError1" class="control-label pmd-input-group-label">Email</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">perm_identity</i></div>
                            <input name="email" type="text" class="form-control" id="exampleInputAmount">
                        </div>
                    </div>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif

                    <div class="form-group pmd-textfield pmd-textfield-floating-label">
                        <label for="inputError1" class="control-label pmd-input-group-label">Password</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">lock_outline</i></div>
                            <input name="password" type="password" class="form-control" id="exampleInputAmount">
                        </div>
                    </div>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif

                </div>
                <div class="pmd-card-footer card-footer-no-border card-footer-p16 text-center">
                    <div class="form-group clearfix">
                        <div class="checkbox pull-left">
                            <label class="pmd-checkbox checkbox-pmd-ripple-effect">
                                <input type="checkbox" checked="" value="">
                                <span class="pmd-checkbox"> Remember me</span>
                            </label>
                        </div>
                        <span class="pull-right forgot-password">

						</span>
                    </div>
                    <button  type="submit" class="btn pmd-ripple-effect btn-primary btn-block">Login</button>

                    <p class="redirection-link"> </p>

                </div>

           {{Form::close()}}
        </div>


    </div>
</div>

<!-- Scripts Starts -->
<script src="{{asset('backEnd/assets/')}}/js/jquery-1.12.2.min.js"></script>
<script src="{{asset('backEnd/assets/')}}/js/bootstrap.min.js"></script>
<script src="{{asset('backEnd/assets/')}}/js/propeller.min.js"></script>


<!-- Scripts Ends -->

</body>
</html>
