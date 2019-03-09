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
                <div class="col-12">
                    <div class="col-12 offset-1" style="margin: 0 auto; ">
                        @if(Session::get('lang') == 'বাংলা')
                            <div class="contact_form_title">কার্ট পেজ</div>

                            <div class="component-box">

                                <!-- Text fields example -->
                                @foreach($cartContents as $cartContent)
                                    <hr/>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                                <div class="pmd-card-body">
                                                    <!-- Regular Input -->
                                                    <div class="form-group">
                                                        <img  src="{{asset($cartContent->attributes->image)}}">
                                                    </div>

                                                    <!-- Textarea -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4" >
                                            <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                                <div class="pmd-card-body">
                                                    <!-- Regular Input -->
                                                    <div class="form-group">
                                                        <h6 style="text-align: left">{{str_limit($cartContent->name)}}</h6>
                                                        <label>পরিমাণ</label>
                                                        <input onblur="updateCart({{$cartContent->id}},this.value)" id="product_qty"    style="height: 30px; margin-bottom: 10px; max-width: 100px; text-align: center" type="number" value="{{$cartContent->quantity}}"  class="form-control">
                                                        <h6 class="" style="text-align: left; color: #0d82d3">মূল্য : ৳ {{$cartContent->price}}</h6>
                                                        <h6 class="" style="text-align: left">মোট : ৳ {{$cartContent->quantity*$cartContent->price}}</h6>

                                                    </div>

                                                    <!-- Textarea -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 " style="margin: auto;">
                                            <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                                <div class="pmd-card-body">
                                                    <!-- Regular Input -->
                                                    <button  onclick="removeCart({{$cartContent->id}})" id="btn" class="btn pmd-ripple-effect btn-danger btn-block" type="submit">অপসারণ</button>


                                                    <!-- Textarea -->
                                                </div>
                                            </div>
                                        </div>


                                    </div><!-- end Text fields example -->

                                @endforeach

                            </div>
                            <hr/>
                            <div class="row" style="text-align: center; margin: auto">
                                <div class="col-5"><h4>সদস্য কার্ড</h4></div>
                                <div class="col-2"><h4>:</h4></div>
                                <div class="col-5"><h4><input type="number" id="membership_id" class="form-control"></h4></div>
                            </div>
                            <hr/>
                            <div class="row" style="text-align: center; margin: auto">
                                <div class="col-5"><h4>উপ-মোট</h4></div>
                                <div class="col-2"><h4>:</h4></div>
                                <div class="col-5" id="subTotal"><h4>৳ {{$subTotal}}</h4></div>
                            </div>
                            <hr/>
                            <div class="row" style="text-align: center; margin: auto">
                                <div class="col-5"><h4>সর্বমোট</h4></div>
                                <div class="col-2"><h4>:</h4></div>
                                <div class="col-5" ><h4>৳ <span id="subTotalwithDis">{{$subTotal}}</span></h4></div>
                            </div>
                            <hr/>
                            <div class="row" style="text-align: center; margin: auto">
                                <div class="col-5"><a href="{{URL::to('/')}}" class="btn btn-primary btn-block">কেনাকাটা চালিয়ে যান</a></div>
                                <div class="col-2"><h4></h4></div>
                                @if(Session::get('customer_id') && Session::get('billing_id') && Session::get('shipping_id'))
                                    <div class="col-5"><a href="{{URL::to('/payment')}}" class="btn btn-success btn-block">চেক আউট</a></div>
                                @elseif(Session::get('customer_id') && Session('billing_id'))
                                    <div class="col-5"><a href="{{URL::to('/shipping')}}" class="btn btn-success btn-block">চেক আউট</a></div>
                                @elseif(Session::get('customer_id'))
                                    <div class="col-5"><a href="{{URL::to('/billing')}}" class="btn btn-success btn-block">চেক আউট</a></div>
                                @else
                                    <div class="col-5"><a href="{{URL::to('/register-customer')}}" class="btn btn-success btn-block">চেক আউট</a></div>
                                @endif
                            </div>

                        @elseif(Session::get('lang') == 'नहीं')
                            <div class="contact_form_title">कार्ट पेज</div>

                            <div class="component-box">

                                <!-- Text fields example -->
                                @foreach($cartContents as $cartContent)
                                    <hr/>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                                <div class="pmd-card-body">
                                                    <!-- Regular Input -->
                                                    <div class="form-group">
                                                        <img  src="{{asset($cartContent->attributes->image)}}">
                                                    </div>

                                                    <!-- Textarea -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4" >
                                            <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                                <div class="pmd-card-body">
                                                    <!-- Regular Input -->
                                                    <div class="form-group">
                                                        <h6 style="text-align: left">{{str_limit($cartContent->name)}}</h6>
                                                        <label>मात्रा</label>
                                                        <input onblur="updateCart({{$cartContent->id}},this.value)" id="product_qty"    style="height: 30px; margin-bottom: 10px; max-width: 100px; text-align: center" type="number" value="{{$cartContent->quantity}}"  class="form-control">
                                                        <h6 class="" style="text-align: left; color: #0d82d3">मूल्य : ৳ {{$cartContent->price}}</h6>
                                                        <h6 class="" style="text-align: left">संपूर्ण : ৳ {{$cartContent->quantity*$cartContent->price}}</h6>

                                                    </div>

                                                    <!-- Textarea -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 " style="margin: auto;">
                                            <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                                <div class="pmd-card-body">
                                                    <!-- Regular Input -->
                                                    <button  onclick="removeCart({{$cartContent->id}})" id="btn" class="btn pmd-ripple-effect btn-danger btn-block" type="submit">हटाना</button>


                                                    <!-- Textarea -->
                                                </div>
                                            </div>
                                        </div>


                                    </div><!-- end Text fields example -->

                                @endforeach

                            </div>
                            <hr/>
                            <div class="row" style="text-align: center; margin: auto">
                                <div class="col-5"><h4>सदस्य कार्ड</h4></div>
                                <div class="col-2"><h4>:</h4></div>
                                <div class="col-5"><h4><input type="number" id="membership_id" class="form-control"></h4></div>
                            </div>
                            <hr/>
                            <div class="row" style="text-align: center; margin: auto">
                                <div class="col-5"><h4>उप कुल</h4></div>
                                <div class="col-2"><h4>:</h4></div>
                                <div class="col-5" id="subTotal"><h4>৳ {{$subTotal}}</h4></div>
                            </div>
                            <hr/>
                            <div class="row" style="text-align: center; margin: auto">
                                <div class="col-5"><h4>कुल योग</h4></div>
                                <div class="col-2"><h4>:</h4></div>
                                <div class="col-5" ><h4>৳ <span id="subTotalwithDis">{{$subTotal}}</span></h4></div>
                            </div>
                            <hr/>
                            <div class="row" style="text-align: center; margin: auto">
                                <div class="col-5"><a href="{{URL::to('/')}}" class="btn btn-primary btn-block">खरीदारी जारी रखें</a></div>
                                <div class="col-2"><h4></h4></div>
                                @if(Session::get('customer_id') && Session::get('billing_id') && Session::get('shipping_id'))
                                    <div class="col-5"><a href="{{URL::to('/payment')}}" class="btn btn-success btn-block">चेक आउट</a></div>
                                @elseif(Session::get('customer_id') && Session('billing_id'))
                                    <div class="col-5"><a href="{{URL::to('/shipping')}}" class="btn btn-success btn-block">चेक आउट</a></div>
                                @elseif(Session::get('customer_id'))
                                    <div class="col-5"><a href="{{URL::to('/billing')}}" class="btn btn-success btn-block">चेक आउट</a></div>
                                @else
                                    <div class="col-5"><a href="{{URL::to('/register-customer')}}" class="btn btn-success btn-block">चेक आउट</a></div>
                                @endif
                            </div>

                        @else
                            <div class="contact_form_title">Cart Page</div>

                            <div class="component-box">

                                <!-- Text fields example -->
                                @foreach($cartContents as $cartContent)
                                    <hr/>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                            <div class="pmd-card-body">
                                                <!-- Regular Input -->
                                                <div class="form-group">
                                                    <img  src="{{asset($cartContent->attributes->image)}}">
                                                </div>

                                            {{--<!-- Textarea -->--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4" >
                                        <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                            <div class="pmd-card-body">
                                                <!-- Regular Input -->
                                                <div class="form-group">
                                                    <h6 style="text-align: left">{{str_limit($cartContent->name)}}</h6>
                                                    <label>Quantity</label>
                                                    <input onblur="updateCart({{$cartContent->id}},this.value)" id="product_qty"    style="height: 30px; margin-bottom: 10px; max-width: 100px; text-align: center" type="number" value="{{$cartContent->quantity}}"  class="form-control">
                                                    <h6 class="" style="text-align: left; color: #0d82d3">Price : ৳ {{$cartContent->price}}</h6>
                                                    <h6 class="" style="text-align: left">Total : ৳ {{$cartContent->quantity*$cartContent->price}}</h6>

                                                </div>

                                                <!-- Textarea -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 " style="margin: auto;">
                                        <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                            <div class="pmd-card-body">
                                                <!-- Regular Input -->
                                                    <button  onclick="removeCart({{$cartContent->id}})" id="btn" class="btn pmd-ripple-effect btn-danger btn-block" type="submit">Remove</button>


                                                <!-- Textarea -->
                                            </div>
                                        </div>
                                    </div>


                                </div><!-- end Text fields example -->

                               @endforeach

                            </div>
                            <hr/>
                            <div class="row" style="text-align: center; margin: auto">
                                <div class="col-5"><h4>Member Card</h4></div>
                                <div class="col-2"><h4>:</h4></div>
                                <div class="col-5"><h4><input type="number" id="membership_id" class="form-control"></h4></div>
                            </div>
                            <hr/>
                            <div class="row" style="text-align: center; margin: auto">
                                <div class="col-5"><h4>Sub-Total</h4></div>
                                <div class="col-2"><h4>:</h4></div>
                                <div class="col-5" id="subTotal"><h4>৳ {{$subTotal}}</h4></div>
                            </div>
                            <hr/>
                            <div class="row" style="text-align: center; margin: auto">
                                <div class="col-5"><h4>Total</h4></div>
                                <div class="col-2"><h4>:</h4></div>
                                <div class="col-5" ><h4>৳ <span id="subTotalwithDis">{{$subTotal}}</span></h4></div>
                            </div>
                            <hr/>
                            <div class="row" style="text-align: center; margin: auto">
                                <div class="col-5"><a href="{{URL::to('/')}}" class="btn btn-primary btn-block">More.. Shopping</a></div>
                                <div class="col-2"><h4></h4></div>
                                @if(Session::get('customer_id') && Session::get('billing_id') && Session::get('shipping_id'))
                                    <div class="col-5"><a href="{{URL::to('/payment')}}" class="btn btn-success btn-block">Check Out</a></div>
                                @elseif(Session::get('customer_id') && Session('billing_id'))
                                    <div class="col-5"><a href="{{URL::to('/shipping')}}" class="btn btn-success btn-block">Check Out</a></div>
                                @elseif(Session::get('customer_id'))
                                    <div class="col-5"><a href="{{URL::to('/billing')}}" class="btn btn-success btn-block">Check Out</a></div>
                                @else
                                    <div class="col-5"><a href="{{URL::to('/register-customer')}}" class="btn btn-success btn-block">Check Out</a></div>
                                @endif
                            </div>

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

    <script>
        $('#membership_id').blur(function () {
            var id= ($(this).val())
            var disPrice = $('#subTotalwithDis').val()
            $.ajax({
                type:'get',
                url: '{!! route('/memberCart-discount') !!}',
                datatype: 'html',
                data:{'id':id},

                success:function (data) {
                    $('#subTotalwithDis').html(data);

                }
            });
        });
    </script>
    <script>
        function updateCart(id,qty) {
            // alert(id)

            $.ajax({
                type:'get',
                url: '{!! route('/update-cart-blur') !!}',
                datatype: 'html',
                data:{
                    'id':id,
                    'qty':qty
                },

                success:function (data) {
                    // /alert(data)
                    // console.log(data)
                    window.location.reload();
                }
            });
        }
    </script>
    <script>
        function removeCart(id) {
            $.ajax({
                type:'get',
                url: '{!! route('/remove-cart') !!}',
                datatype: 'html',
                data:{'id':id},

                success:function (data) {
                    window.location.reload();
                }
            });
        }
    </script>

    <script>

    </script>

@endsection

