<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bangla Kings</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    {{--product--}}
    @yield('css')

</head>

<body>

<div class="super_container">

    <!-- Header -->

    @include('customTemplate.include.header.index')

    <!-- Banner -->

    @yield('mainContent')

    <!-- Recently Viewed -->


    <!-- Brands -->

    {{--@include('customTemplate.include.brand.index')--}}

    <!-- Newsletter -->

    {{--@include('customTemplate.include.newsletter.index')--}}
{{----}}
    <!-- Footer -->

    @include('customTemplate.include.footer.index')

    <!-- Copyright -->

</div>
@yield('js')

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
