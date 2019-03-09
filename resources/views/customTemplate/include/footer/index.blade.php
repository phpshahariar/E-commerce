<footer class="footer">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 footer_col">
                <div class="footer_column footer_contact">
                    <div class="logo_container">
                        <div class="logo"><a href="{{URL::to('/')}}"><img src="{{asset($logo->logo_image)}}"/></a></div>
                    </div>
                    @if(Session::get('lang') == 'বাংলা')
                        <div class="footer_title">প্রশ্ন আছে? আমাদের কল করুন</div>
                    @elseif(Session::get('lang') == 'नहीं')
                        <div class="footer_title">सवाल हो गया? हमें कॉल करें</div>
                    @else
                        <div class="footer_title">Got Question? Call Us</div>
                    @endif

                    <div class="footer_phone">{{$info->phone_number}}</div>
                    <div class="footer_contact_text">
                        <p>{{$info->address}}</p>
                    </div>
                    <div class="footer_social">
                        <ul>
                            <li><a href="{{$info->facebook_link}}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{$info->twitter_link}}"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{$info->youtube_link}}"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="{{$info->google_link}}"><i class="fab fa-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>





            <div class="col-lg-3" >
                <div class="footer_column">
                    @if(Session::get('lang') == 'বাংলা')
                        <div class="footer_title">জনপ্রিয় ব্র্যান্ড</div>
                    @elseif(Session::get('lang') == 'नहीं')
                        <div class="footer_title">लोकप्रिय ब्रांड</div>
                    @else
                        <div class="footer_title">Popular Brands</div>
                    @endif
                    <ul class="footer_list">
                        @foreach($brands as $brand)
                        <li><a href="#">{{$brand->brand_name}}</a></li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="col-lg-3" style="margin-right: 0">
                <div class="footer_column">
                    @if(Session::get('lang') == 'বাংলা')
                        <div class="footer_title">জনপ্রিয় ক্যাটাগরি</div>
                    @elseif(Session::get('lang') == 'नहीं')
                        <div class="footer_title">लोकप्रिय श्रेणियाँ</div>
                    @else
                        <div class="footer_title">Popular Categories</div>
                    @endif

                    <ul class="footer_list">
                        @foreach($mainCategories as $main_category)
                        <li><a href="#">{{$main_category->category_name}}</a></li>
                        @endforeach

                    </ul>
                </div>
            </div>


        </div>
    </div>
</footer>
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                    <div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy; 2018 - <script> document.write(new Date().getFullYear());</script> All rights reserved |  <i class="fa fa-heart" aria-hidden="true"></i> by <a href="{{URL::to('/')}}" target="_blank">Nurr</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                    <div class="logos ml-sm-auto">
                        <ul class="logos_list">
                            <li><a href="#"><img src="{{asset('customTemplate/images')}}/logos_1.png" alt=""></a></li>
                            <li><a href="#"><img src="{{asset('customTemplate/images')}}/logos_2.png" alt=""></a></li>
                            <li><a href="#"><img src="{{asset('customTemplate/images')}}/logos_3.png" alt=""></a></li>
                            <li><a href="#"><img src="{{asset('customTemplate/images')}}/logos_4.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
