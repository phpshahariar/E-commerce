<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>Invoice</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="{{asset('assets/assets/')}}/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('assets/assets/')}}/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="{{asset('assets/assets/')}}/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
    {{--<link href="{{asset('assets/assets/')}}/font-awesome/css/font-awesome.css" rel="stylesheet" />--}}
    <link href="{{asset('assets/css/')}}/style.css" rel="stylesheet" />
    <link href="{{asset('assets/css/')}}/style-responsive.css" rel="stylesheet" />
    <link href="{{asset('assets/css/')}}/style-default.css" rel="stylesheet" id="style_color" />

</head>
<style>
    @media print {
        .nurr{
            float: right!important;
        }


    }
</style>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
<!-- BEGIN HEADER -->

<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
{{--<div id="container" class="row-fluid">--}}
<!-- BEGIN SIDEBAR -->

<!-- END SIDEBAR -->
<!-- BEGIN PAGE -->
{{--<div id="main-content">--}}
<!-- BEGIN PAGE CONTAINER-->
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->

    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <br/>
    <br/>
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN BLANK PAGE PORTLET-->
            <div class="widget purple">

                <div class="widget-body">
                    <div>

                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="text-center">
                                <img alt="" src="{{asset('assets/img/')}}/vector-lab.jpg">
                            </div>
                            <hr>

                        </div>
                    </div>

                    <div class="space20"></div>
                    <div class="space20"></div>
                    <div class="space20"></div>


                </div>
            </div>
            <!-- END BLANK PAGE PORTLET-->
        </div>
    </div>

    <div class="row-fluid">
        <div class="col-md-12">
            <div class="col-md-3">
                <div class="span3">
                    <div class="">
                        <div class="">


                            <h4>BILL TO :</h4>
                            <ul class="unstyled">
                                <li>{{$customerInfo->customer_name}}</li>
                                <li>{{$customerInfo->customer_phone_number}}</li>
                                <li>{{$customerInfo->customer_email}}</li>
                                <li style="text-align: justify">{{$customerInfo->customer_address}}</li>
                            </ul>

                        </div>


                    </div>


                </div>
            </div>


            <div class="col-md-3">
                <div class="span3">
                    <div class="">
                        <div class="">


                            <h4>SHIPP TO :</h4>
                            <ul class="unstyled">
                                <li>{{$shippingInfo->ship_customer_name}}</li>
                                <li>{{$shippingInfo->ship_customer_phone_number}}</li>
                                <li>{{$shippingInfo->ship_customer_email}}</li>
                                <li>{{$shippingInfo->ship_customer_address}}</li>
                                <li>{{$division->division_name.', '.$country->country_name}}</li>
                            </ul>

                        </div>


                    </div>



                </div>
            </div>
            <div class="col-md-3" style="text-align: center">
                <div class="span3">
                    <div class="">
                        <div class="">


                            <h4>INVOICE NO :</h4>
                            <h4>ORDER DATE :</h4>
                            <h4>INVOICE DATE :</h4>
                            <h4>CODE :</h4>


                        </div>


                    </div>


                </div>
            </div>
            <div class="col-md-3" style="float: right">
                <div class="span3">
                    <div class="">
                        <div class="">
                            <h4># {{$orderInfo->id}}</h4>
                            <h4>@php echo date('d-m-y',  strtotime($orderInfo->created_at)); @endphp</h4>
                            <h4>@php echo date('d-m-y'); @endphp</h4>
                            {{--<h4>{!! DNS1D::getBarcodeHTML($orderInfo->id, 'C128A', 1.2,20) !!}</h4>--}}

                        </div>


                    </div>


                </div>
            </div>
        </div>

    </div>
    <hr>
    <div class="row-fluid">
        <div class="row-fluid">
            <table class="table table-striped table-hover">
                <thead>
                <tr>

                    <th>Qty</th>
                    <th class="hidden-480">Product Name</th>
                    <th class="hidden-480">Unit Price</th>
                    <th class="hidden-480">Amount</th>

                </tr>
                </thead>
                <tbody>
                @php $totalAmount = 0; @endphp
                @foreach($orderDetails as $orderDetail)
                    <tr>

                        <td>{{$orderDetail->product_qty}}</td>
                        <td class="hidden-480">{{$orderDetail->product_name}}</td>
                        <td class="hidden-480">Tk. {{$orderDetail->product_price}} /=</td>
                        <td class="hidden-480">Tk. {{$sum = $orderDetail->product_qty*$orderDetail->product_price}} /=</td>

                    </tr>
                    @php $totalAmount = $totalAmount+$sum @endphp
                @endforeach

                </tbody>
            </table>
        </div>
        <div class="space20"></div>
        <div class="row-fluid">
            <div class="span4 invoice-block pull-right">
                <ul class="unstyled amounts">
                    <li><strong>-Total Amount(include Shipping) :  Tk. {{$orderInfo->order_total}} /=</strong></li>

                </ul>
            </div>
        </div>
        <div class="space20"></div>
        <div class="row-fluid text-center">

            {{--<a class="btn btn-inverse btn-large hidden-print" onclick="javascript:window.print();">Print <i class="icon-print icon-big"></i></a>--}}
        </div>
    </div>
</div>
<!-- END BLANK PAGE PORTLET-->
</div>
</div>
<!-- END PAGE CONTENT-->
</div>
</div>
<!-- END PAGE CONTENT-->
</div>
<!-- END PAGE CONTAINER-->
{{--</div>--}}
<!-- END PAGE -->
{{--</div>--}}
<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->

<!-- END FOOTER -->

<!-- BEGIN JAVASCRIPTS -->
<!-- Load javascripts at bottom, this will reduce page load time -->
<script src="{{asset('assets/js/')}}/jquery-1.8.3.min.js"></script>
<script src="{{asset('assets/js/')}}/jquery.nicescroll.js" type="text/javascript"></script>
<script src="{{asset('assets/assets/')}}/bootstrap/js/bootstrap.min.js"></script>

<!-- ie8 fixes -->
<!--[if lt IE 9]>
<script src="{{asset('assets/js/')}}/excanvas.js"></script>
<script src="{{asset('assets/js/')}}/respond.js"></script>
<![endif]-->

<!--common script for all pages-->
<script src="{{asset('assets/js/')}}/common-scripts.js"></script>

<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
