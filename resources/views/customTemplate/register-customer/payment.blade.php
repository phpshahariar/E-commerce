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
                                <div class="contact_form_title">পেমেন্ট</div>

                                {{Form::open(['url'=> '/save-payment', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    @if(Session::get('discount'))
                                        <p>আপনার মোট চার্জ হবে <strong>{{(Session::get('pubSubTotal')-(((Session::get('pubSubTotal'))*(Session::get('discount')))/100))+Session::get('shipCharge') }}</strong>  টাকা .... (শিপিং চার্জ অন্তর্ভুক্ত) সাথে <strong>{{Session::get('discount').'%'}}</strong>ডিসকাউন্ট</p>
                                    @else
                                        <p>আপনার মোট চার্জ হবে <strong>{{Session::get('pubSubTotal')+Session::get('shipCharge')}}</strong>  টাকা .... (শিপিং চার্জ অন্তর্ভুক্ত)</p>
                                    @endif
                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">

                                    {{--<input type="radio" name="customer_name" id="contact_form_name" value="bkash" class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">--}}
                                    <label ><input type="radio" name="payment_type" id="contact_form_name" value="cash" class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">নগদ</label>
                                    <label ><input type="radio" name="payment_type" id="contact_form_name" value="card" class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">কার্ড</label>
                                    <label ><input type="radio" name="payment_type" id="contact_form_name" value="paypal" class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">পেপ্যাল</label>

                                </div>

                                <div class="contact_form_button">
                                    <button type="submit" name="btn" class="btn-block button contact_submit_button">নিশ্চিত করা</button>
                                </div>
                                {{Form::close()}}
                            @elseif(Session::get('lang') == 'नहीं')
                                <div class="contact_form_title">अदायगी</div>

                                {{Form::open(['url'=> '/save-payment', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    @if(Session::get('discount'))
                                        <p>आपका कुल प्रभार होगा <strong>{{(Session::get('pubSubTotal')-(((Session::get('pubSubTotal'))*(Session::get('discount')))/100))+Session::get('shipCharge') }}</strong>  टका .... (शिपिंग चार्ज शामिल ) करें <strong>{{Session::get('discount').'%'}}</strong> डिस्काउंट</p>
                                    @else
                                        <p>आपका कुल प्रभार होगा <strong>{{Session::get('pubSubTotal')+Session::get('shipCharge')}}</strong>  टका .... (शिपिंग चार्ज शामिल करें)</p>
                                    @endif
                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">

                                    {{--<input type="radio" name="customer_name" id="contact_form_name" value="bkash" class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">--}}
                                    <label ><input type="radio" name="payment_type" id="contact_form_name" value="cash" class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">कैश</label>
                                    <label ><input type="radio" name="payment_type" id="contact_form_name" value="card" class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">कार्ड</label>
                                    <label ><input type="radio" name="payment_type" id="contact_form_name" value="paypal" class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">पेपैल</label>

                                </div>

                                <div class="contact_form_button">
                                    <button type="submit" name="btn" class="btn-block button contact_submit_button">की पुष्टि करें</button>
                                </div>
                                {{Form::close()}}
                            @else
                                <div class="contact_form_title">Payment</div>

                                {{Form::open(['url'=> '/save-payment', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                    @if(Session::get('discount'))
                                        <p>Your Total Charge Will Be <strong>{{(Session::get('pubSubTotal')-(((Session::get('pubSubTotal'))*(Session::get('discount')))/100))+Session::get('shipCharge') }}</strong>  Taka.... (Include Shipping Charge) with <strong>{{Session::get('discount').'%'}}</strong> discount</p>
                                    @else
                                        <p>Your Total Charge Will Be <strong>{{Session::get('pubSubTotal')+Session::get('shipCharge')}}</strong>  Taka.... (Include Shipping Charge)</p>
                                    @endif
                                </div>
                                <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">

                                    {{--<input type="radio" name="customer_name" id="contact_form_name" value="bkash" class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">--}}
                                    <label ><input type="radio" name="payment_type" id="contact_form_name" value="cash" class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">Cash</label>
                                    <label ><input type="radio" name="payment_type" id="contact_form_name" value="card" class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">Card</label>
                                    <label ><input type="radio" name="payment_type" id="contact_form_name" value="paypal" class="form-control" placeholder="Enter your name" required="required" data-error="Name is required.">Paypal</label>

                                </div>

                                <div class="contact_form_button">
                                    <button type="submit" name="btn" class="btn-block button contact_submit_button">Confirm</button>
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

