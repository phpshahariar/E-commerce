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
                    <h6>अपलोड की गई <i><a href="{{URL::to('/shopper-product/'.$shopper->id)}}">{{$shopper->user_name}}</a></i></h6>

                    <div class="product_text text-justify"><p>{{$product->prodcut_long_description_hin}}</p></div>
                    <div class="order_info d-flex flex-row">
                        {{Form::open(['url'=> '/add-to-cart-hin', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                        <div class="clearfix" style="z-index: 1000;">

                            <!-- Product Quantity -->
                            <div class="product_quantity clearfix">
                                <span style="color: black" >मात्रा : </span>
                                <input id="quantity_input" name="product_qty" type="text" pattern="[0-9]*" value="1" min="1">
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <div class="quantity_buttons">
                                    <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                    <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                                </div>
                            </div>

                            <!-- Product Color -->
                            @if($size_arry != null)
                                <select id="select_size" style="height: 48px; display: block; color: black" name="product_size" class="form-control product_color">
                                    <option >--माप चुनिये--</option>
                                    @foreach($sizes as $size)
                                        <option value="{{$size->product_size_name}}">{{$size->product_size_name}}</option>
                                    @endforeach

                                </select>
                            @endif



                        </div>

                        <div class="product_price">৳ {{$product->product_price_hin}}</div>
                        <div class="button_container">
                            <button type="submit" class="button cart_button">कार्ट में डालें</button>
                            <a href="{{URL::to('/cart')}}" class="btn btn-lg btn-success">ভিकार्ट देखें</a>

                        </div>

                        {{Form::close()}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
