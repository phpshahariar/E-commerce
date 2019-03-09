@if(Session::get('lang') == 'বাংলা')
    <div class="col-lg-3">

        <!-- Shop Sidebar -->
        <div class="shop_sidebar" >
            <div class="sidebar_section">
                <div class="sidebar_title">সাব ক্যাটেগরীজ</div>
                <ul class="sidebar_categories">
                    @foreach($sub_categories as $subCategory)
                        @if($subCategory->main_category_id == $category_name->id)
                            <li><a href="{{URL::to('/view-product-by-subCategory/'.$subCategory->id)}}">{{$subCategory->sub_category_name_ban}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <div class="sidebar_section">
                <div class="sidebar_subtitle brands_subtitle">ব্র্যান্ডস</div>
                <ul class="brands_list">
                    @foreach($brands as $brand)
                        <li class="brand"><a href="{{URL::to('/view-product-by-brand/'.$brand->id)}}">{{$brand->brand_name_ban}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
@elseif(Session::get('lang') == 'नहीं')
    <div class="col-lg-3">

        <!-- Shop Sidebar -->
        <div class="shop_sidebar" >
            <div class="sidebar_section">
                <div class="sidebar_title">उप श्रेणियों</div>
                <ul class="sidebar_categories">
                    @foreach($sub_categories as $subCategory)
                        @if($subCategory->main_category_id == $category_name->id)
                            <li><a href="{{URL::to('/view-product-by-subCategory/'.$subCategory->id)}}">{{$subCategory->sub_category_name_hin}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <div class="sidebar_section">
                <div class="sidebar_subtitle brands_subtitle">ब्रांडों</div>
                <ul class="brands_list">
                    @foreach($brands as $brand)
                        <li class="brand"><a href="{{URL::to('/view-product-by-brand/'.$brand->id)}}">{{$brand->brand_name_hin}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
@else
    <div class="col-lg-3">

        <!-- Shop Sidebar -->
        <div class="shop_sidebar" >
            <div class="sidebar_section">
                <div class="sidebar_title">Sub Categories</div>
                <ul class="sidebar_categories">
                    @foreach($sub_categories as $subCategory)
                        @if($subCategory->main_category_id == $category_name->id)
                            <li><a href="{{URL::to('/view-product-by-subCategory/'.$subCategory->id)}}">{{$subCategory->sub_category_name}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <div class="sidebar_section">
                <div class="sidebar_subtitle brands_subtitle">Brands</div>
                <ul class="brands_list">
                    @foreach($brands as $brand)
                        <li class="brand"><a href="{{URL::to('/view-product-by-brand/'.$brand->id)}}">{{$brand->brand_name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
@endif


