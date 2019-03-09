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
                        @include('backEnd.includes.district.district_modal')
                        @include('backEnd.includes.district.ditrict_modal_update')
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
                    <div class="pmd-textfield pull-left">
                        <input type="text" id="exampleInputAmount" class="form-control" placeholder="Search for...">
                    </div>
                    <a href="javascript:void(0);" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</a>
                </div>
                <!-- Title -->
                <h1 class="section-title" id="services">
                    <span>District Table</span>
                </h1><!-- End Title -->
                <!--breadcrum start-->
                <!--breadcrum end-->
            </div>


            <!-- Table -->
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th style="text-align: center"><strong>District Name</strong></th>
                        <th style="text-align: center"><strong>Country Name</strong></th>
                        <th style="text-align: center"><strong>Division name</strong></th>
                        <th style="text-align: center"><strong>Status</strong></th>
                        <th style="text-align: center"><strong>Action</strong></th>


                    </tr>
                    </thead>
                    <tbody id="category_table">
                    @foreach($districts as $district)
                        <tr>


                            <td  style="text-align: center" data-title="Total">{{$district->district_name}}</td>
                            @foreach($countries as $country)
                                <?php if($country->id == $district->country_id) {?>
                                <td  style="text-align: center"data-title="Status"><span class="status-btn blue-bg">{{$country->country_name}}</span></td>

                                <?php } ?>

                            @endforeach


                        @foreach($divisions as $division)
                                <?php if($division->id == $district->division_id) {?>
                                <td  style="text-align: center"data-title="Status"><span class="status-btn blue-bg">{{$division->division_name}}</span></td>

                                <?php } ?>

                            @endforeach


                            <?php if($district->status == 1){ ?>
                            <td  style="text-align: center" data-title="date">Published</td>
                            <?php }else{ ?>
                            <td  style="text-align: center" data-title="date">Unpublished</td>
                            <?php } ?>

                            <td style="text-align: center" class="pmd-table-row-action">
                                <?php if ($district->status == 2) { ?>
                                <a href="{{URL::to('/publish-district-by-id/'.$district->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_up</i>
                                </a>
                                <?php }else{ ?>
                                <a href="{{URL::to('/unpublish-district-by-id/'.$district->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_down</i>
                                </a>
                                <?php } ?>

                                <button onclick="updateDistrict({{$district->id}})" data-target="#form-dialog-district-up" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" type="button"> <i class="material-icons md-dark pmd-sm">edit</i></button>
                                <a onclick="return confirm('Are You Sure !!!. \n You Want To Deleted This District')" href="{{URL::to('/delete-district-by-id/'.$district->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
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
        $(document).on('change','#country_id_up', function () {
            var country_id = $(this).val();

            var op= " ";

            $.ajax({
                type:'get',
                url: '{!! route('/manage-division') !!}',
                data:{'id':country_id},
                success:function (data) {

                    for (var i=0; i<data.length; i++) {
                        op +='<option  value="'+data[i].id+'">'+data[i].division_name+'</option>';
                    }
                    $('#division_id_up').html(op);

                }
            });

        });
    </script>

    <script>
        $(document).on('change','#country', function () {
            var country_id = $(this).val();

            var op= " ";

            $.ajax({
                type:'get',
                url: '{!! route('/manage-division') !!}',
                data:{'id':country_id},
                success:function (data) {

                    for (var i=0; i<data.length; i++) {
                        op +='<option  value="'+data[i].id+'">'+data[i].division_name+'</option>';
                    }
                    $('#division').html(op);

                }
            });

        });
    </script>

    <script>
   function updateDistrict(id){

       $.ajax({
           type: 'get',
           url: '{!! URL::to('/edite-district-by-id') !!}',
           datatype: 'html',
           data:{'id':id},
           success: function (data) {


              $('#district_name').val(data.district_name);
              $('#district_id').val(id);
              $('#division_id_up').val(data.division_id);
              $('#country_id_up').val(data.country_id);

              if(data.status == 1){
                  $('#district_radio_one').attr('checked',true);


              }else {
                  $('#district_radio_two').attr('checked',true);
              }
           }

       });
   }



    </script>


@endsection
