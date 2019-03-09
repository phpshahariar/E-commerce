<div class="viewed" style="margin-top: -72px">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="viewed_title_container">
                    <h3 class="viewed_title">New Product</h3>
                    <div class="viewed_nav_container">
                        <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>

                <div class="viewed_slider_container">

                    <!-- Recently Viewed Slider -->

                    <div class="owl-carousel owl-theme viewed_slider">
                        @if(Session::get('lang') == 'বাংলা')
                            @foreach($products as $product)
                                <!-- Recently Viewed Item -->

                                    <div class="owl-item">
                                        <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                            @foreach($images as $image)
                                                @if($product->id == $image->product_id)
                                                    <a href="{{URL::to('/product-view-by-id/'.$product->id)}}"><div class="viewed_image"><img src="{{asset($image->medium_image)}}" alt=""></div></a>
                                                    @break
                                                @endif
                                            @endforeach
                                            <div class="viewed_content text-center">
                                                <div class="viewed_price">৳ {{$product->product_price_ban}}</div>
                                                <div class="viewed_name"><a href="{{URL::to('/product-view-by-id/'.$product->id)}}">{{str_limit($product->product_name_ban, 15)}}</a></div>
                                            </div>

                                        </div>
                                    </div>


                                    <!-- Recently Viewed Item -->
                            @endforeach
                        @elseif(Session::get('lang') == 'नहीं')
                            @foreach($products as $product)
                            <!-- Recently Viewed Item -->

                                <div class="owl-item">
                                    <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        @foreach($images as $image)
                                            @if($product->id == $image->product_id)
                                                <a href="{{URL::to('/product-view-by-id/'.$product->id)}}"><div class="viewed_image"><img src="{{asset($image->medium_image)}}" alt=""></div></a>
                                                @break
                                            @endif
                                        @endforeach
                                        <div class="viewed_content text-center">
                                            <div class="viewed_price">৳ {{$product->product_price_hin}}</div>
                                            <div class="viewed_name"><a href="{{URL::to('/product-view-by-id/'.$product->id)}}">{{str_limit($product->product_name_hin, 15)}}</a></div>
                                        </div>

                                    </div>
                                </div>


                                <!-- Recently Viewed Item -->
                            @endforeach
                        @else
                            @foreach($products as $product)
                            <!-- Recently Viewed Item -->

                                <div class="owl-item">
                                    <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        @foreach($images as $image)
                                            @if($product->id == $image->product_id)
                                                <a href="{{URL::to('/product-view-by-id/'.$product->id)}}"><div class="viewed_image"><img src="{{asset($image->medium_image)}}" alt=""></div></a>
                                                @break
                                            @endif
                                        @endforeach
                                        <div class="viewed_content text-center">
                                            <div class="viewed_price">৳ {{$product->product_price_eng}}</div>
                                            <div class="viewed_name"><a href="{{URL::to('/product-view-by-id/'.$product->id)}}">{{str_limit($product->product_name_eng, 15)}}</a></div>
                                        </div>

                                    </div>
                                </div>


                                <!-- Recently Viewed Item -->
                            @endforeach
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
