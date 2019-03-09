@extends('customTemplate.index')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/customTemplate/styles/')}}/bootstrap4/bootstrap.min.css">
    <link href="{{asset('/customTemplate/plugins/')}}/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('/customTemplate/styles/')}}/contact_styles.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/customTemplate/styles/')}}/contact_responsive.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
                <div class="col-lg-6">
                    <div class="col-lg-8 offset-lg-1" style="margin: 0 auto; ">
                        <div class="contact_form_container">
                            @if(Session::get('lang') == 'বাংলা')
                                <div class="contact_form_title">রেজিস্টার</div>

                                {{Form::open(['url'=> '/register-newcustomer', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="text" name="customer_name"  class="form-control" placeholder="আপনার নাম লিখুন" required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="text" name="customer_phone_number"  class="form-control" placeholder="আপনার ফোন নম্বর লিখুন " required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="email" name="customer_email" class="form-control" placeholder="আপনার ইমেইল লিখুন" required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="password" name="customer_password"  class="form-control" placeholder="আপনার পাসওয়ার্ড লিখুন" required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="password" name="customer_confirm_password" class="form-control" placeholder="আপনার নিশ্চিত পাসওয়ার্ড লিখুন" required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_button">
                                    <button type="submit" name="btn" class="btn-block button contact_submit_button">রেজিস্টার</button>
                                </div>
                                {{Form::close()}}

                        </div>
                    </div>

                </div>
                <div class="col-lg-6" style="border-left: 1px solid gainsboro">
                    <div class="col-lg-8 offset-lg-1" style="margin: 0 auto; ">
                        <div class="contact_form_container">
                            <div class="contact_form_title">লগইন</div>

                            {{Form::open(['url'=> '/customer-login', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                            <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                <input type="email" name="customer_email"  class="form-control" placeholder="আপনার ইমেইল লিখুন" required="required" data-error="Name is required.">

                            </div>
                            <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                <input type="password" name="customer_password" class="form-control" placeholder="আপনার পাসওয়ার্ড লিখুন" required="required" data-error="Name is required.">

                            </div>

                            <div class="contact_form_button">
                                <button type="submit" class=" btn-block button contact_submit_button">লগইন</button>
                            </div>
                            {{Form::close()}}
                            @elseif(Session::get('lang') == 'नहीं')
                                <div class="contact_form_title">रजिस्टर</div>

                                {{Form::open(['url'=> '/register-newcustomer', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="text" name="customer_name"  class="form-control" placeholder="अपना नाम दर्ज करें" required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="text" name="customer_phone_number"  class="form-control" placeholder="अपना दूरभाष क्रमांक दर्ज करें " required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="email" name="customer_email" class="form-control" placeholder="अपना ईमेल दर्ज करें" required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="password" name="customer_password"  class="form-control" placeholder="अपना पासवर्ड डालें" required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="password" name="customer_confirm_password" class="form-control" placeholder="अपना पुष्टि पासवर्ड दर्ज करें" required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_button">
                                    <button type="submit" name="btn" class="btn-block button contact_submit_button">रजिस्टर</button>
                                </div>
                                {{Form::close()}}

                        </div>
                    </div>

                </div>
                <div class="col-lg-6" style="border-left: 1px solid gainsboro">
                    <div class="col-lg-8 offset-lg-1" style="margin: 0 auto; ">
                        <div class="contact_form_container">
                            <div class="contact_form_title">लॉग इन</div>

                            {{Form::open(['url'=> '/customer-login', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                            <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                <input type="email" name="customer_email"  class="form-control" placeholder="अपना ईमेल दर्ज करें" required="required" data-error="Name is required.">

                            </div>
                            <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                <input type="password" name="customer_password" class="form-control" placeholder="अपना पासवर्ड डालें" required="required" data-error="Name is required.">

                            </div>

                            <div class="contact_form_button">
                                <button type="submit" class=" btn-block button contact_submit_button">लॉग इन</button>
                            </div>
                            {{Form::close()}}
                            @else
                                <div class="contact_form_title">Register</div>

                                {{Form::open(['url'=> '/register-newcustomer', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="text" name="customer_name"  class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">
                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="text" name="customer_phone_number"  class="form-control" placeholder="Enter your phone number " required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="email" name="customer_email" class="form-control" placeholder="Enter your email" required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="password" name="customer_password"  class="form-control" placeholder="Enter your password" required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="password" name="customer_confirm_password" class="form-control" placeholder="Enter your confirm password" required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_button">
                                    <button type="submit" name="btn" class="btn-block button contact_submit_button">Register</button>
                                </div>
                                {{Form::close()}}

                        </div>
                    </div>

                </div>
                <div class="col-lg-6" style="border-left: 1px solid gainsboro">
                    <div class="col-lg-8 offset-lg-1" style="margin: 0 auto; ">
                        <div class="contact_form_container">
                            <div class="contact_form_title">Login</div>

                            {{Form::open(['url'=> '/customer-login', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                            <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                <input type="text" name="customer_email"  class="form-control" placeholder="Enter your email" required="required" data-error="Name is required.">

                            </div>
                            <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                <input type="password" name="customer_password" class="form-control" placeholder="Enter your password" required="required" data-error="Name is required.">

                            </div>

                            <div class="contact_form_button">
                                <button type="submit" class=" btn-block button contact_submit_button">Login</button>
                            </div>
                            {{Form::close()}}
                             <div class="contact_form_button">
                                 <a href="{{URL::to('/login/facebook')}}"><button style="background-color: #4267b2" class=" btn-block button contact_submit_button "></span>Continue with Facebook</button></a>
                            </div>

                            @endif


                        </div>
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
@endsection

