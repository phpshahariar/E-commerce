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

                    @include('backEnd.includes.customer.customer')

                        <!--Form dialog example -->
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
                {{Form::open(['url'=> '/search-customer', 'method' => 'post', 'class' => 'header_search_form clearfix' ])}}
                <div class="pull-right table-title-top-action">

                    <div class="pmd-textfield pull-left">
                        <input type="text" id="exampleInputAmount" name="searchBack" class="form-control" placeholder="Search for...">
                    </div>
                    <button type="submit" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</button>

                </div>
               {{Form::close()}}
                <!-- Title -->
                <h1 class="section-title" id="services">
                    <span>Customer List</span>
                </h1><!-- End Title -->
                <!--breadcrum start-->
                <!--breadcrum end-->
            </div>


            <!-- Table -->
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th style="text-align: center"><strong>Customer Name</strong></th>
                        <th style="text-align: center"><strong>Customer Phone Number</strong></th>
                        <th style="text-align: center"><strong>Customer Email</strong></th>
                        <th style="text-align: center"><strong>Customer Address</strong></th>
                        <th style="text-align: center"><strong>Action</strong></th>


                    </tr>
                    </thead>
                    <tbody id="category_table">
                    @foreach($customers as $customer)
                        <tr>
                            <td  style="text-align: center" data-title="Total">{{$customer->customer_name}}</td>
                            <td  style="text-align: center" data-title="Total">{{$customer->customer_phone_number}}</td>
                            <td  style="text-align: center" data-title="Total">{{$customer->customer_email}}</td>
                            <td  style="text-align: center" data-title="Total">{{$customer->customer_address}}</td>
                            <td style="text-align: center" class="pmd-table-row-action">
                                <button onclick="updateCustomer({{$customer->id}})" data-target="#form-dialog-customer-up" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" type="button"> <i class="material-icons md-dark pmd-sm">edit</i></button>
                                <a onclick="return confirm('Are You Sure !!!. \n You Want To Deleted This User')" href="{{URL::to('/delete-customer-by-id/'.$customer->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
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
        function updateCustomer(id){

            $.ajax({
                type: 'get',
                url: '{!! URL::to('/edite-customer-by-id') !!}',
                datatype: 'html',
                data:{'id':id},
                success: function (data) {
                    // alert(data)
                    $('#customer_name').val(data.customer_name);
                    $('#customer_id').val(id);
                    $('#customer_phone_number').val(data.customer_phone_number);
                    $('#customer_email').val(data.customer_email);
                    $('#customer_address').val(data.customer_address);
                    if(data.member_cart_id != null){
                        $('#customer_member_id').val(data.member_cart_id)
                    }else {
                        $('#customer_member_id').val(0)
                    }
                    //
                    // if(data.status == 1){
                    //     $('#country_radio_one').attr('checked',true);
                    //
                    //
                    // }else {
                    //     $('#country_radio_two').attr('checked',true);
                    // }
                }

            });
        }



    </script>

@endsection
