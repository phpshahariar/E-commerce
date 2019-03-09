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
                        {{--@include('backEnd.includes.register_user.register_user_modal')--}}

                </div>
                </div><!-- Form Dialog code and example end -->
            </section>
            <?php if(Session::get('message')){ ?>

           <div style="text-align: center" class="alert alert-success"><b>{{Session::get('message')}}</b></div>
            <?php } ?>
            <?php if(Session::get('messageD')){ ?>

            <div style="text-align: center" class="alert alert-danger"><b>{{Session::get('messageD')}}</b></div>
            <?php } ?>
            <h1 class="section-title" id="services">
                <span>{{$user_admin->user_name}} Accounts History</span>
            </h1>
            <div class="col-md-12">
                {{Form::open(['url'=> '/search-by-date-shopper-history', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                <div class="col-md-4">
                    <input type="date" required name="start_date" class="form-control">
                    <input type="hidden" value="{{$user_admin->id}}" name="user_id" class="form-control">
                </div>
                <div class="col-md-4">
                    <input type="date" required name="end_date" class="form-control">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-info btn-block">Search</button>
                </div>
                {{Form::close()}}
            </div>
            <br/>
            <br/>
            <div class="col-md-12">
                <div class="col-md-4 " style="">
                    <div class="pmd-card pmd-card-default pmd-z-depth">
                        <div class="pmd-card-title">
                            <h3>Shopper Payable</h3>
                        </div>
                        <div class="pmd-card-body">
                            <h2>{{$shopper_payable}}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 " style="">
                    <div class="pmd-card pmd-card-default pmd-z-depth">
                        <div class="pmd-card-title">
                            <h3>Admin Payment</h3>
                        </div>
                        <div class="pmd-card-body">
                            <h2>{{$admin_payment}}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 " style="">
                    <div class="pmd-card pmd-card-default pmd-z-depth">
                        <div class="pmd-card-title">
                            <h3>Admin Due</h3>
                        </div>
                        <div class="pmd-card-body">
                            <h2>{{$shopper_payable - $admin_payment}}</h2>
                        </div>
                    </div>
                </div>

            </div>
            <br/>
            <br/><br/>
            <br/><br/>
            <br/><br/>



            <div>
                <div class="pull-right table-title-top-action">

                    {{--<div class="pmd-textfield pull-left">--}}
                        {{--<input type="text" id="exampleInputAmount" class="form-control" placeholder="Search for...">--}}
                    {{--</div>--}}
                    {{--<a href="javascript:void(0);" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</a>--}}
                </div>
                <!-- Title -->
                <!-- End Title -->
                <!--breadcrum start-->
                <!--breadcrum end-->
            </div>


            <!-- Table -->
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th style="text-align: center"><strong>SL</strong></th>
                        <th style="text-align: center"><strong>Order ID</strong></th>
                        <th style="text-align: center"><strong>Order Amount</strong></th>

                        <th style="text-align: center"><strong>Admin Commission</strong></th>
                        <th style="text-align: center"><strong>Shopper Payable</strong></th>
                        <th style="text-align: center"><strong>Admin Payment status</strong></th>
                        <th style="text-align: center"><strong>Action</strong></th>


                    </tr>
                    </thead>
                    <tbody id="category_table">
                   @php $i=1; @endphp
                    @foreach($shopper_orders as $shopper_order)

                        <tr>


                            <td  style="text-align: center" data-title="Total">{{$i++}}</td>
                            <td  style="text-align: center" data-title="Total">{{$shopper_order->order_id}}</td>
                            <td  style="text-align: center" data-title="Total">{{$shopper_order->order_total}}</td>

                            <td  style="text-align: center" id="commission_rate_table" data-title="Total">{{($shopper_order->order_total*$user_admin->commission_rate)/100}}</td>
                            <td  style="text-align: center" data-title="Total">{{$shopper_payable = (($shopper_order->order_total)-(($shopper_order->order_total*$user_admin->commission_rate)/100))}}</td>
                            <td  style="text-align: center" data-title="Total">{{$shopper_order->admin_payment == 0 ? 'Unpaid': 'Paid'}}</td>

                            <td style="text-align: center" class="pmd-table-row-action">
                                <button  data-target="#form-dialog-user-up{{$shopper_order->id}}" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" type="button"> <i class="material-icons md-dark pmd-sm">edit</i></button>
                                {{--<a onclick="return confirm('Are You Sure !!!. \n You Want To Deleted This User')" href="{{URL::to('/delete-user-by-id/'.$shopper_order->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">--}}
                                    {{--<i class="material-icons md-dark pmd-sm">delete</i>--}}
                                {{--</a>--}}
                            </td>
                        </tr>
                        @include('backEnd.includes.shopper_history.shopper_history_modal_update')
                    @endforeach
                    {{--<button data-target="#form-dialog" data-toggle="modal" class="btn pmd-ripple-effect btn-primary pmd-z-depth pmd-ripple-effect " type="button">Add Main Categories</button>--}}

                    </tbody>
                </table>
            </div>
            <!-- Card Footer -->

        </div>
    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>





@endsection
