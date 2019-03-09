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
                                <div class="contact_form_title">হস্তান্তর তথ্য</div>
                                <p>হাই! <strong>{{Session::get('customer_name')}}</strong> আপনার শিপিং তথ্য পূরণ করুন। আপনার বিলিং এবং শিপিং তথ্য একই হয় তাহলে শুধু ক্লিক করুন <strong>নিশ্চিত করুন এবং পরবর্তী</strong> বোতামটি</p>
                                {{Form::open(['url'=> '/save-shipping', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="text" name="ship_customer_name"  value="{{$customer->customer_name}}" class="form-control" placeholder="আপনার নাম লিখুন" required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="text" name="ship_customer_phone_number" value="{{$customer->customer_phone_number}}"  class="form-control" placeholder="আপনার ফোন নম্বর লিখুন " required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="email" name="ship_customer_email"  value="{{$customer->customer_email}}" class="form-control" placeholder="আপনার ইমেইল লিখুন" required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <select required id="country" name="ship_country" class="form-control product_color">
                                        <option >--দেশ নির্বাচন করুন--</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}" >{{$country->country_name}}</option>
                                        @endforeach
                                    </select>
                                    <select id="division" name="ship_division" class="form-control product_color">
                                        <option >--বিভাগ নির্বাচন করুন--</option>
                                    </select>
                                    {{--<input type="email" name="ship_customer_email"  value="{{$customer->customer_email}}" class="form-control" placeholder="Enter your email" required="required" data-error="Name is required.">--}}
                                </div>
                                <div id="shipp_id" style="display:none!important;" class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input  readonly type="hidden" id="shippingChargeInput" name="ship_charge"  class="form-control" placeholder="" required="required" data-error="Name is required.">
                                    <h6>আপনার শিপিং চার্জ হতে হবে <strong id="shippingCharge">0.00</strong> টাকা</h6>

                                </div>



                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <textarea name="ship_customer_address" placeholder="আপনার সম্পূর্ণ ঠিকানা লিখুন" class="form-control" >{{$customer->customer_address}}</textarea>

                                </div>
                                <div class="contact_form_button">
                                    <button type="submit" name="btn" class="btn-block button contact_submit_button">নিশ্চিত করুন এবং পরবর্তী</button>
                                </div>
                                {{Form::close()}}
                            @elseif(Session::get('lang') == 'नहीं')
                                <div class="contact_form_title">शिपिंग सूचना</div>
                                <p>Hi, <strong>{{Session::get('customer_name')}}</strong> अपनी शिपिंग जानकारी भरें। यदि आपकी बिलिंग और शिपिंग जानकारी समान हैं तो बस क्लिक करें <strong>पुष्टि करें और अगला</strong>बटन</p>
                                {{Form::open(['url'=> '/save-shipping', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="text" name="ship_customer_name"  value="{{$customer->customer_name}}" class="form-control" placeholder="अपना नाम दर्ज करें" required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="text" name="ship_customer_phone_number" value="{{$customer->customer_phone_number}}"  class="form-control" placeholder="अपना दूरभाष क्रमांक दर्ज करें" required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="email" name="ship_customer_email"  value="{{$customer->customer_email}}" class="form-control" placeholder="अपना ईमेल दर्ज करें" required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <select required id="country" name="ship_country" class="form-control product_color">
                                        <option >--देश चुनिए--</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}" >{{$country->country_name}}</option>
                                        @endforeach
                                    </select>
                                    <select id="division" name="ship_division" class="form-control product_color">
                                        <option >--विभाजन का चयन करें--</option>
                                    </select>
                                    {{--<input type="email" name="ship_customer_email"  value="{{$customer->customer_email}}" class="form-control" placeholder="Enter your email" required="required" data-error="Name is required.">--}}
                                </div>
                                <div id="shipp_id" style="display:none!important;" class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input  readonly type="hidden" id="shippingChargeInput" name="ship_charge"  class="form-control" placeholder="" required="required" data-error="Name is required.">
                                    <h6>आपका शिपिंग चार्ज होगा<strong id="shippingCharge">0.00</strong> टका</h6>

                                </div>



                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <textarea name="ship_customer_address" placeholder="अपना पूरा पता दर्ज करें" class="form-control" >{{$customer->customer_address}}</textarea>

                                </div>
                                <div class="contact_form_button">
                                    <button type="submit" name="btn" class="btn-block button contact_submit_button">पुष्टि करें और अगला</button>
                                </div>
                                {{Form::close()}}
                            @else
                                <div class="contact_form_title">Shipping Information</div>
                                <p>Hi, <strong>{{Session::get('customer_name')}}</strong> Fill Up Your Shipping Information. If your Billing & Shipping Information are Same Just Click The <strong>Confirm & Next</strong>The Button</p>
                                {{Form::open(['url'=> '/save-shipping', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="text" name="ship_customer_name"  value="{{$customer->customer_name}}" class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="text" name="ship_customer_phone_number" value="{{$customer->customer_phone_number}}"  class="form-control" placeholder="Enter your phone number " required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input type="email" name="ship_customer_email"  value="{{$customer->customer_email}}" class="form-control" placeholder="Enter your email" required="required" data-error="Name is required.">

                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <select required id="country" name="ship_country" class="form-control product_color">
                                        <option >--Select Country--</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}" >{{$country->country_name}}</option>
                                        @endforeach
                                    </select>
                                    <select id="division" name="ship_division" class="form-control product_color">
                                        <option >--Select Division--</option>
                                    </select>
                                    {{--<input type="email" name="ship_customer_email"  value="{{$customer->customer_email}}" class="form-control" placeholder="Enter your email" required="required" data-error="Name is required.">--}}
                                </div>
                                <div id="shipp_id" style="display:none!important;" class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <input  readonly type="hidden" id="shippingChargeInput" name="ship_charge"  class="form-control" placeholder="" required="required" data-error="Name is required.">
                                    <h6>Your Shipping Charge Will Be <strong id="shippingCharge">0.00</strong> Taka</h6>

                                </div>



                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    <textarea name="ship_customer_address" placeholder="Enter your Full Address" class="form-control" >{{$customer->customer_address}}</textarea>

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
    {{--<script src="{{asset('/customTemplate/js/')}}/contact_custom.js"></script>--}}

    <script>
        $(document).on('change','#country', function () {
            var country_id = $(this).val();

            var op= " ";

            $.ajax({
                type:'get',
                url: '{!! route('/manage-division') !!}',
                data:{'id':country_id},
                success:function (data) {

                    for (var i=0; i<data.length; i++) {
                        op +='<option  value="'+data[i].id+'">'+data[i].division_name+'</option>';
                    }
                    $('#division').html(op);

                }
            });

        });
    </script>

    <script>
        $(document).on('change','#country', function () {
            var country_id = $(this).val();
            // alert(country_id)
            $.ajax({
                type:'get',
                url: '{!! route('/manage-charge-country') !!}',
                data:{'id':country_id},
                success:function (data) {
                    $('#shipp_id').show()
                    $('#shippingCharge').html(data)
                    $('#shippingChargeInput').val(data)
                }
            });

        });
    </script>
    <script>
        $(document).on('change','#division', function () {
            var country_id = $(this).val();
            // alert(country_id)
            $.ajax({
                type:'get',
                url: '{!! route('/manage-charge-division') !!}',
                data:{'id':country_id},
                success:function (data) {
                    // alert(data)
                    $('#shipp_id').show()
                    $('#shippingCharge').html(data)
                    $('#shippingChargeInput').val(data)
                }
            });

        });
    </script>
@endsection

