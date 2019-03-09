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

            <div class="row" style="border: 1px solid gainsboro; padding-top: 30px; padding-bottom: 50px">
                <div class="col-lg-12">
                    <div class="col-lg-6 offset-lg-1" style="margin: 0 auto; ">
                        <div class="contact_form_container">
                            @if(Session::get('lang') == 'বাংলা')
                                <div class="contact_form_title">বিল সংক্রান্ত তথ্য</div>
                                <p>হাই <strong>{{Session::get('customer_name')}},</strong> আপনার বিলিং তথ্য পূরণ করুন</p>

                                {{Form::open(['url'=> '/save-billing-info', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="text" name="customer_name"  value="{{$customer->customer_name}}"  class="form-control" placeholder="আপনার নাম লিখুন" required="required" data-error="Name is required.">
                                    <input type="hidden" name="customer_id"  value="{{Session::get('customer_id')}}" class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="text" name="customer_phone_number" value="{{$customer->customer_phone_number}}"  class="form-control" placeholder="আপনার ফোন নম্বর লিখুন " required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="email" name="customer_email" value="{{$customer->customer_email}}"  class="form-control" placeholder="আপনার ইমেইল লিখুন" required="required" data-error="Name is required.">

                                </div>

                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    {{--<input type="text" name="customer_confirm_password"  class="form-control"  >--}}
                                    <textarea class="form-control" name="customer_address"  required="required" placeholder="আপনার সম্পূর্ণ ঠিকানা লিখুন"  data-error="Address is required." ></textarea>

                                </div>
                                <div class="contact_form_button">
                                    <button type="submit" name="btn" class="btn-block button contact_submit_button">নিশ্চিত করুন এবং পরবর্তী</button>
                                </div>
                                {{Form::close()}}
                            @elseif(Session::get('lang') == 'नहीं')
                                <div class="contact_form_title">बिलिंग जानकारी</div>
                                <p>हाय! <strong>{{Session::get('customer_name')}},</strong> कृपया अपनी बिलिंग जानकारी भरें</p>

                                {{Form::open(['url'=> '/save-billing-info', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="text" name="customer_name"  value="{{$customer->customer_name}}"  class="form-control" placeholder="अपना नाम दर्ज करें" required="required" data-error="Name is required.">
                                    <input type="hidden" name="customer_id"  value="{{Session::get('customer_id')}}" class="form-control" placeholder="अपना नाम दर्ज करें" required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="text" name="customer_phone_number" value="{{$customer->customer_phone_number}}"  class="form-control" placeholder="अपना दूरभाष क्रमांक दर्ज करें " required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="email" name="customer_email" value="{{$customer->customer_email}}"  class="form-control" placeholder="अपना ईमेल दर्ज करें" required="required" data-error="Name is required.">

                                </div>

                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    {{--<input type="text" name="customer_confirm_password"  class="form-control"  >--}}
                                    <textarea class="form-control" name="customer_address"  required="required" placeholder="अपना पूरा पता दर्ज करें"  data-error="Address is required." ></textarea>

                                </div>
                                <div class="contact_form_button">
                                    <button type="submit" name="btn" class="btn-block button contact_submit_button">पुष्टि करें और अगला</button>
                                </div>
                                {{Form::close()}}
                            @else
                                <div class="contact_form_title">Billing Information</div>
                                <p>Hi <strong>{{Session::get('customer_name')}},</strong> Please Fill Your Billing Information</p>

                                {{Form::open(['url'=> '/save-billing-info', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="text" name="customer_name"  value="{{$customer->customer_name}}"  class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">
                                    <input type="hidden" name="customer_id"  value="{{Session::get('customer_id')}}" class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="text" name="customer_phone_number" value="{{$customer->customer_phone_number}}"  class="form-control" placeholder="Enter your phone number " required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="email" name="customer_email" value="{{$customer->customer_email}}"  class="form-control" placeholder="Enter your email" required="required" data-error="Name is required.">

                                </div>

                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    {{--<input type="text" name="customer_confirm_password"  class="form-control"  >--}}
                                    <textarea class="form-control" name="customer_address"  required="required" placeholder="Enter your Full Address"  data-error="Address is required." ></textarea>

                                </div>
                                <div class="contact_form_button">
                                    <button type="submit" name="btn" class="btn-block button contact_submit_button">Confirm & Next</button>
                                </div>
                                {{Form::close()}}
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

