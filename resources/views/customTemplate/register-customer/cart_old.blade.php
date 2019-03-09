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
                            <div class="cart_title">শপিং কার্ট</div>
                        @elseif(Session::get('lang') == 'नहीं')
                            <div class="cart_title">शॉपिंग कार्ट</div>
                        @else
                            <div class="cart_title">Shopping Cart</div>
                        @endif

                        <div class="cart_items">

                            <ul class="cart_list">

                                @foreach($cartContents as $cartContent)
                                    <div class="row" id="{{$cartContent->id}}">
                                        <li class="cart_item clearfix">
                                            <div class="col-1">
                                                <div class="cart_item_image"><img src="{{asset($cartContent->attributes->image)}}" alt=""></div>
                                            </div>
                                            <div class="col-11">
                                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                                    <div class="col-4">
                                                        <div class="cart_item_name cart_info_col">
                                                            <div class="cart_item_title">Name</div>
                                                            <div class="cart_item_text">{{str_limit($cartContent->name)}}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="cart_item_quantity cart_info_col">
                                                            <div class="cart_item_title">Quantity</div>
                                                                <input type="nubmer" onblur="updateCart({{$cartContent->id}},this.value)" id="product_qty" rel="{{$cartContent->id}}" class="form-control"  name="product_qty" value="{{$cartContent->quantity}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="cart_item_price cart_info_col">
                                                            <div class="cart_item_title">Price</div>
                                                            <div class="cart_item_text">৳ {{$cartContent->price}}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="cart_item_total cart_info_col">
                                                            <div class="cart_item_title">Total</div>
                                                            <div class="cart_item_text">৳ {{$cartContent->quantity*$cartContent->price}}</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="cart_item_total cart_info_col">
                                                            <div class="cart_item_title">Action</div>
                                                            <div class="cart_item_text"><button onclick="removeCart({{$cartContent->id}})" rel="{{$cartContent->id}}" class="btn btn-danger btn-sm">Remove</button></div>
                                                        </div>
                                                    </div>




                                                </div>
                                            </div>

                                        </li>
                                    </div>

                                @endforeach
                            </ul>
                        </div>
                        <!-- Order Total -->
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Order Total:</div>
                                <div class="order_total_amount" id="subTotal">৳ {{$subTotal}}</div>
                            </div>
                        </div>
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Member ID:</div>
                                <div class="order_total_amount" id="subTotal"><input id="membership_id" type="number" class="form-control"></div>
                            </div>
                        </div>
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Order Total with Discount:</div>
                                <div class="order_total_amount" id="subTotalwithDis">৳ {{$subTotal}}</div>
                            </div>
                        </div>

                        <div class="cart_buttons">
                            @if(Session::get('lang') == 'বাংলা')
                                <a href="{{URL::to('/')}}"><button type="button" class="button cart_button_clear">কেনাকাটা চালিয়ে যান</button></a>
                                @if(Session::get('customer_id') && Session::get('billing_id') && Session::get('shipping_id'))
                                    <a href="{{URL::to('/payment')}}"><button type="button" class="button cart_button_checkout">চেক আউট</button></a>
                                @elseif(Session::get('customer_id') && Session('billing_id'))
                                    <a href="{{URL::to('/shipping')}}"><button type="button" class="button cart_button_checkout">চেক আউট</button></a>
                                @elseif(Session::get('customer_id'))
                                    <a href="{{URL::to('/billing')}}"><button type="button" class="button cart_button_checkout">চেক আউট</button></a>
                                @else
                                    <a href="{{URL::to('/register-customer')}}"><button type="button" class="button cart_button_checkout">চেক আউট</button></a>
                                @endif
                            @elseif(Session::get('lang') == 'नहीं')
                                <a href="{{URL::to('/')}}"><button type="button" class="button cart_button_clear">खरीदारी जारी रखें</button></a>
                                @if(Session::get('customer_id') && Session::get('billing_id') && Session::get('shipping_id'))
                                    <a href="{{URL::to('/payment')}}"><button type="button" class="button cart_button_checkout">चेक आउट</button></a>
                                @elseif(Session::get('customer_id') && Session('billing_id'))
                                    <a href="{{URL::to('/shipping')}}"><button type="button" class="button cart_button_checkout">चेक आउट</button></a>
                                @elseif(Session::get('customer_id'))
                                    <a href="{{URL::to('/billing')}}"><button type="button" class="button cart_button_checkout">चेक आउट</button></a>
                                @else
                                    <a href="{{URL::to('/register-customer')}}"><button type="button" class="button cart_button_checkout">चेक आउट</button></a>
                                @endif
                            @else
                                <a href="{{URL::to('/')}}"><button type="button" class="button cart_button_clear">Continue Shopping</button></a>
                                @if(Session::get('customer_id') && Session::get('billing_id') && Session::get('shipping_id'))
                                    <a href="{{URL::to('/payment')}}"><button type="button" class="button cart_button_checkout">Check Out</button></a>
                                @elseif(Session::get('customer_id') && Session('billing_id'))
                                    <a href="{{URL::to('/shipping')}}"><button type="button" class="button cart_button_checkout">Check Out</button></a>
                                @elseif(Session::get('customer_id'))
                                    <a href="{{URL::to('/billing')}}"><button type="button" class="button cart_button_checkout">Check Out</button></a>
                                @else
                                    <a href="{{URL::to('/register-customer')}}"><button type="button" class="button cart_button_checkout">Check Out</button></a>
                                @endif
                            @endif

                        </div>
                    </div>



                </div>
            </div>
        </div>
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

    <script>
        function removeCart(id) {
            $.ajax({
                type:'get',
                url: '{!! route('/remove-cart') !!}',
                datatype: 'html',
                data:{'id':id},

                success:function (data) {
                   $('#'+id).hide();
                   $('#subTotal').html('');
                   $('#subTotal').html(data);
                }
            });
        }
    </script>
    <script>
        $('#membership_id').blur(function () {
          var id= ($(this).val())
            var disPrice = $('#subTotalwithDis').val()
            var f ='$'
            $.ajax({
                type:'get',
                url: '{!! route('/memberCart-discount') !!}',
                datatype: 'html',
                data:{'id':id},

                success:function (data) {
                    $('#subTotalwithDis').html(f+data);

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

@endsection
