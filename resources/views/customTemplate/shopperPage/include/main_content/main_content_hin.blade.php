<div class="col-lg-12">

    <!-- Shop Content -->

    <div class="shop_content">
        <div class="shop_bar clearfix">

            <div class="shop_sorting">
                <span>Sort by:</span>
                <ul>
                    <li>
                        <span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
                        <ul>
                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
                            <li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div class="product_grid"  >
            <div class="product_grid_border"></div>

            <!-- Product Item -->

            @foreach($products as $product)
                <a href="{{URL::to('/product-view-by-id/'.$product->id)}}">
                    <div class="product_item is_new">
                        <div class="product_border"></div>
                        @foreach($images as $image)
                            @if($product->id == $image->product_id)
                                <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset($image->medium_image)}}" alt=""></div>
                                @break
                            @endif
                        @endforeach

                        <div class="product_content">
                            <div class="product_price">৳ {{$product->product_price_hin}}</div>
                            <div class="product_name"><div><a href="{{URL::to('/product-view-by-id/'.$product->id)}}" tabindex="0">{{str_limit($product->product_name_hin, 20)}}</a></div></div>

                        </div>
                        <div class="product_fav"><i class="fas fa-shopping-bag"></i></div>
                        <ul class="product_marks">
                            {{--<li class="product_mark product_discount">-25%</li>--}}
                            @if(isset($user))
                            @else
                                <li class="product_mark product_new" style="background-color: #df3b3b">-25%</li>
                            @endif

                        </ul>

                    </div>
                </a>

        @endforeach



        <!-- Product Item -->


        </div>

        <!-- Shop Page Navigation -->

        {{--<div class="shop_page_nav d-flex flex-row">--}}
        {{--<div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>--}}
        {{--<ul class="page_nav d-flex flex-row">--}}
        {{--<li><a href="#">1</a></li>--}}
        {{--<li><a href="#">2</a></li>--}}
        {{--<li><a href="#">3</a></li>--}}
        {{--<li><a href="#">...</a></li>--}}
        {{--<li><a href="#">21</a></li>--}}
        {{--</ul>--}}
        {{--<div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>--}}
        {{--</div>--}}

    </div>

</div>
