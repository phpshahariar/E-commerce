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
                        @include('backEnd.includes.country.country_modal')
                        @include('backEnd.includes.country.country_modal_update')
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

                <div class="pull-right table-title-top-action">
                    {{Form::open(['url'=> '/search-country', 'method' => 'post', 'class' => 'header_search_form clearfix' ])}}
                    <div class="pmd-textfield pull-left">
                        <input type="text" id="exampleInputAmount" name="searchBack" class="form-control" placeholder="Search for...">
                    </div>
                    <button type="submit" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</button>
                    {{Form::close()}}
                </div>

                <!-- Title -->
                <h1 class="section-title" id="services">
                    <span>Country Table</span>
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
                        <th style="text-align: center"><strong>Division Description</strong></th>
                        <th style="text-align: center"><strong>Status</strong></th>
                        <th style="text-align: center"><strong>Action</strong></th>


                    </tr>
                    </thead>
                    <tbody id="category_table">

                    @foreach($countries as $country)
                        <tr>


                            <td  style="text-align: center" data-title="Total">{{$country->country_name}}</td>
                            <td  style="text-align: center"data-title="Status"><span class="status-btn blue-bg">{{$country->country_description}}</span></td>
                            <?php if($country->status == 1){ ?>
                            <td  style="text-align: center" data-title="date">Published</td>
                            <?php }else{ ?>
                            <td  style="text-align: center" data-title="date">Unpublished</td>
                            <?php } ?>

                            <td style="text-align: center" class="pmd-table-row-action">
                                <?php if ($country->status == 2) { ?>
                                <a href="{{URL::to('/publish-country-by-id/'.$country->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_up</i>
                                </a>
                                <?php }else{ ?>
                                <a href="{{URL::to('/unpublish-country-by-id/'.$country->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_down</i>
                                </a>
                                <?php } ?>

                                <button onclick="updateCountry({{$country->id}})" data-target="#form-dialog-country-up" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" type="button"> <i class="material-icons md-dark pmd-sm">edit</i></button>
                                <a onclick="return confirm('Are You Sure !!!. \n You Want To Deleted This Country')" href="{{URL::to('/delete-country-by-id/'.$country->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
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
   function updateCountry(id){

       $.ajax({
           type: 'get',
           url: '{!! URL::to('/edite-country-by-id') !!}',
           datatype: 'html',
           data:{'id':id},
           success: function (data) {


              $('#country_name').val(data.country_name);
              $('#shipping_charge').val(data.shipping_charge);
              $('#country_id').val(id);
              $('#country_description').val(data.country_description);

              if(data.status == 1){
                  $('#country_radio_one').attr('checked',true);


              }else {
                  $('#country_radio_two').attr('checked',true);
              }
           }

       });
   }



    </script>


@endsection
