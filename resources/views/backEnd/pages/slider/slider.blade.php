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
                        @include('backEnd.includes.slider.slider_modal')
                        {{--@include('backEnd.includes.product.product_modal_update')--}}
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

                <!-- Title -->
                <h1 class="section-title" id="services">
                    <span>Slider Table</span>
                </h1><!-- End Title -->
                <!--breadcrum start-->
                <!--breadcrum end-->
            </div>


            <!-- Table -->
            <div class="table-responsive pmd-card pmd-z-depth">
                <table class="table table-mc-red pmd-table">
                    <thead>
                    <tr >
                        <th style="text-align: center"><strong>Slider Image</strong></th>
                        <th style="text-align: center"><strong>status</strong></th>
                        <th style="text-align: center"><strong>Action</strong></th>
                    </tr>
                    </thead>
                    <tbody id="product_table">
                    @foreach($slider_images as $key => $slider_image)
                        <tr @if($key <3) {{'style'.'='.'background-color:'.'#cccccc54'}} @endif >
                            <td  style="text-align: center" data-title="Total"><img style="height: 100px; width: 100px"  src="{{asset($slider_image->small_image)}}" ></td>
                                <td  style="text-align: center"data-title="Status"><span class="status-btn blue-bg">{{$slider_image->status == 1 ? 'publishe' : 'unpublished'}}</span></td>
                            <td style="text-align: center; width: auto" class="pmd-table-row-action">
                                <?php if ($slider_image->status == 2) { ?>
                                <a href="{{URL::to('/publish-slider/'.$slider_image->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_up</i>
                                </a>
                                <?php }else{ ?>
                                <a href="{{URL::to('/unpublish-slider/'.$slider_image->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
                                    <i class="material-icons md-dark pmd-sm">thumb_down</i>
                                </a>
                                <?php } ?>
                                <a onclick="return confirm('Are You Sure !!!. \n You Want To Deleted This Slider Image')" href="{{URL::to('/delete-slider/'.$slider_image->id)}}" class="btn pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-default btn-sm">
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

@endsection
