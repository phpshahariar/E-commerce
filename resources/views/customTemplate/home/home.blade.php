@extends('customTemplate.index')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('customTemplate/styles')}}/bootstrap4/bootstrap.min.css">
    <link href="{{asset('customTemplate/plugins')}}/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('customTemplate/plugins')}}/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{asset('customTemplate/plugins')}}/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="{{asset('customTemplate/plugins')}}/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="{{asset('customTemplate/plugins')}}/slick-1.8.0/slick.css">
    <link rel="stylesheet" type="text/css" href="{{asset('customTemplate/styles')}}/main_styles.css">
    <link rel="stylesheet" type="text/css" href="{{asset('customTemplate/styles')}}/responsive.css">
@endsection
@section('mainContent')

@if(Session::get('lang') == 'বাংলা')
    @include('customTemplate.home.include.home_bangla')
@elseif(Session::get('lang') == 'नहीं')
    @include('customTemplate.home.include.home_hindi')
@else
    @include('customTemplate.home.include.home_english')
@endif
@endsection

@section('js')
    <script src="{{asset('customTemplate/js')}}/jquery-3.3.1.min.js"></script>
    <script src="{{asset('customTemplate/styles')}}/bootstrap4/popper.js"></script>
    <script src="{{asset('customTemplate/styles')}}/bootstrap4/bootstrap.min.js"></script>
    <script src="{{asset('customTemplate/plugins')}}/greensock/TweenMax.min.js"></script>
    <script src="{{asset('customTemplate/plugins')}}/greensock/TimelineMax.min.js"></script>
    <script src="{{asset('customTemplate/plugins')}}/scrollmagic/ScrollMagic.min.js"></script>
    <script src="{{asset('customTemplate/plugins')}}/greensock/animation.gsap.min.js"></script>
    <script src="{{asset('customTemplate/plugins')}}/greensock/ScrollToPlugin.min.js"></script>
    <script src="{{asset('customTemplate/plugins')}}/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="{{asset('customTemplate/plugins')}}/slick-1.8.0/slick.js"></script>
    <script src="{{asset('customTemplate/plugins')}}/easing/easing.js"></script>
    <script src="{{asset('customTemplate/js')}}/custom.js"></script>

@endsection
