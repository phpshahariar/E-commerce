@extends('backEnd.pages.dashBoard')
@section('mainContent')





    <div id="content" class="pmd-content inner-page">
        <!--tab start-->
        <div class="container-fluid full-width-container value-added-detail-page">

            <section class="row component-section">

                <!-- Form Dialog title and description -->
                <!-- Form Dialog title and description end -->

                <!-- Form Dialog code and example -->
                <div class="col-md-9">
                    <div class="component-box">

                        <!--Form dialog example -->

                </div>
                </div><!-- Form Dialog code and example end -->
            </section>
            <div id="message" style="text-align: center" class="alert alert-success"></div>
            <?php if(Session::get('message')){ ?>

           <div style="text-align: center" class="alert alert-success">{{Session::get('message')}}</div>
            <?php } ?>
            <?php if(Session::get('messageD')){ ?>

            <div style="text-align: center" class="alert alert-danger"><b>{{Session::get('messageD')}}</b></div>
            <?php } ?>

            <div>
                <div class="pull-right table-title-top-action">

                </div>
                <!-- Title -->
                <h1 class="section-title" id="services">
                    <span>Product Details</span>
                </h1><!-- End Title -->
                <!--breadcrum start-->
                <!--breadcrum end-->
            </div>


            <!-- Table -->
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <tr>
                    @foreach($images as $key => $product_image)
                        <th id="{{$product_image->id}}">
                            <img style="height: 100px; width: 100px"  src="{{asset($product_image->medium_image)}}"><br>
                            <button  id="btnImage" onclick="deleteImage({{$product_image->id}})" class="btn btn-danger">Remove</button>
                        </th>
                    @endforeach
                </tr>

                <tr>
                   @php
                   if (isset($key)){

                   }else{

                   $key= 1;
                   }

                   @endphp
                    {{Form::open(['url'=> 'update-image', 'id' => 'uploadImage', 'method' => 'post', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data' ])}}
                        <th colspan="{{$key+1}}">
                            <input type="hidden" name="productId"  value="{{$product->id}}">
                           <input type="file" id="productImagefield" multiple  name="product_image[]" accept="image/*">
                           <input id="imageBtn" disabled style="float: right" type="submit" class="btn btn-success right" value="Add Image">
                        </th>
                    {{Form::close()}}

                </tr>
                </table>
                </table>
                <table class="table table-mc-red pmd-table">

                    <tr>
                        <th colspan="4"><h2><strong>Product Name</strong></h2></th>
                    </tr>
                    <tr>
                        <th style="text-align: center">{{$product->product_name_eng}}</th>
                        <th style="text-align: center">{{$product->product_name_ban}}</th>
                        <th style="text-align: center">{{$product->product_name_hin}}</th>
                        <th style="text-align: center">Other</th>



                    </tr>
                    <tr>
                        <th colspan="4"><h2><strong>Product Price</strong></h2></th>
                    </tr>
                    <tr>
                        {{--<th style="text-align: center">USD {{$product->product_price_eng}}</th>--}}
                        <th style="text-align: center">{{$product->product_price_eng}}</th>
                        <th style="text-align: center">{{$product->product_price_ban}}</th>
                        <th style="text-align: center">{{$product->product_price_hin}}</th>
                        <th style="text-align: center">Other</th>


                    </tr>
                    <tr>
                        <th colspan="4"><h2><strong>Product Qty</strong></h2></th>
                    </tr>
                    <tr>
                        <th  colspan="4" style="text-align: center">{{$product->product_qty}}</th>

                    </tr>
                    <tr>
                        <th colspan="4"><h2><strong>Product Status</strong></h2></th>
                    </tr>
                    <tr>
                        <th style="text-align: center">Top Sellers : {{$product->top_sellers == 1 ? 'Yes' : 'No'}}</th>
                        <th style="text-align: center">Feature : {{$product->special == 1 ? 'Yes' : 'No'}}</th>
                        <th style="text-align: center">Hot Product : {{$product->hot_product == 1 ? 'Yes' : 'No'}}</th>
                        <th style="text-align: center">Top Rated : {{$product->top_rated == 1 ? 'Yes' : 'No'}}</th>



                    </tr>

                    <tr>
                        <th colspan="4"><h2><strong>Category, Sub-Category & Brand Name</strong></h2></th>
                    </tr>
                    <tr>
                            @foreach($main_categories as $main_category)
                                @if($product->main_category_id == $main_category->id)
                            <th style="text-align: center">{{$main_category->category_name}}</th>
                                @break
                            @endif
                            @endforeach
                            @foreach($sub_categories as $sub_category)
                                @if($product->sub_category_id == $sub_category->id)
                                    <th style="text-align: center">{{$sub_category->sub_category_name}}</th>
                                        @break
                                @endif
                            @endforeach
                            @foreach($brands as $brand)
                                @if($product->product_brand == $brand->id)
                                    <th style="text-align: center">{{$brand->brand_name}}</th>
                                        @break
                                @endif
                            @endforeach
                                <th style="text-align: center">Publication Status: {{$product->status == 1 ? 'Published' : 'Unpublished'}}</th>


                    </tr>
                    <tr>
                        <th colspan="4"><h2><strong>Product Short Description (English)</strong></h2></th>
                    </tr>
                    <tr>
                        <th  colspan="4" style="text-align: justify">{{$product->product_short_description_eng}}</th>

                    </tr>
                    <tr>
                        <th colspan="4"><h2><strong>Product Short Description (Bangla)</strong></h2></th>
                    </tr>
                    <tr>
                        <th  colspan="4" style="text-align: center">{{$product->product_short_description_ban}}</th>

                    </tr>
                    <tr>
                        <th colspan="4"><h2><strong>Product Short Description (Hindi)</strong></h2></th>
                    </tr>
                    <tr>
                        <th  colspan="4" style="text-align: center">{{$product->product_short_description_hin}}</th>

                    </tr>
                    <tr>
                        <th colspan="4"><h2><strong>Product Long Description (English)</strong></h2></th>
                    </tr>
                    <tr>
                        <th  colspan="4" style="text-align: justify">{{$product->prodcut_long_description_eng}}</th>

                    </tr>
                    <tr>
                        <th colspan="4"><h2><strong>Product Long Description (Bangla)</strong></h2></th>
                    </tr>
                    <tr>
                        <th  colspan="4" style="text-align: center">{{$product->prodcut_long_description_ban}}</th>

                    </tr>
                    <tr>
                        <th colspan="4"><h2><strong>Product Long Description (Hindi)</strong></h2></th>
                    </tr>
                    <tr>
                        <th  colspan="4" style="text-align: center">{{$product->prodcut_long_description_hin}}</th>

                    </tr>
                    <tr>
                        <th colspan="4"><h2><strong>Product Color</strong></h2></th>
                    </tr>
                    <tr>
                        <th style="text-align: center">{{$product->product_color_eng}}</th>
                        <th style="text-align: center">{{$product->product_color_ban}}</th>
                        <th style="text-align: center">{{$product->product_color_hin}}</th>
                        <th style="text-align: center">Other</th>


                    </tr>
                    <tr>
                        <th colspan="4"><h2><strong>Product Size</strong></h2></th>
                    </tr>
                    <tr>
                        <th colspan="4" style="text-align: center">
                            @foreach($size as $size)
                                @if($size->product_id == $product->id)
                              {{$size->product_size_name }},
                                @endif
                            @endforeach

                        </th>



                    </tr>


                    <tr>
                        <th colspan="4"><h2><strong>Seller Name</strong></h2></th>
                    </tr>
                    <tr>
                        <th  colspan="4" style="text-align: center">{{$adminInfo->user_name}}</th>

                    </tr>
                    <tr>
                        <th colspan="4"><h2><strong>Seller Address</strong></h2></th>
                    </tr>
                    <tr>
                        <th colspan="4" style="text-align: center">
                    {{$adminInfo->address}}, {{$adminInfo->sub_district_name}}, {{$adminInfo->district_name}}, {{$adminInfo->division_name}}, {{$adminInfo->country_name}}.
                        </th>



                    </tr>

                </table>
            </div>
            <!-- Card Footer -->

        </div>
    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

    <script>
       function deleteImage(id) {
           confirm('Are you sure?? you want to delete this image')
           $.ajax({
               type:'get',
               url: '{!! route('/delete-image') !!}',
               datatype: 'html',
               data:{'id':id},

               success:function (data) {
                   $('#'+id).hide();
                   window.location.reload();
                   $('#message').html('Image Deleted Successfully !!!');

               }
           });
       }
    </script>

    <script>
        $(document).ready(function () {
           $('#productImagefield').change(function () {
               $('#imageBtn').removeAttr('disabled');
           });
        })
    </script>



@endsection
