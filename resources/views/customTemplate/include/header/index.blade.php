<header class="header">

    <!-- Top Bar -->

    <div class="top_bar" style="margin-bottom: -23px;">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-row">
                    <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('customTemplate/images')}}/location.png" alt=""></div>{{$location['city'].', '.$location['country']}}</div>
                    <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('customTemplate/images')}}/phone.png" alt=""></div><a href="mailto:fastsales@gmail.com">{{$info->phone_number}}</a></div>
                    <div class="top_bar_content ml-auto">
                        <div class="top_bar_menu">
                            <ul class="standard_dropdown top_bar_dropdown">
                                <li>
                                    <a href="#">{{Session::get('lang')}}<i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li><a href="{{URL::to('/english')}}">English</a></li>
                                        <li><a href="{{URL::to('/bangla')}}">বাংলা</a></li>
                                        <li><a href="{{URL::to('/hindi')}}">हिंदी</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">Track My Order<strong class="caret"></strong></a>
                                    <div class="dropdown-menu" style="padding: 15px; padding-bottom: 20px;">
                                        <form method="post" action="login" accept-charset="UTF-8" style="width: 220px">
                                            <input required id="trackEmail" style="margin-bottom: 15px;" class="form-control" type="Email" placeholder="Email" id="username" name="username">
                                            <input required id="trackNumber" style="margin-bottom: 15px;" class="form-control" type="number" placeholder="Invoice No." id="password" name="password">
                                            <input id="trackBtn" class="btn btn-primary btn-block" type="button" id="sign-in-google" value="Submit"><br/>
                                            <p id="trackStatus" style="text-align: center"></p>
                                        </form>
                                    </div>
                                </li>
                                <script>
                                    $('#trackBtn').click(function (e) {
                                        e.preventDefault()
                                        var email  = $('#trackEmail').val()
                                        var number = $('#trackNumber').val()
                                        if(email != '' && number != '' ){
                                            $.ajax({
                                                type: 'get',
                                                url: '{!! URL::to('/order-status-chack') !!}',
                                                datatype: 'html',
                                                data:{'email':email, 'number':number},
                                                success: function (data) {
                                                    $('#trackStatus').html(data)
                                                    // alert(data)
                                                }

                                            });
                                        }else {
                                            alert('Please Fillup Input Field Perfectly')
                                        }

                                    });
                                </script>
                            </ul>
                        </div>
                        @if(Session::get('lang') == 'বাংলা')
                        <div class="top_bar_user">
                            <div class="user_icon"><img src="{{asset('customTemplate/images')}}/user.svg" alt=""></div>
                            @if(Session::get('customer_id'))
                                <div><a href="#">{{Session::get('customer_name')}}</a></div>
                                <div><a href="{{URL::to('/customer-logout')}}">লগ আউট</a></div>
                            @else
                            <div><a href="{{URL::to('/register-customer')}}">রেজিস্টার</a></div>
                            <div><a href="{{URL::to('/register-customer')}}">সাইন ইন </a></div>
                            @endif
                        </div>
                        @elseif(Session::get('lang') == 'नहीं')
                            <div class="top_bar_user">
                                <div class="user_icon"><img src="{{asset('customTemplate/images')}}/user.svg" alt=""></div>
                                @if(Session::get('customer_id'))
                                    <div><a href="#">{{Session::get('customer_name')}}</a></div>
                                    <div><a href="{{URL::to('/customer-logout')}}">लोग आउट</a></div>
                                @else
                                    <div><a href="{{URL::to('/register-customer')}}">रजिस्टर</a></div>
                                    <div><a href="{{URL::to('/register-customer')}}">दाखिल करना</a></div>
                                @endif
                            </div>
                        @else
                            <div class="top_bar_user">
                                <div class="user_icon"><img src="{{asset('customTemplate/images')}}/user.svg" alt=""></div>
                                @if(Session::get('customer_id'))
                                    <div><a href="#">{{Session::get('customer_name')}}</a></div>
                                    <div><a href="{{URL::to('/customer-logout')}}">Logout</a></div>
                                @else
                                    <div><a href="{{URL::to('/register-customer')}}">Register</a></div>
                                    <div><a href="{{URL::to('/register-customer')}}">Sign in</a></div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Main -->

    <div class="header_main" style="margin-bottom: -22px;">
        <div class="container">
            <div class="row">

                <!-- Logo -->
                <div class="col-lg-2 col-sm-3 col-3 order-1">
                    <div class="logo_container">
                        <div class="logo"><a href="{{URL::to('/')}}"><img style="margin-bottom: 10px" src="{{asset($logo->logo_image)}}"></a></div>
                    </div>
                </div>

                <!-- Search -->
                <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                    <div class="header_search">
                        <div class="header_search_content">
                            <div class="header_search_form_container">
                                {{Form::open(['url'=> '/search', 'method' => 'post', 'class' => 'header_search_form clearfix' ])}}
                                {{--<form action="#" class="header_search_form clearfix">--}}
                                    <input type="search" id="searchBox" list="browsers" required="required" class="header_search_input" placeholder="Search for products...">
                                <datalist id="browsers">

                                </datalist>
                                <script>
                                    $('#searchBox').on('keyup', function () {
                                        var name = $(this).val();
                                        var op = ' ';

                                        $.ajax({
                                            type: 'get',
                                            url: '{!! URL::to('/search-suggestion') !!}',
                                            datatype: 'html',
                                            data:{'name':name},
                                            success: function (data) {
                                                // console.log(data);
                                                for (var i=0; i<data.length; i++) {
                                                        op +='<option value="'+data[i].product_name_eng+'">';
                                                }
                                                $('#browsers').html(op)
                                            }

                                        });
                                    });
                                </script>

                                    <div class="custom_dropdown" style="display: none">
                                        <div class="custom_dropdown_list">
                                            <span class="custom_dropdown_placeholder clc"></span>
                                            <i class="fas fa-chevron-down"></i>
                                            <ul class="custom_list clc">
                                                @foreach($mainCategories as $mainCategory)

                                                    @if(Session::get('lang') == 'বাংলা')
                                                        <a id="abtn" href="{{URL::to('/view-product-by-category/'.$mainCategory->id)}}"><li>{{$mainCategory->category_name_ban}}</li></a>
                                                    @elseif(Session::get('lang') == 'नहीं')
                                                        <a id="abtn" href="{{URL::to('/view-product-by-category/'.$mainCategory->id)}}"><li>{{$mainCategory->category_name_hin}}</li></a>
                                                    @else
                                                        <a id="abtn" href="{{URL::to('/view-product-by-category/'.$mainCategory->id)}}"><li>{{$mainCategory->category_name}}</li></a>
                                                    @endif
                                                @endforeach
                                            </ul>
                                            <script>
                                                $("#abtn").click(function() {
                                                    if ($("#target").hasClass("disabled")) {
                                                        $("#target").removeClass("disabled");
                                                    }
                                                })
                                            </script>
                                        </div>
                                    </div>
                                    <button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{asset('customTemplate/images')}}/search.png" alt=""></button>
                                {{--</form>--}}
                                {{Form::close()}}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Wishlist -->
                <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                    <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">


                        <!-- Cart -->

                            <a href="{{URL::to('/cart')}}">
                                <div class="cart">
                                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_icon">
                                        <img src="{{asset('customTemplate/images')}}/cart.png" alt="">
                                        <div class="cart_count"><span>{{Cart::getTotalQuantity()}}</span></div>
                                    </div>
                                    <div class="cart_content">
                                        <div class="cart_text">
                                            <a href="{{URL::to('/cart')}}">
                                                @if(Session::get('lang') == 'বাংলা')
                                                    কার্ট
                                                @elseif(Session::get('lang') == 'नहीं')
                                                    गाड़ी
                                                @else
                                                    Cart
                                                @endif
                                            </a>
                                        </div>
                                        <div class="cart_price">৳ {{Cart::getSubTotal()}}</div>
                                    </div>
                                </div>
                                </div>
                            </a>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->

    <nav class="main_nav" style="margin-bottom: -16px;">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="main_nav_content d-flex flex-row">

                        <!-- Categories Menu -->

                        <div class="cat_menu_container">
                            <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                                <div class="cat_burger"><span></span><span></span><span></span></div>
                                @if(Session::get('lang') == 'বাংলা')
                                    <div class="cat_menu_text">ক্যাটেগরীজ</div>
                                @elseif(Session::get('lang') == 'नहीं')
                                    <div class="cat_menu_text">श्रेणियाँ</div>
                                @else
                                    <div class="cat_menu_text">Categories</div>
                                @endif

                            </div>

                            <ul class="cat_menu">

                                @foreach($mainCategories as $mainCategory)
                                    @if(Session::get('lang') == 'বাংলা')
                                        <li class="hassubs">
                                            <a href="{{URL::to('/view-product-by-category/'.$mainCategory->id)}}">{{$mainCategory->category_name_ban}}<i class="fas fa-chevron-right"></i></a>
                                            <ul>
                                                @foreach($subCategoriesApp as $subCategory)
                                                    @if($subCategory->main_category_id == $mainCategory->id )
                                                        <li><a href="{{URL::to('/view-product-by-subCategory/'.$subCategory->id)}}">{{$subCategory->sub_category_name_ban}}<i class="fas fa-chevron-right"></i></a></li>
                                                    @endif
                                                @endforeach
                                                {{--<li><a href="{{URL::to('/view-product-by-subCategory/'.$subCategory->id)}}">{{$subCategory->sub_category_name}}<i class="fas fa-chevron-right"></i></a></li>--}}
                                            </ul>
                                        </li>
                                    @elseif(Session::get('lang') == 'नहीं')
                                        <li class="hassubs">
                                            <a href="{{URL::to('/view-product-by-category/'.$mainCategory->id)}}">{{$mainCategory->category_name_hin}}<i class="fas fa-chevron-right"></i></a>
                                            <ul>
                                                @foreach($subCategoriesApp as $subCategory)
                                                    @if($subCategory->main_category_id == $mainCategory->id )
                                                        <li><a href="{{URL::to('/view-product-by-subCategory/'.$subCategory->id)}}">{{$subCategory->sub_category_name_hin}}<i class="fas fa-chevron-right"></i></a></li>
                                                    @endif
                                                @endforeach
                                                {{--<li><a href="{{URL::to('/view-product-by-subCategory/'.$subCategory->id)}}">{{$subCategory->sub_category_name}}<i class="fas fa-chevron-right"></i></a></li>--}}
                                            </ul>
                                        </li>
                                    @else
                                        <li class="hassubs">
                                            <a href="{{URL::to('/view-product-by-category/'.$mainCategory->id)}}">{{$mainCategory->category_name}}<i class="fas fa-chevron-right"></i></a>
                                            <ul>
                                                @foreach($subCategoriesApp as $subCategory)
                                                    @if($subCategory->main_category_id == $mainCategory->id )
                                                        <li><a href="{{URL::to('/view-product-by-subCategory/'.$subCategory->id)}}">{{$subCategory->sub_category_name}}<i class="fas fa-chevron-right"></i></a></li>
                                                    @endif
                                                @endforeach
                                                {{--<li><a href="{{URL::to('/view-product-by-subCategory/'.$subCategory->id)}}">{{$subCategory->sub_category_name}}<i class="fas fa-chevron-right"></i></a></li>--}}
                                            </ul>
                                        </li>
                                    @endif

                                @endforeach
                                    <li class="hassubs">
                                        @if(Session::get('lang') == 'বাংলা')
                                            <a href="{{URL::to('/view-all-categories')}}">আরো দেখুন...</a>
                                        @elseif(Session::get('lang') == 'नहीं')
                                            <a href="{{URL::to('/view-all-categories')}}">और देखें...</a>
                                        @else
                                            <a href="{{URL::to('/view-all-categories')}}">See More...</a>
                                        @endif

                                    </li>

                            </ul>
                        </div>

                        <!-- Main Nav Menu -->

                        <div class="main_nav_menu ml-auto">
                            @if(Session::get('lang') == 'বাংলা')
                                <ul class="standard_dropdown main_nav_dropdown">
                                    <li><a href="{{URL::to('/')}}">হোম<i class="fas fa-chevron-down"></i></a></li>
                                    @foreach($dynamicpages as $dynamicpage)
                                        <li><a href="{{URL::to('/offer-page/'.$dynamicpage->id.'/'.$dynamicpage->page_name_ban)}}">{{$dynamicpage->page_name_ban}}<i class="fas fa-chevron-down"></i></a></li>
                                    @endforeach
                                    <li class="hassubs">
                                        <a href="#">বিক্রেতা<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="{{URL::to('/shopper-register')}}">রেজিস্ট্রেশন<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="{{URL::to('/shopper-login')}}">লগইন<i class="fas fa-chevron-down"></i></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            @elseif(Session::get('lang') == 'नहीं')
                                <ul class="standard_dropdown main_nav_dropdown">
                                    <li><a href="{{URL::to('/')}}">होम<i class="fas fa-chevron-down"></i></a></li>


                                    @foreach($dynamicpages as $dynamicpage)
                                        <li><a href="{{URL::to('/offer-page/'.$dynamicpage->id.'/'.$dynamicpage->page_name_hin)}}">{{$dynamicpage->page_name_hin}}<i class="fas fa-chevron-down"></i></a></li>
                                    @endforeach
                                    <li class="hassubs">
                                        <a href="#">विक्रेता<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="{{URL::to('/shopper-register')}}">रजिस्टर<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="{{URL::to('/shopper-login')}}">लॉग इन<i class="fas fa-chevron-down"></i></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            @else
                                <ul class="standard_dropdown main_nav_dropdown">
                                    <li><a href="{{URL::to('/')}}">Home<i class="fas fa-chevron-down"></i></a></li>


                                    @foreach($dynamicpages as $dynamicpage)
                                        <li><a href="{{URL::to('/offer-page/'.$dynamicpage->id.'/'.$dynamicpage->page_name_eng)}}">{{$dynamicpage->page_name_eng}}<i class="fas fa-chevron-down"></i></a></li>
                                    @endforeach
                                    <li class="hassubs">
                                        <a href="#">Shopper<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="{{URL::to('/shopper-register')}}">Register<i class="fas fa-chevron-down"></i></a></li>
                                            <li><a href="{{URL::to('/shopper-login')}}">Login<i class="fas fa-chevron-down"></i></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            @endif


                        </div>

                        <!-- Menu Trigger -->

                        <div class="menu_trigger_container ml-auto  menu_burger_inner">
                            <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                <div class="menu_burger">
                                    @if(Session::get('lang') == 'বাংলা')
                                        <div class="menu_trigger_text">মেনু</div>
                                    @elseif(Session::get('lang') == 'नहीं')
                                        <div class="menu_trigger_text">मेन्यू</div>
                                    @else
                                        <div class="menu_trigger_text">menu</div>
                                    @endif

                                    <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Menu -->

    <div class="page_menu">
        <div class="container" style="margin-top: 10px;">
            <div class="row">
                <div class="col">
                    <div class="page_menu_content">


                        <div class="page_menu_search">
                            {{Form::open(['url'=> '/search', 'method' => 'post'])}}
                            {{--<form action="#">--}}
                                <input type="search" id="searchBox" list="browsers" required="required" class="page_menu_search_input" placeholder="Search for products...">
                                {{--<input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">--}}
                                <button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{asset('customTemplate/images')}}/search.png" alt=""></button>
                            {{--</form>--}}
                            {{Form::close()}}
                        </div>
                        <ul class="page_menu_nav">
                            <li class="page_menu_item">
                                <a href="{{URL::to('/english')}}">English<i class="fa fa-angle-down"></i></a>
                            </li>
                            <li class="page_menu_item">
                                <a href="{{URL::to('/bangla')}}">বাংলা<i class="fa fa-angle-down"></i></a>
                            </li>
                            <li class="page_menu_item">
                                <a href="{{URL::to('/hindi')}}">हिंदी<i class="fa fa-angle-down"></i></a>
                            </li>
                            @if(Session::get('lang') == 'বাংলা')
                                <li class="page_menu_item">
                                    <a href="{{URL::to('/')}}">হোম<i class="fa fa-angle-down"></i></a>
                                </li>
                                @foreach($dynamicpages as $dynamicpage)
                                    <li class="page_menu_item"><a href="{{URL::to('/offer-page/'.$dynamicpage->id.'/'.$dynamicpage->page_name_ban)}}">{{$dynamicpage->page_name_ban}}<i class="fa fa-angle-down"></i></a></li>
                                @endforeach
                                <li class="page_menu_item"><a href="{{URL::to('/shopper-register')}}">বিক্রেতা নিবন্ধন<i class="fa fa-angle-down"></i></a></li>
                                <li class="page_menu_item"><a href="{{URL::to('/shopper-login')}}">সেলার লগ ইন<i class="fa fa-angle-down"></i></a></li>
                                {{--<li class="page_menu_item"><a href="contact.html">contact<i class="fa fa-angle-down"></i></a></li>--}}
                            @elseif(Session::get('lang') == 'नहीं')
                                <li class="page_menu_item">
                                    <a href="{{URL::to('/')}}">होम<i class="fa fa-angle-down"></i></a>
                                </li>
                                @foreach($dynamicpages as $dynamicpage)
                                    <li class="page_menu_item"><a href="{{URL::to('/offer-page/'.$dynamicpage->id.'/'.$dynamicpage->page_name_ban)}}">{{$dynamicpage->page_name_ban}}<i class="fa fa-angle-down"></i></a></li>
                                @endforeach
                                <li class="page_menu_item"><a href="{{URL::to('/shopper-register')}}">সविक्रेता रजिस्टर<i class="fa fa-angle-down"></i></a></li>
                                <li class="page_menu_item"><a href="{{URL::to('/shopper-login')}}">সविक्रेता लॉगिन<i class="fa fa-angle-down"></i></a></li>
                            @else
                                <li class="page_menu_item">
                                    <a href="{{URL::to('/')}}">Home<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li class="page_menu_item"><a href="{{URL::to('/shopper-register')}}">Shopper Register<i class="fa fa-angle-down"></i></a></li>
                                <li class="page_menu_item"><a href="{{URL::to('/shopper-login')}}">Shopper Login<i class="fa fa-angle-down"></i></a></li>
                            @endif

                        </ul>

                        <div class="menu_contact">
                            <div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{asset('customTemplate/images')}}/phone_white.png" alt=""></div>{{$info->phone_number}}</div>
                            <div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{asset('customTemplate/images')}}/mail_white.png" alt=""></div><a href="#">{{$info->email}}</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>




