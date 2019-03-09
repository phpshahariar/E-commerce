
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<div class="single_product">
    <div class="container">
        <div class="row">

            <!-- Images -->
            <div class="col-lg-2 order-lg-1 order-2">
                <ul class="image_list">
                    @foreach($product_images as $image)
                        <li data-image="{{asset($image->large_image)}}"><img src="{{asset($image->medium_image)}}" alt=""></li>
                    @endforeach

                </ul>
            </div>

            <!-- Selected Image -->
            <div class="col-lg-5 order-lg-2 order-1">
                <div class="image_selected"><img src="{{asset($image->large_image)}}" alt=""></div>
            </div>

            <!-- Description -->
            <div class="col-lg-5 order-3">
                <div class="product_description">
                    <div class="product_category">{{$mainCategory->category_name_hin}} / {{$subCategory->sub_category_name_hin}}<span style="float: right"> <strong>देखना : {{$product->view_total}}</strong></span> </div>
                    <div class="product_name">{{$product->product_name_hin}}</div>
                    <h4>डील कोड : {{$product->id}}</h4>
                    {{--<h6>Uploaded by <i><a href="{{URL::to('/shopper-product/'.$shopper->id)}}">{{$shopper->user_name}}</a></i></h6>--}}

                    <div class="product_text text-justify"><p>{{$product->product_short_description_hin}}</p></div>
                    <div class="order_info d-flex flex-row">
                        {{Form::open(['url'=> '/add-to-cart', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                        <div class="clearfix" style="z-index: 1000;">
                            <div class="row">
                                <div col-6>
                                    <div class="product_quantity clearfix">
                                        <span style="color: black" >मात्रा: </span>
                                        <input id="quantity_input" name="product_qty" type="text" pattern="[0-9]*" value="1" min="1" >
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <div class="quantity_buttons">
                                            <div id="quantity_inc_button"  onclick="indsdald()" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                            <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                                        </div>
                                    </div>

                                    <script>
                                        function indsdald() {
                                            var qt = $('#quantity_input').val();
                                            if (qt >= {{$product->product_qty - 1}}){
                                                // $('quantity_inc_button').removeClass('quantity_inc')
                                                $('#quantity_input').val({{$product->product_qty - 1}});
                                            }
                                        }
                                    </script>
                                </div>
                                <div col-6>
                                    @if($size_arry != null)
                                        <select id="select_size" style="height: 48px; margin-top: 0; display: block; color: black" name="product_size" class="form-control product_color">
                                            <option >--माप चुनिये--</option>
                                            @foreach($sizes as $size)
                                                <option value="{{$size->product_size_name}}">{{$size->product_size_name}}</option>
                                            @endforeach

                                        </select>
                                    @endif
                                </div>



                                <!-- Product Color -->

                            </div>
                            </div>

                            <!-- Product Quantity -->

                        <br/>

                        {{--<div class="product_price">৳ {{$product->product_price_eng}}</div>--}}
                        <div class="product_category"> <span style="font-size: 20px; font-weight: 600" >৳ {{$product->product_price_hin}} </span> <strong> | </strong> {{ $product->note_hin}} </div><br/>
                        <div class="row" style="margin: 0">
                            <div class="social-buttons">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}"
                                   target="_blank">
                                    <i style="color: #4867aa" class="fa fa-3x fa-facebook-official"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}"
                                   target="_blank">
                                    <i style="color: #1da1f2" class="fa fa-3x fa-twitter-square"></i>
                                </a>
                                <a href="https://plus.google.com/share?url={{ urlencode($url) }}"
                                   target="_blank">
                                    <i style="color: #dd5144" class="fa fa-3x fa-google-plus-square"></i>
                                </a>
                                {{--<a href="https://pinterest.com/pin/create/button/?{{ urlencode($url) }}" target="_blank">--}}
                                    {{--<i style="color: #bd081b" class="fa fa-3x fa-pinterest-square"></i>--}}
                                {{--</a>--}}
                            </div>
                        </div>
                        <br/>
                        <div class="logos ml-sm-auto">
                            <ul class="logos_list">
                                <li><a href="#"><img src="{{asset('customTemplate/images')}}/logos_1.png" alt=""></a></li>
                                <li><a href="#"><img src="{{asset('customTemplate/images')}}/logos_2.png" alt=""></a></li>
                                <li><a href="#"><img src="{{asset('customTemplate/images')}}/logos_3.png" alt=""></a></li>
                                <li><a href="#"><img src="{{asset('customTemplate/images')}}/logos_4.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="button_container">
                            <button type="submit" name="btn" value="addToCart" class="button cart_button " style="font-size: 10px">कार्ट में डालें</button>
                            <button type="submit" name="btn" value="orderNow" class="button cart_button " style="background-color: red; font-size: 10px">अब ऑर्डर दें</button>
                            <a href="{{URL::to('/cart')}}"  class="button cart_button" style="background-color: #0a8f08; font-size: 10px">कार्ट पेज </a>

                        </div>

                        {{Form::close()}}
                    </div>
                </div>
            </div>

        </div>
        <br/>
        <br/>
        <br/>
        <div class="row">
            <div class="col-lg-8 order-lg-2 order-1">
                <div class="card">
                    <div class="card-header"><h3>उत्पाद विवरण</h3></div>
                    <div class="card-body" style="text-align: justify">
                       {{$product->product_long_description_hin}}
                    </div>
                </div><br/>
                <div class="card">
                    {{--<div class="card-header"><h3>Condition</h3></div>--}}
                    <div class="card-body" style="text-align: justify; background-color: #f7f7f7">
                        {{$info->custom_description_hin}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-lg-2 order-1">
                <div class="card">
                    <div class="card-header"><h4 style="text-align: center">{{$shopper->user_name}}</h4></div>
                    <div class="card-body" style="background-image: linear-gradient(0deg,#fff 0%,#17a2b8);">
                        <div style="text-align: center">
                            <div class="row">
                                <div class="col-5"><strong>Shopper Point</strong></div>
                                <div class="col-2"><strong>:</strong></div>
                                <div class="col-5">{{$shopper->shopper_point}}*</div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-5"><strong>Total Sales</strong></div>
                                <div class="col-2"><strong>:</strong></div>
                                <div class="col-5">{{$sts}}*</div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-5"><strong>Address</strong></div>
                                <div class="col-2"><strong>:</strong></div>
                                <div class="col-5">{{$division->division_name}} , {{$country->country_name}}</div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-5"><strong>Shipping</strong></div>
                                <div class="col-2"><strong>:</strong></div>
                                <div class="col-5">{{$shopper->shipping_info}}</div>
                            </div>

                            <br/>
                            <div class="row">
                                <a class="btn btn-info btn-block" href="{{URL::to('/shopper-product/'.$shopper->id)}}">View Profile</a>
                            </div>
                        </div>

                    </div>

                </div><br/>

                <div class="card">
                    <div class="card-header"><h4>संबंधित उत्पाद</h4></div>
                    <div class="card-body">
                        @foreach($reletedProducts as $reletedProduct)
                            <div class="row">
                                <div class="col-7">
                                    <h4>{{$reletedProduct->product_name_hin}}</h4>
                                    <h4>৳ {{$reletedProduct->product_price_hin}}</h4>
                                    <a href="{{URL::to('/product-view-by-id/'.$reletedProduct->id)}}"><button class="btn btn-info">कार्ट में डालें</button></a>
                                </div>
                                @foreach($rp_image as $rpi)
                                    @if($reletedProduct->id == $rpi->product_id)
                                <div class="col-4"><img src="{{asset($rpi->small_image)}}"/></div>
                                        @break
                                    @endif
                                @endforeach

                            </div>
                            <br/>

                        @endforeach
                    </div>

                </div>
            </div>
        </div>



    </div>

</div>

<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script>

    var popupSize = {
        width: 780,
        height: 550
    };

    $(document).on('click', '.social-buttons > a', function(e){

        var
            verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
            horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

        var popup = window.open($(this).prop('href'), 'social',
            'width='+popupSize.width+',height='+popupSize.height+
            ',left='+verticalPos+',top='+horisontalPos+
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            e.preventDefault();
        }

    });
</script>

