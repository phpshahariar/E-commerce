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
                        @include('backEnd.includes.division.division_modal')
                        @include('backEnd.includes.division.division_modal_update')
                </div>
                </div><!-- Form Dialog code and example end -->
            </section>
            <?php if(Session::get('message')){ ?>

           <div style="text-align: center" class="alert alert-success"><b>{{Session::get('message')}}</b></div>
            <?php } ?>
            <?php if(Session::get('messageD')){ ?>

            <div style="text-align: center" class="alert alert-danger"><b>{{Session::get('messageD')}}</b></div>
            <?php } ?>

            {{Form::open(['url'=> '/search-division', 'method' => 'post', 'class' => 'header_search_form clearfix' ])}}
            <div>
                <div class="pull-right table-title-top-action">
                    <div class="pmd-textfield pull-left">
                        <input type="text" id="exampleInputAmount" name="searchBack" class="form-control" placeholder="Search for...">
                    </div>
                    <button type="submit" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</button>
                </div>
                {{Form::close()}}
                <!-- Title -->
                <h1 class="section-title" id="services">
                    <span>Division Table</span>
                </h1><!-- End Title -->
                <!--breadcrum start-->
                <!--breadcrum end-->
            </div>


            <!-- Table -->
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th style="text-align: center"><strong>Division Name</strong></th>
                        <th style="text-align: center"><strong>Country Name</strong></th>
                        <th style="text-align: center"><strong>Status</strong></th>
                        <th style="text-align: center"><strong>Action</strong></th>


                    </tr>
                    </thead>
                    <tbody id="category_table">
                    @foreach($divisions as $division)
                        <tr>


                            <td  style="text-align: center" data-title="Total">{{$division->division_name}}</td>
                            @foreach($countries as $country)
                                @if($country->id == $division->country_id)
                            <td  style="text-align: center"data-title="Status"><span class="status-btn blue-bg">{{$country->country_name}}</span></td>
                                @endif
                            @endforeach
                            <?php if($division->status == 1){ ?>
                            <td  style="text-align: center" data-title="date">Published</td>
                            <?php }else{ ?>
                            <td  style="text-align: center" data-title="date">Unpublished</td>
                            <?php } ?>

                            <td style="text-align: center" class="pmd-table-row-action">
                                <?php if ($division->status == 2) { ?>
                                <a href="{{URL::to('/publish-division-by-id/'.$division->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_up</i>
                                </a>
                                <?php }else{ ?>
                                <a href="{{URL::to('/unpublish-division-by-id/'.$division->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_down</i>
                                </a>
                                <?php } ?>

                                <button onclick="updateDivision({{$division->id}})" data-target="#form-dialog-division-up" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" type="button"> <i class="material-icons md-dark pmd-sm">edit</i></button>
                                <a onclick="return confirm('Are You Sure !!!. \n You Want To Deleted This Division')" href="{{URL::to('/delete-division-by-id/'.$division->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
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
   function updateDivision(id){

       $.ajax({
           type: 'get',
           url: '{!! URL::to('/edite-division-by-id') !!}',
           datatype: 'html',
           data:{'id':id},
           success: function (data) {
              $('#div_name').val(data.division_name);
              $('#shippCharge').val(data.shipping_charge);
              $('#division_id').val(id);
              $('#country_id').val(data.country_id);

              if(data.status == 1){
                  $('#division_radio_one').attr('checked',true);


              }else {
                  $('#division_radio_two').attr('checked',true);
              }
           }

       });
   }



    </script>


@endsection
