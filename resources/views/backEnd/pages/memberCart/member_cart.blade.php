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
                        @include('backEnd.pages.memberCart.include.member_cart_modal')
                        @include('backEnd.pages.memberCart.include.member_cart_modal_update')
                    </div>
                </div><!-- Form Dialog code and example end -->
            </section>
            <?php if(Session::get('message')){ ?>

            <div style="text-align: center" class="alert alert-success"><b>{{Session::get('message')}}</b></div>
            <?php } ?>
            <?php if(Session::get('messageD')){ ?>

            <div style="text-align: center" class="alert alert-danger"><b>{{Session::get('messageD')}}</b></div>
            <?php } ?>

            <div>
                {{Form::open(['url'=> '/search-memberCart', 'method' => 'post', 'class' => 'header_search_form clearfix' ])}}
                <div class="pull-right table-title-top-action">
                    <div class="pmd-textfield pull-left">
                        <input type="text" name="searchBack" id="exampleInputAmount" class="form-control" placeholder="Search for...">
                    </div>
                    <button type="submit" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</button>
                </div>
                {{Form::close()}}
                <!-- Title -->
                <h1 class="section-title" id="services">
                    <span>Member Cart Table</span>
                </h1><!-- End Title -->
                <!--breadcrum start-->
                <!--breadcrum end-->
            </div>


            <!-- Table -->
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th style="text-align: center"><strong>Member Cart Name</strong></th>
                        <th style="text-align: center"><strong>Member Cart Number</strong></th>
                        <th style="text-align: center"><strong>Member Cart Discount</strong></th>
                        <th style="text-align: center"><strong>Status</strong></th>
                        <th style="text-align: center"><strong>Action</strong></th>


                    </tr>
                    </thead>
                    <tbody id="category_table">

                    @foreach($memberCarts as $memberCart)

                        <tr>


                            <td  style="text-align: center" data-title="Total">{{$memberCart->member_cart_name}}</td>
                            <td  style="text-align: center"data-title="Status"><span class="status-btn blue-bg">{{$memberCart->member_cart_number}}</span></td>
                            <td  style="text-align: center"data-title="Status"><span class="status-btn blue-bg">{{$memberCart->member_cart_discount}}</span></td>
                            <?php if($memberCart->status == 1){ ?>
                            <td  style="text-align: center" data-title="date">Published</td>
                            <?php }else{ ?>
                            <td  style="text-align: center" data-title="date">Unpublished</td>
                            <?php } ?>

                            <td style="text-align: center" class="pmd-table-row-action">
                                <?php if ($memberCart->status == 0) { ?>
                                <a href="{{URL::to('/publish-member-cart/'.$memberCart->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_up</i>
                                </a>
                                <?php }else{ ?>
                                <a href="{{URL::to('/unpublish-member-cart/'.$memberCart->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_down</i>
                                </a>
                                <?php } ?>



                                <button onclick="updateMemberCartId({{$memberCart->id}})" data-target="#member-cart-modal-update" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" type="button"> <i class="material-icons md-dark pmd-sm">edit</i></button>
                                <a onclick="return confirm('Are You Sure !!!. \n You Want To Deleted This Member Cart ')" href="{{URL::to('/delete-memberCart/'.$memberCart->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">delete</i>
                                </a>
                            </td>
                        </tr>
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
        function updateMemberCartId(id){

            $.ajax({
                type: 'get',
                url: '{!! URL::to('/edite-memberCart') !!}',
                datatype: 'html',
                data:{'id':id},
                success: function (data) {
                    // alert(data)

                    $('#member_cart_name').val(data.member_cart_name);
                    $('#member_cart_number').val(data.member_cart_number);
                    $('#member_cart_discount').val(data.member_cart_discount);
                    $('#member_cart_id').val(id);

                    if(data.status == 1){
                        $('#member_cart_radio_one').attr('checked',true);


                    }else {
                        $('#member_cart_radio_two').attr('checked',true);
                    }
                }

            });
        }



    </script>


@endsection
