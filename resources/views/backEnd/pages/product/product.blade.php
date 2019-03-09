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
                        @include('backEnd.includes.product.product_modal')

                </div>
                </div><!-- Form Dialog code and example end -->
            </section>
            <?php if(Session::get('message')){ ?>

           <div style="text-align: center" class="alert alert-success"><b>{{Session::get('message')}}</b></div>
            <?php } ?>
            <?php if(Session::get('messageD')){ ?>

            <div style="text-align: center" class="alert alert-danger"><b>{{Session::get('messageD')}}</b></div>
            <?php } ?>
            {{Form::open(['url'=> '/search-back-product', 'method' => 'post', 'class' => 'header_search_form clearfix' ])}}
            <div>
                <div class="pull-right table-title-top-action">
                    <div class="pmd-textfield pull-left">
                        <input type="text" id="searchBox" list="browsers" name="searchBack" class="form-control" placeholder="Search for...">
                        <datalist id="browsers">

                        </datalist>

                    </div>

                    <button type="submit" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</button>
                </div>
                {{Form::close()}}

                <!-- Title -->
                <h1 class="section-title" id="services">
                    <span>Product Table</span>
                </h1><!-- End Title -->
                <!--breadcrum start-->
                <!--breadcrum end-->
            </div>


            <!-- Table -->
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th style="text-align: center"><strong>Product Image</strong></th>
                        <th style="text-align: center"><strong>Product Name</strong></th>
                        <th style="text-align: center"><strong>Product Qty</strong></th>
                        <th style="text-align: center"><strong>Produt Price</strong></th>
                        <th style="text-align: center"><strong>status</strong></th>
                        <th style="text-align: center"><strong>Action</strong></th>
                    </tr>
                    </thead>
                    <tbody id="product_table">
                    @foreach($products as $product)
                        <tr>
                            @foreach($product_images as $key => $product_image)
                            @if($product->id == $product_image->product_id)

                            <td  style="text-align: center" data-title="Total"><img style="height: 100px; width: 100px"  src="{{asset($product_image->small_image)}}" ></td>
                                @break
                            @endif

                            @endforeach
                            <td  style="text-align: center" data-title="Total">{{$product->product_name_eng}}</td>
                            <td  style="text-align: center"data-title="Status"><span class="status-btn blue-bg">{{$product->product_qty}}</span></td>
                            <td id="status"  style="text-align: center"data-title="Status"><span class="status-btn blue-bg">{{$product->product_price_eng}}</span></td>
                                <td  style="text-align: center"data-title="Status"><span class="status-btn blue-bg">{{$product->status == 1 ? 'publishe' : 'unpublished'}}</span></td>

                            <td style="text-align: center; width: auto" class="pmd-table-row-action">

                                @if(Session::get('admin_role') == 2)
                                <?php if ($product->status == 2) { ?>
                                <a href="{{URL::to('/publish-product/'.$product->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_up</i>
                                </a>
                                <?php }else{ ?>
                                <a href="{{URL::to('/unpublish-product/'.$product->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_down</i>
                                </a>
                                <?php } ?>

                                @endif

                                    <a href="{{URL::to('/view-product/'.$product->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                        <i  class="material-icons md-dark pmd-sm">search</i>
                                    </a>

                                <button  data-target="#form-dialog-update-product{{$product->id}}" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" type="button"> <i class="material-icons md-dark pmd-sm">edit</i></button>
                                <a onclick="return confirm('Are You Sure !!!. \n You Want To Deleted This Product')" href="{{URL::to('/delete-product-by-id/'.$product->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">delete</i>
                                </a>
                            </td>
                        </tr>
                        @include('backEnd.includes.product.product_modal_update')
                    @endforeach
                    {{--<button data-target="#form-dialog" data-toggle="modal" class="btn pmd-ripple-effect btn-primary pmd-z-depth pmd-ripple-effect " type="button">Add Main Categories</button>--}}
                    </tbody>
                </table>
            </div>
            <!-- Card Footer -->

        </div>
    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>


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
    <script>
        function updateProduct(id) {

            $.ajax({
                type:'get',
                url: '{!! route('/update-view-product') !!}',
                datatype: 'html',
                data:{'id':id},

                success:function (data) {
                    // alert(data)
                    $('#product_cat_up').val(data.main_category_id);
                    $('#product_sub_cat_up').val(data.sub_category_id);
                    $('#up_product_brand').val(data.product_brand);
                    if(data.top_sellers == 1){
                        $('#top_sellers_up').attr('checked', true)
                    }
                    if (data.special){
                        $('#special_up').attr('checked', true)
                        $('#special_up').attr('checked', true)
                    }
                    if(data.hot_product){
                        $('#hot_product_up').attr('checked', true)
                    }
                    if (data.top_rated){
                        $('#top_rated_up').attr('checked', true)
                    }
                    // alert(data.product_qty)
                    $('#product_qty_update').val(data.product_qty)
                    $('#ex_date_update').val(data.ex_date)
                    if(data.status == 1){
                        $('#product_status_publish').attr('checked', true)
                    }else {
                        $('#product_status_unpublish').attr('checked', true)
                        $('#product_status_unpublish').attr('checked', true)
                    }

                    $('#product_id').val(data.id)
                    $('#product_name_eng_up').val(data.product_name_eng)
                    $('#product_price_eng_up').val(data.product_price_eng)
                    $('#product_short_description_eng_up').val(data.product_short_description_eng)
                    $('#product_long_description_eng_up').val(data.prodcut_long_description_eng)
                    $('#product_color_eng_up').val(data.product_color_eng)
                    $('#shipping_outside_country_eng_up').val(data.shipping_outside_country_eng)
                    $('#shipping_inside_country_eng_up').val(data.shipping_inside_country_eng)
                    $('#shipping_inside_region_eng_up').val(data.shipping_inside_region_eng)
                    // bangla
                    $('#product_name_ban_up').val(data.product_name_ban)
                    $('#product_price_ban_up').val(data.product_price_ban)
                    $('#prodcut_short_description_ban_up').val(data.prodcut_short_description_ban)
                    $('#prodcut_long_description_ban_up').val(data.prodcut_long_description_ban)
                    $('#product_color_ban_up').val(data.product_color_ban)
                    $('#shipping_outside_country_ban_up').val(data.shipping_outside_country_ban)
                    $('#shipping_inside_country_ban_up').val(data.shipping_inside_country_ban)
                    $('#shipping_inside_region_ban_up').val(data.shipping_inside_region_ban)
                    //hindi
                    $('#product_name_hin_up').val(data.product_name_hin)
                    $('#product_price_hin_up').val(data.product_price_hin)
                    $('#product_short_description_hin_up').val(data.product_short_description_hin)
                    $('#product_long_description_hin_up').val(data.product_long_description_hin)
                    $('#product_color_hin_up').val(data.product_color_hin)
                    $('#shipping_outside_country_hin_up').val(data.shipping_outside_country_hin)
                    $('#shipping_inside_country_hin_up').val(data.shipping_inside_country_hin)
                    $('#shipping_inside_region_hin_up').val(data.shipping_inside_region_hin)


                }
            });
        }
    </script>


        <script>
        $(document).on('change','#product_cat', function () {
            var cat_id = $(this).val();
            var op= " ";

            $.ajax({
                type:'get',
                url: '{!! route('/manage-categories') !!}',
                datatype: 'html',
                data:{'id':cat_id},

                success:function (data) {
                    op +='<option  value="">--Select Sub Category--</option>';
                    for (var i=0; i<data.length; i++) {
                        op +='<option  value="'+data[i].id+'">'+data[i].sub_category_name+'</option>';
                    }
                    $('#product_sub_cat').html(op);

                }
            });

        });
    </script>
    <script>
        $(document).on('change','#product_cat_up', function () {
            var cat_id = $(this).val();
            var op= " ";

            $.ajax({
                type:'get',
                url: '{!! route('/manage-categories') !!}',
                datatype: 'html',
                data:{'id':cat_id},

                success:function (data) {
                    op +='<option  value="">--Select Sub Category--</option>';
                    for (var i=0; i<data.length; i++) {
                        op +='<option  value="'+data[i].id+'">'+data[i].sub_category_name+'</option>';
                    }
                    $('#product_sub_cat_up').html(op);

                }
            });

        });
    </script>


    <script>
   function updateuserAdmin(id){

       $.ajax({
           type: 'get',
           url: '{!! URL::to('/edite-user-by-id') !!}',
           datatype: 'html',
           data:{'id':id},
           success: function (data) {

               $('#user_name').val(data.user_name);
               $('#email').val(data.email);
               $('#phone').val(data.phone);
               $('#address').val(data.address);
               $('#division-user-up').val(data.division_id);
               $('#district-user-up').val(data.district_id);
               $('#sub_district-user-up').val(data.district_id);
               $('#user_id').val(id);


               if(data.admin_role == 1){
                   $('#admin_role_radio_one').attr('checked',true);


               }else {
                   $('#admin_role_radio_two').attr('checked',true);
               }


              if(data.status == 1){
                  $('#user-radio-up-one').attr('checked',true);


              }else {
                  $('#user-radio-up-two').attr('checked',true);
              }
           }

       });
   }



    </script>

    <script>
        $(document).ready(function () {
            $('#sizeBtn').click(function (e) {
                e.preventDefault();
                $('#size').append('<div id="sizeParentDiv" class="form-group">\n' +
                    '                                                    <div class="col-md-12">\n' +
                    '                                                        <div class="col-md-10">\n' +
                    '                                                            <input type="text" id="regular1" class="form-control" name="product_size[]">\n' +
                    '\n' +
                    '                                                        </div>\n' +
                    '                                                        <div class="col-md-2">\n' +
                    '                                                            <span id="sizeBtz" class="btn btn-danger">Remove</span>\n' +
                    '                                                        </div>\n' +
                    '                                                    </div>\n' +
                    '\n' +
                    '\n' +
                    '                                                </div>');
            });

            $(document).on('click', '#sizeBtz', function(e){
                e.preventDefault();
                $('#sizeParentDiv').remove(); //Remove field html

            });


        });
    </script>
    <script>
        $(document).ready(function () {
            $('#priceBtn').click(function (e) {
                e.preventDefault();
                $('#price').append('<div id="priceParentDiv" class="form-group">' +
                    '' +
                    '<div class="col-md-12">\n' +
                    '                                                        <div class="col-md-2">\n' +
                    '                                                            <input type="number" min="1" id="regular1" class="form-control" name="price_first_number[]">\n' +
                    '                                                        </div>\n' +
                    '                                                        <div class="col-md-2">\n' +
                    '                                                            <input type="number" min="2" id="regular1" class="form-control" name="price_last_number[]">\n' +
                    '                                                        </div>\n' +
                    '                                                        <div class="col-md-6">\n' +
                    '                                                            <input type="number" min="1" id="regular1" class="form-control" name="first_to_last_number_price[]">\n' +
                    '                                                        </div>\n' +
                    '\n' +
                    '                                                        <div class="col-md-2">\n' +
                    '                                                            <span id="priceBtz" class="btn btn-danger">Remove</span>\n' +
                    '                                                        </div>\n' +
                    '                                                    </div></div>');
            });

            $(document).on('click', '#priceBtz', function(e){
                e.preventDefault();
                $('#priceParentDiv').remove(); //Remove field html

            });


        });
    </script>





@endsection
