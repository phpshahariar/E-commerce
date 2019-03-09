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
                                <strong>ধন্যবাদ ....</strong>
                                <p>আপনি সফলভাবে কেনাকাটা সম্পূর্ণ করছেন .. আমরা শীঘ্রই আপনার সাথে যোগাযোগ করব ..</p>
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="text-align: center" colspan="2">চালান নম্বর : {{$order->id}}</th>
                                    </tr>
                                    <br/>
                                    <tr>
                                        <th style="text-align: center" colspan="2">বিল সংক্রান্ত তথ্য</th>
                                    </tr><tr>
                                        <td style="text-align: center">নাম </td>
                                        <td style="text-align: center">{{$billing_info->customer_name}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">ফোন নম্বর </td>
                                        <td style="text-align: center">{{$billing_info->customer_phone_number}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">ইমেইল</td>
                                        <td style="text-align: center">{{$billing_info->customer_email}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">ঠিকানা</td>
                                        <td style="text-align: center">{{$billing_info->customer_address}}</td>

                                    </tr>

                                </table>
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="text-align: center" colspan="2">হস্তান্তর তথ্য</th>
                                    </tr><tr>
                                        <td style="text-align: center">নাম </td>
                                        <td style="text-align: center">{{$shipping_info->ship_customer_name}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">ফোন নম্বর </td>
                                        <td style="text-align: center">{{$shipping_info->ship_customer_phone_number}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">ইমেইল</td>
                                        <td style="text-align: center">{{$shipping_info->ship_customer_email}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">দেশ</td>
                                        <td style="text-align: center">{{$country->country_name}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">বিভাগ</td>
                                        <td style="text-align: center">{{$division->division_name}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">ঠিকানা</td>
                                        <td style="text-align: center">{{$shipping_info->ship_customer_address}}</td>

                                    </tr>

                                </table>
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="text-align: center" colspan="2">পেমেন্ট তথ্য</th>
                                    </tr><tr>
                                        <td style="text-align: center">পেমেন্ট টাইপ </td>
                                        <td style="text-align: center">{{$payment->payment_type}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">পেমেন্ট স্টেটাস </td>
                                        <td style="text-align: center">{{$payment->payment_status}}</td>

                                    </tr>

                                </table>
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="text-align: center" colspan="2">পণ্যের তথ্য</th>
                                    </tr>
                                    @foreach($order_details as $order_detail)
                                        <tr>
                                            <td style="text-align: center">নাম </td>
                                            <td style="text-align: center">{{$order_detail->product_name}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">পরিমাণ </td>
                                            <td style="text-align: center">{{$order_detail->product_qty}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">মূল্য </td>
                                            <td style="text-align: center">{{$order_detail->product_price}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">মোট </td>
                                            <td style="text-align: center">{{$order_detail->product_price*$order_detail->product_qty}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="text-align: center"><hr/> </td>
                                        </tr>

                                    @endforeach

                                </table>
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="text-align: center" colspan="2">সর্বমোট পরিমাণ</th>
                                    </tr><tr>
                                        <th style="text-align: center"> <strong>মোট :</strong> (শিপিং চার্জ অন্তর্ভুক্ত) </th>
                                        <th style="text-align: center">{{$order->order_total}}</th>

                                    </tr>

                                </table>
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="text-align: center"><a style="text-decoration: none; color: white" href="{{URL::to('/download-invoice/'.$order->id)}}" class="btn btn-success btn-block">চালান ডাউনলোড করুন</a></th>
                                    </tr>

                                </table>
                            @elseif(Session::get('lang') == 'नहीं')
                                <strong>धन्यवाद....</strong>
                                <p>आप सफलतापूर्वक खरीदारी पूरी कर रहे हैं .. हम जल्द ही आपसे संपर्क करेंगे ..</p>
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="text-align: center" colspan="2">बीजक संख्या: {{$order->id}}</th>
                                    </tr>
                                    <br/>
                                    <tr>
                                        <th style="text-align: center" colspan="2">बिलिंग जानकारी</th>
                                    </tr><tr>
                                        <td style="text-align: center">नाम </td>
                                        <td style="text-align: center">{{$billing_info->customer_name}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">फ़ोन नंबर </td>
                                        <td style="text-align: center">{{$billing_info->customer_phone_number}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">ईमेल</td>
                                        <td style="text-align: center">{{$billing_info->customer_email}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">पता</td>
                                        <td style="text-align: center">{{$billing_info->customer_address}}</td>

                                    </tr>

                                </table>
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="text-align: center" colspan="2">शिपिंग सूचना</th>
                                    </tr><tr>
                                        <td style="text-align: center">नाम </td>
                                        <td style="text-align: center">{{$shipping_info->ship_customer_name}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">फ़ोन नंबर </td>
                                        <td style="text-align: center">{{$shipping_info->ship_customer_phone_number}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">ईमेल</td>
                                        <td style="text-align: center">{{$shipping_info->ship_customer_email}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">देश</td>
                                        <td style="text-align: center">{{$country->country_name}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">विभाजन</td>
                                        <td style="text-align: center">{{$division->division_name}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">पता</td>
                                        <td style="text-align: center">{{$shipping_info->ship_customer_address}}</td>

                                    </tr>

                                </table>
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="text-align: center" colspan="2">भुगतान की जानकारी</th>
                                    </tr><tr>
                                        <td style="text-align: center">भुगतान के प्रकार </td>
                                        <td style="text-align: center">{{$payment->payment_type}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">भुगतान की स्थिति </td>
                                        <td style="text-align: center">{{$payment->payment_status}}</td>

                                    </tr>

                                </table>
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="text-align: center" colspan="2">उत्पाद की जानकारी</th>
                                    </tr>
                                    @foreach($order_details as $order_detail)
                                        <tr>
                                            <td style="text-align: center">नाम </td>
                                            <td style="text-align: center">{{$order_detail->product_name}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">मात्रा </td>
                                            <td style="text-align: center">{{$order_detail->product_qty}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">मूल्य </td>
                                            <td style="text-align: center">{{$order_detail->product_price}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">संपूर्ण </td>
                                            <td style="text-align: center">{{$order_detail->product_price*$order_detail->product_qty}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="text-align: center"><hr/> </td>
                                        </tr>

                                    @endforeach

                                </table>
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="text-align: center" colspan="2">कुल रकम</th>
                                    </tr><tr>
                                        <th style="text-align: center"> <strong>संपूर्ण :</strong> (शिपिंग चार्ज शामिल करें) </th>
                                        <th style="text-align: center">{{$order->order_total}}</th>

                                    </tr>

                                </table>
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="text-align: center"><a style="text-decoration: none; color: white" href="{{URL::to('/download-invoice/'.$order->id)}}" class="btn btn-success btn-block">इनवाइस को डाउनलोड करो</a></th>
                                    </tr>

                                </table>
                            @else
                                <strong>Thanks....</strong>
                                <p>You are successfully complete shopping.. we will contact you soon..</p>
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="text-align: center" colspan="2">Invoice Number : {{$order->id}}</th>
                                    </tr>
                                    <br/>
                                    <tr>
                                        <th style="text-align: center" colspan="2">Billing Information</th>
                                    </tr><tr>
                                        <td style="text-align: center">Name </td>
                                        <td style="text-align: center">{{$billing_info->customer_name}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">Phone Number </td>
                                        <td style="text-align: center">{{$billing_info->customer_phone_number}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">Email</td>
                                        <td style="text-align: center">{{$billing_info->customer_email}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">Address</td>
                                        <td style="text-align: center">{{$billing_info->customer_address}}</td>

                                    </tr>

                                </table>
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="text-align: center" colspan="2">Shipping Information</th>
                                    </tr><tr>
                                        <td style="text-align: center">Name </td>
                                        <td style="text-align: center">{{$shipping_info->ship_customer_name}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">Phone Number </td>
                                        <td style="text-align: center">{{$shipping_info->ship_customer_phone_number}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">Email</td>
                                        <td style="text-align: center">{{$shipping_info->ship_customer_email}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">Country</td>
                                        <td style="text-align: center">{{$country->country_name}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">Division</td>
                                        <td style="text-align: center">{{$division->division_name}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">Address</td>
                                        <td style="text-align: center">{{$shipping_info->ship_customer_address}}</td>

                                    </tr>

                                </table>
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="text-align: center" colspan="2">Payment Information</th>
                                    </tr><tr>
                                        <td style="text-align: center">Payment Type </td>
                                        <td style="text-align: center">{{$payment->payment_type}}</td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: center">Payment Status </td>
                                        <td style="text-align: center">{{$payment->payment_status}}</td>

                                    </tr>

                                </table>
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="text-align: center" colspan="2">Product Information</th>
                                    </tr>
                                    @foreach($order_details as $order_detail)
                                        <tr>
                                            <td style="text-align: center">Name </td>
                                            <td style="text-align: center">{{$order_detail->product_name}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">Quantity </td>
                                            <td style="text-align: center">{{$order_detail->product_qty}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">Price </td>
                                            <td style="text-align: center">{{$order_detail->product_price}}</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">Total </td>
                                            <td style="text-align: center">{{$order_detail->product_price*$order_detail->product_qty}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="text-align: center"><hr/> </td>
                                        </tr>

                                    @endforeach

                                </table>
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="text-align: center" colspan="2">Total Amount</th>
                                    </tr><tr>
                                        <th style="text-align: center"> <strong>Total :</strong> (Include shipping charge) </th>
                                        <th style="text-align: center">{{$order->order_total}}</th>

                                    </tr>

                                </table>
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="text-align: center"><a style="text-decoration: none; color: white" href="{{URL::to('/download-invoice/'.$order->id)}}" class="btn btn-success btn-block">Download Invoice</a></th>
                                    </tr>

                                </table>
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

