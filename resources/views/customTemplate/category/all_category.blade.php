@extends('customTemplate.index')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/customTemplate/styles/')}}/bootstrap4/bootstrap.min.css">
    <link href="{{asset('/customTemplate/plugins/')}}/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('/customTemplate/styles/')}}/cart_styles.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/customTemplate/styles/')}}/cart_responsive.css">
@endsection

@section('mainContent')
    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        @if(Session::get('lang') == 'বাংলা')
                            <div class="cart_title">মাইন্ ক্যাটেগরীজ</div>
                        @elseif(Session::get('lang') == 'नहीं')
                            <div class="cart_title">मुख्य कैटेगरी</div>
                        @else
                            <div class="cart_title">Main Categories</div>
                        @endif


                    </div>
                </div>
            </div>
            @if(Session::get('lang') == 'বাংলা')
                <div class="row" >
                    @foreach($mainCategories as $mCategory)
                        <div class="col-md-4">
                            <a href="{{URL::to('/view-sub-category/'.$mCategory->id)}}">
                                <div class="order_total">
                                    <div class="order_total_content text-md-center">
                                        <div class="order_total_amount" id="subTotal">{{$mCategory->category_name_ban}}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            @elseif(Session::get('lang') == 'नहीं')
                <div class="row" >
                    @foreach($mainCategories as $mCategory)
                        <div class="col-md-4">
                            <a href="{{URL::to('/view-sub-category/'.$mCategory->id)}}">
                                <div class="order_total">
                                    <div class="order_total_content text-md-center">
                                        <div class="order_total_amount" id="subTotal">{{$mCategory->category_name_hin}}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            @else
                <div class="row" >
                    @foreach($mainCategories as $mCategory)
                        <div class="col-md-4">
                            <a href="{{URL::to('/view-sub-category/'.$mCategory->id)}}">
                                <div class="order_total">
                                    <div class="order_total_content text-md-center">
                                        <div class="order_total_amount" id="subTotal">{{$mCategory->category_name}}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            @endif


    </div>
@endsection

@section('js')
    <script src="{{asset('/customTemplate/js/')}}/jquery-3.3.1.min.js"></script>
    <script src="{{asset('/customTemplate/styles/')}}/bootstrap4/popper.js"></script>
    <script src="{{asset('/customTemplate/styles/')}}/bootstrap4/bootstrap.min.js"></script>
    <script src="{{asset('/customTemplate/plugins/')}}/greensock/TweenMax.min.js"></script>
    <script src="{{asset('/customTemplate/plugins/')}}/greensock/TimelineMax.min.js"></script>
    <script src="{{asset('/customTemplate/plugins/')}}/scrollmagic/ScrollMagic.min.js"></script>
    <script src="{{asset('/customTemplate/plugins/')}}/greensock/animation.gsap.min.js"></script>
    <script src="{{asset('/customTemplate/plugins/')}}/greensock/ScrollToPlugin.min.js"></script>
    <script src="{{asset('/customTemplate/plugins/')}}/easing/easing.js"></script>
    <script src="{{asset('/customTemplate/js/')}}/cart_custom.js"></script>



@endsection
