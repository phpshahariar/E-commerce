@extends('customTemplate.index')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/customTemplate/styles/')}}/bootstrap4/bootstrap.min.css">
    <link href="{{asset('/customTemplate/plugins/')}}/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('/customTemplate/styles/')}}/contact_styles.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/customTemplate/styles/')}}/contact_responsive.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


@endsection

@section('mainContent')
    <div class="contact_form">
        <div class="container">
            <div class="row">
                @if(Session::get('message'))
                    <h4 style="margin: 0 auto; margin-bottom: 20px; color: red">{{Session::get('message')}}</h4>
                @endif
            </div>
            <div class="row" style="border: 1px solid gainsboro; padding-top: 30px; padding-bottom: 50px">
                <div class="col-lg-2">
                    <ul class="cat_menu">

                        {{--@foreach($mainCategories as $mainCategory)--}}
                            <li class="hassubs">
                                <a href="{{URL::to('/view-product-by-category/')}}">Home</a>
                            </li>
                        <li class="hassubs">
                            <a href="{{URL::to('/view-product-by-category/')}}">Order</a>

                        </li>
                        <li class="hassubs">
                            <a href="{{URL::to('/view-product-by-category/')}}">Add Product</a>

                        </li>
                        <li class="hassubs">
                            <a href="{{URL::to('/view-product-by-category/')}}">Manage Product</a>

                        </li>
                        {{--@endforeach--}}

                    </ul>
                </div>
                <div class="col-lg-10" style="border-left: 1px solid gainsboro">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
        <div class="panel"></div>
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
    <script src="{{asset('/customTemplate/js/')}}/contact_custom.js"></script>
@endsection

