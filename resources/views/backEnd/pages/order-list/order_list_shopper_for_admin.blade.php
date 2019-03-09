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
                        {{--@include('backEnd.includes.country.country_modal')--}}
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
                @if(isset($searchHide))


                @else
                    <div class="pull-right table-title-top-action">
                        @if(isset($delevery))
                            {{Form::open(['url'=> '/search-shopper-delevery-list', 'method' => 'post', 'class' => 'header_search_form clearfix' ])}}
                        @else
                            {{Form::open(['url'=> '/search-shopper-order-list', 'method' => 'post', 'class' => 'header_search_form clearfix' ])}}
                        @endif
                        <div class="pmd-textfield pull-left">
                            <input type="number" id="exampleInputAmount" name="searchBack" class="form-control" placeholder="Search by shopper ID...">
                        </div>
                        <button type="submit" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</button>
                        {{Form::close()}}
                    </div>
                @endif


                <!-- Title -->
                <h1 class="section-title" id="services">
                    @if(isset($delevery))
                        <span>Shopper Delevery List</span>
                    @else
                    <span>Shopper Order List</span>
                    @endif
                </h1><!-- End Title -->
                <!--breadcrum start-->
                <!--breadcrum end-->
            </div>


            <!-- Table -->
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr>
                        <th style="text-align: center"><strong>Order ID</strong></th>
                        <th style="text-align: center"><strong>Customer Name</strong></th>
                        <th style="text-align: center"><strong>Shopper ID</strong></th>
                        <th style="text-align: center"><strong>Order Total</strong></th>
                        <th style="text-align: center"><strong>Order Status</strong></th>
                        <th style="text-align: center"><strong>Action</strong></th>


                    </tr>
                    </thead>
                    <tbody id="category_table">

                    @foreach($orders as $order)
                        <tr>


                            <td  style="text-align: center" data-title="Total">{{$order->order_id}}</td>
                            @foreach($customers as $customer)
                                @if($order->customer_id == $customer->id)
                            <td  style="text-align: center"data-title="Status"><span class="status-btn blue-bg">{{$customer->customer_name}}</span></td>
                                @break
                                @endif
                            @endforeach
                            <td  style="text-align: center" data-title="date">{{$order->shopper_id}}</td>
                            <td  style="text-align: center" data-title="date">${{$order->order_total}}</td>
                            <td  style="text-align: center" data-title="date">{{$order->order_status}}</td>

                                  <td style="text-align: center; width: auto "  class="pmd-table-row-action">
                                    @if($order->order_status == 'Pending')
                                        <a href="{{URL::to('/success-order/'.$order->order_id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                            <i class="material-icons md-dark pmd-sm">thumb_up</i>
                                        </a>
                                    @else
                                        <a href="{{URL::to('/pending-order/'.$order->order_id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                            <i class="material-icons md-dark pmd-sm">thumb_down</i>
                                        </a>
                                    @endif
                                    <a href="{{URL::to('/view-order-details_shopper_for_admin/'.$order->order_id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                        <i  class="material-icons md-dark pmd-sm">search</i>
                                    </a>
                                        @if(Session::get('admin_role') == 2)
                                    <a onclick="return confirm('Are You Sure !!!. \n You Want To Deleted This Order')" href="{{URL::to('/delete-order/'.$order->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                        <i class="material-icons md-dark pmd-sm">delete</i>
                                    </a>
                                        @endif
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
        function upadateOrder(id) {
            $('#updateOrderId').val(id)
        }
    </script>
@endsection
