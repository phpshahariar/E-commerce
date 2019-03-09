@extends('customTemplate.index')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('customTemplate/styles/')}}/bootstrap4/bootstrap.min.css">
    <link href="{{asset('customTemplate/plugins/')}}/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('customTemplate/plugins/')}}/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{asset('customTemplate/plugins/')}}/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="{{asset('customTemplate/plugins/')}}/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="{{asset('customTemplate/plugins/')}}/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="{{asset('customTemplate/styles/')}}/shop_styles.css">
    <link rel="stylesheet" type="text/css" href="{{asset('customTemplate/styles/')}}/shop_responsive.css">

@endsection
@section('mainContent')
    @if(isset($user))
    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{asset($user->shopper_banner)}}"></div>
        {{--<div class="home_overlay"></div>--}}
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">{{$user->user_name}}</h2>
        </div>
    </div>
    @endif

    @if(isset($dynamicpage))
    <div class="home">
        <div class="home_background parallax-window" style="height: 100%" data-parallax="scroll" data-image-src="{{asset($dynamicpage->image)}}"></div>
        <img src="{{asset($dynamicpage->image)}}">
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">{{$dynamicpage->page_name_eng}}</h2>
        </div>
    </div>
    @endif

    <!-- Shop -->

    <div class="shop">
        <div class="container">
            <div class="row">
                {{--@include('customTemplate.search.include.side_content')--}}
                @include('customTemplate.offerPage.include.main_content')
            </div>
        </div>
    </div>
    {{--@include('customTemplate.include.recentlyView.index')--}}
@endsection

@section('js')
    <script src="{{asset('customTemplate/js/')}}/jquery-3.3.1.min.js"></script>
    <script src="{{asset('customTemplate/styles/')}}/bootstrap4/popper.js"></script>
    <script src="{{asset('customTemplate/styles/')}}/bootstrap4/bootstrap.min.js"></script>
    <script src="{{asset('customTemplate/plugins/')}}/greensock/TweenMax.min.js"></script>
    <script src="{{asset('customTemplate/plugins/')}}/greensock/TimelineMax.min.js"></script>
    <script src="{{asset('customTemplate/plugins/')}}/scrollmagic/ScrollMagic.min.js"></script>
    <script src="{{asset('customTemplate/plugins/')}}/greensock/animation.gsap.min.js"></script>
    <script src="{{asset('customTemplate/plugins/')}}/greensock/ScrollToPlugin.min.js"></script>
    <script src="{{asset('customTemplate/plugins/')}}/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="{{asset('customTemplate/plugins/')}}/easing/easing.js"></script>
    <script src="{{asset('customTemplate/plugins/')}}/Isotope/isotope.pkgd.min.js"></script>
    <script src="{{asset('customTemplate/plugins/')}}/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script src="{{asset('customTemplate/plugins/')}}/parallax-js-master/parallax.min.js"></script>
    <script src="{{asset('customTemplate/js/')}}/shop_custom.js"></script>

@endsection
