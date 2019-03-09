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
                        @include('backEnd.includes.categories.modal')
                        @include('backEnd.includes.categories.modal_update')
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
                {{--<div class="pull-right table-title-top-action">--}}
                    {{--<div class="pmd-textfield pull-left">--}}
                        {{--<input type="text" id="exampleInputAmount" class="form-control" placeholder="Search for...">--}}
                    {{--</div>--}}
                    {{--<a href="javascript:void(0);" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</a>--}}
                {{--</div>--}}
                <!-- Title -->
                <h1 class="section-title" id="services">
                    <span>Categories Table</span>
                </h1><!-- End Title -->
                <!--breadcrum start-->
                <!--breadcrum end-->
            </div>


            <!-- Table -->
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th style="text-align: center"><strong>Image</strong></th>
                        <th style="text-align: center"><strong>Category Name</strong></th>
                        <th style="text-align: center"><strong>Category Description</strong></th>
                        <th style="text-align: center"><strong>Status</strong></th>
                        <th style="text-align: center"><strong>Action</strong></th>


                    </tr>
                    </thead>
                    <tbody id="category_table">
                    @foreach($main_categories as $main_category)
                    <tr>
                        <td  style="text-align: center" data-title="Total"><img style="width: 200px" name="image" accept="" src="{{asset($main_category->image)}}"></td>
                        <td  style="text-align: center" data-title="Total">{{$main_category->category_name}}</td>
                        <td  style="text-align: center"data-title="Status"><span class="status-btn blue-bg">{{$main_category->category_description}}</span></td>
                        <?php if($main_category->status == 1){ ?>
                        <td  style="text-align: center" data-title="date">Published</td>
                        <?php }else{ ?>
                        <td  style="text-align: center" data-title="date">Unpublished</td>
                        <?php } ?>

                        <td style="text-align: center" class="pmd-table-row-action">
                            <?php if ($main_category->status == 2) { ?>
                                <a href="{{URL::to('/publish-category-by-id/'.$main_category->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_up</i>
                                </a>
                                <?php }else{ ?>
                            <a href="{{URL::to('/unpublish-category-by-id/'.$main_category->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                <i class="material-icons md-dark pmd-sm">thumb_down</i>
                            </a>
                                <?php } ?>

                                <button onclick="updateCategory({{$main_category->id}})" data-target="#form-dialog-up" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" type="button"> <i class="material-icons md-dark pmd-sm">edit</i></button>
                            <a onclick="return confirm('Are You Sure !!!. \n You Want To Deleted This Category')" href="{{URL::to('/delete-category-by-id/'.$main_category->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
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
   function updateCategory(id){
       $.ajax({
           type: 'get',
           url: '{!! URL::to('/edite-categories-by-id') !!}',
           datatype: 'html',
           data:{'id':id},
           success: function (data) {
              $('#cat_name').val(data.name);
              $('#cat_name_ban').val(data.name_ban);
              $('#cat_name_hin').val(data.name_hin);
              $('#cat_description').val(data.description);
              $('#cat_id').val(id);

              if(data.status == 1){
                  $('#cat_up_radio_one').attr('checked',true);


              }else {
                  $('#cat_up_radio_two').attr('checked',true);
              }
           }

       });
   }



    </script>


@endsection
