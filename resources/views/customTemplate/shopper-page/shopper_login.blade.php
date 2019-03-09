@extends('customTemplate.index')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/customTemplate/styles/')}}/bootstrap4/bootstrap.min.css">
    <link href="{{asset('/customTemplate/plugins/')}}/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('/customTemplate/styles/')}}/contact_styles.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/customTemplate/styles/')}}/contact_responsive.css">
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
                <div class="col-lg-12">
                    <div class="col-lg-6 offset-lg-1" style="margin: 0 auto; ">
                        @if(Session::get('lang') == 'বাংলা')
                            <div class="contact_form_title">বিক্রেতা লগইন</div>
                            {{Form::open(['url'=> '/shopper-login-dashboard', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                            <div class="component-box">

                                <!-- Text fields example -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                            <div class="pmd-card-body">
                                                <!-- Regular Input -->

                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">ইমেইল</label>
                                                    <input required type="email"  class="form-control" name="email">
                                                </div>
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif


                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">পাসওয়ার্ড</label>
                                                    <input required type="password" id="password" class="form-control" name="password">
                                                </div>
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                            <!-- Textarea -->


                                            </div>
                                        </div>

                                    </div>
                                </div><!-- end Text fields example -->

                            </div>
                            <div class="pmd-modal-action">
                                <button id="btn" class="btn pmd-ripple-effect btn-primary btn-block" type="submit">লগইন</button>

                            </div>
                            {{Form::close()}}
                        @elseif(Session::get('lang') == 'नहीं')
                            <div class="contact_form_title">दुकानदार लॉगिन करें</div>
                            {{Form::open(['url'=> '/shopper-login-dashboard', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                            <div class="component-box">

                                <!-- Text fields example -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                            <div class="pmd-card-body">
                                                <!-- Regular Input -->

                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">ईमेल</label>
                                                    <input required type="email"  class="form-control" name="email">
                                                </div>
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif


                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">पासवर्ड</label>
                                                    <input required type="password" id="password" class="form-control" name="password">
                                                </div>
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                            <!-- Textarea -->


                                            </div>
                                        </div>

                                    </div>
                                </div><!-- end Text fields example -->

                            </div>
                            <div class="pmd-modal-action">
                                <button id="btn" class="btn pmd-ripple-effect btn-primary btn-block" type="submit">लॉग इन</button>

                            </div>
                            {{Form::close()}}
                        @else
                            <div class="contact_form_title">Shopper Login Page</div>
                            {{Form::open(['url'=> '/shopper-login-dashboard', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                            <div class="component-box">

                                <!-- Text fields example -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                            <div class="pmd-card-body">
                                                <!-- Regular Input -->

                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Email</label>
                                                    <input required type="email"  class="form-control" name="email">
                                                </div>
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif


                                                <div class="form-group">
                                                    <label for="regular1" class="control-label">Password</label>
                                                    <input required type="password" id="password" class="form-control" name="password">
                                                </div>
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                            <!-- Textarea -->


                                            </div>
                                        </div>

                                    </div>
                                </div><!-- end Text fields example -->

                            </div>
                            <div class="pmd-modal-action">
                                <button id="btn" class="btn pmd-ripple-effect btn-primary btn-block" type="submit">Login</button>

                            </div>
                            {{Form::close()}}
                        @endif




                    </div>

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
    {{--<script src="{{asset('/customTemplate/js/')}}/contact_custom.js"></script>--}}

@endsection

