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
                        @include('backEnd.pages.order-list.include.order_update_modal')
                    </div>
                </div><!-- Form Dialog code and example end -->
            </section>
            <?php if(Session::get('message')){ ?>

            <div style="text-align: center" class="alert alert-success"><b>{{Session::get('message')}}</b></div>
            <?php } ?>
            <?php if(Session::get('messageD')){ ?>

            <div style="text-align: center" class="alert alert-danger"><b>{{Session::get('messageD')}}</b></div>
            <?php } ?>

            @if(isset($delevery))
                {{Form::open(['url'=> '/search-back-develery-order', 'method' => 'post', 'class' => 'header_search_form clearfix' ])}}
            @else
                {{Form::open(['url'=> '/search-back-order-list', 'method' => 'post', 'class' => 'header_search_form clearfix' ])}}
            @endif

            <div>
                <div>
                    <div class="pull-right table-title-top-action">
                        <div class="pmd-textfield pull-left">
                            <input type="number" id="searchBox" list="browsers" name="searchBack" class="form-control" placeholder="Search by order ID...">
                        </div>

                        <button type="submit" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</button>
                    </div>
                {{Form::close()}}
                <!-- Title -->
                <h1 class="section-title" id="services">
                    @if(isset($delevery))
                    <span>Delivered List</span>
                    @else
                        <span>Order List</span>
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
                        <th style="text-align: center"><strong>Shipping ID</strong></th>
                        <th style="text-align: center"><strong>Order Total</strong></th>
                        <th style="text-align: center"><strong>Order Status</strong></th>
                        @if(Session::get('admin_role') == 2)
                        <th style="text-align: center"><strong>Approve Status</strong></th>
                        @endif
                        <th style="text-align: center"><strong>Action</strong></th>


                    </tr>
                    </thead>
                    <tbody id="category_table">

                    @foreach($orders as $order)
                        <tr>
                            @if(Session::get('admin_role') == 2)
                            <td  style="text-align: center" data-title="Total">{{$order->id}}</td>
                            @else
                                <td  style="text-align: center" data-title="Total">{{$order->order_id}}</td>
                            @endif
                            @foreach($customers as $customer)
                                @if($order->customer_id == $customer->id)
                            <td  style="text-align: center"data-title="Status"><span class="status-btn blue-bg">{{$customer->customer_name}}</span></td>
                                @break
                                @endif
                            @endforeach
                            <td  style="text-align: center" data-title="date">{{$order->shipping_id}}</td>
                            <td  style="text-align: center" data-title="date">${{$order->order_total}}</td>
                            <td  style="text-align: center" data-title="date">{{$order->order_status}}</td>
                            @if(Session::get('admin_role') == 2)
                            <td  style="text-align: center" data-title="date">{{$order->status == 1 ? 'Published' : 'Unpublished'}}</td>
                            @endif
                            @if(Session::get('admin_role') == 2)

                            <td style="text-align: center; width: auto "  class="pmd-table-row-action">
                                <a href="{{URL::to('/view-shopper-order/'.$order->id)}}"  class="btn btn-info">Shopper</a>
                                @if($order->order_status == 'Pending')
                                <a href="{{URL::to('/success-order/'.$order->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_up</i>
                                </a>
                                @else
                                    <a href="{{URL::to('/pending-order/'.$order->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                        <i class="material-icons md-dark pmd-sm">thumb_down</i>
                                    </a>
                                @endif
                                <a href="{{URL::to('/view-order-details/'.$order->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i  class="material-icons md-dark pmd-sm">search</i>
                                </a>


                                <button onclick="upadateOrder({{$order->id}})" data-target="#form-order-update" data-toggle="modal" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm" type="button"> <i class="material-icons md-dark pmd-sm">edit</i></button>
                                <a onclick="return confirm('Are You Sure !!!. \n You Want To Deleted This Order')" href="{{URL::to('/delete-order/'.$order->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">delete</i>
                                </a>
                            </td>
                            @else
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
                                    <a href="{{URL::to('/view-order-details/'.$order->order_id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                        <i  class="material-icons md-dark pmd-sm">search</i>
                                    </a>
                                        @if(Session::get('admin_role') == 2)
                                    <a onclick="return confirm('Are You Sure !!!. \n You Want To Deleted This Order')" href="{{URL::to('/delete-order/'.$order->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                        <i class="material-icons md-dark pmd-sm">delete</i>
                                    </a>
                                        @endif
                                 </td>
                                @endif


                        </tr>
                    @endforeach


                    {{--<button data-target="#form-dialog" data-toggle="modal" class="btn pmd-ripple-effect btn-primary pmd-z-depth pmd-ripple-effect " type="button">Add Main Categories</button>--}}

                    </tbody>
                </table>
            </div>
            <!-- Card Footer -->

        </div>
    </div>
        <br/>
        <br/>
        <br/>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

    <script>
        function upadateOrder(id) {
            $('#updateOrderId').val(id)
        }
    </script>
@endsection
