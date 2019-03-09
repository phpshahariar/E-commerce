@extends('customTemplate.index')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('customTemplate/styles/')}}/bootstrap4/bootstrap.min.css">
    <link href="{{asset('customTemplate/plugins/')}}/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('customTemplate/plugins/')}}/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{asset('customTemplate/plugins/')}}/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="{{asset('customTemplate/plugins/')}}/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="{{asset('customTemplate/styles/')}}/product_styles.css">
    <link rel="stylesheet" type="text/css" href="{{asset('customTemplate/styles/')}}/product_responsive.css">

@endsection

@section('mainContent')
    @if(Session::get('lang') == 'বাংলা')
        @include('customTemplate.product.include.product_ban')
    @elseif(Session::get('lang') == 'नहीं')
        @include('customTemplate.product.include.product_hin')
    @else
        @include('customTemplate.product.include.product_eng')
    @endif
    {{--@include('customTemplate.include.recentlyView.index')--}}
@endsection

@section('js')
    <script src="{{asset('customTemplate/js')}}/product_custom.js"></script>
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
    {{--<script src="{{asset('customTemplate/js/')}}/product_custom.js"></script>--}}

    <script>
        $('#select_size').change(function (e) {
            e.preventDefault();
        })
    </script>



@endsection
