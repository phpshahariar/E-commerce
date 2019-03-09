@extends('backEnd.pages.dashBoard')
@section('mainContent')
    <div class="pmd-content pmd-content-custom" id="content">

        <div class="container-fluid">
            <br/>
            <br/>
            <?php if(Session::get('message')){ ?>

            <div style="text-align: center" class="alert alert-success"><b>{{Session::get('message')}}</b></div>
            <?php } ?>
            <?php if(Session::get('messageD')){ ?>

            <div style="text-align: center" class="alert alert-danger"><b>{{Session::get('messageD')}}</b></div>
        <?php } ?>

            <!-- Title -->
            <h1 class="section-title" id="services">
                <span>Company Information</span>
            </h1><!-- End Title -->

            <!--breadcrum start-->
            <!--breadcrum end-->

            <!--component header -->
            <!--end component header-->

            <!-- Bootstrap Fields -->
            <section class="row component-section">
                <!-- Text fields title and description -->
                <!-- end Text fields title and description -->

                <!-- Text fields code, example -->
                <div class="col-md-12">
                    <div class="component-box">

                        <!-- Text fields example -->
                        <div class="row">
                            <div class="col-md-12">
                                {{Form::open(['url'=> 'save-info', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                                <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                    <div class="pmd-card-body " >
                                        <!-- Regular Input -->
                                        <div class="form-group">
                                            <label for="regular1" class="control-label">Name</label>
                                            <input type="text" required name="name" id="regular1" class="form-control" value="{{$info->name}}">
                                            <input type="hidden"  name="id" id="regular1" class="form-control" value="{{$info->id}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="regular1" class="control-label">Phone Number</label>
                                            <input type="number" required name="phone_number" id="regular1" class="form-control" value="{{$info->phone_number}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="regular1" class="control-label">Email</label>
                                            <input type="email" required name="email" id="regular1" class="form-control" value="{{$info->email}}">
                                        </div>
                                        <!-- Textarea -->
                                        <div class="form-group">
                                            <label class="control-label">Address</label>
                                            <textarea required name="address" class="form-control">{{$info->address}}</textarea>
                                        </div>
                                        <!-- Bootstrap Selectbox -->
                                        <div class="form-group">
                                            <label for="regular1" class="control-label">Facebook Link</label>
                                            <input type="text" required name="facebook_link" id="regular1" class="form-control" value="{{$info->facebook_link}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="regular1"  class="control-label">Twitter Link</label>
                                            <input type="text" required name="twitter_link" id="regular1" class="form-control" value="{{$info->twitter_link}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="regular1" class="control-label">Youtube Link</label>
                                            <input type="text" required name="youtube_link" id="regular1" class="form-control" value="{{$info->youtube_link}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="regular1" class="control-label">Google Pluse Link</label>
                                            <input type="text" required name="google_link"  id="regular1" class="form-control" value="{{$info->google_link}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Custom Description English</label>
                                            <textarea required name="custom_description_eng" class="form-control">{{$info->custom_description_eng}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Custom Description Bangla</label>
                                            <textarea required name="custom_description_ban" class="form-control">{{$info->custom_description_ban}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Custom Description Hindi</label>
                                            <textarea required name="custom_description_hin" class="form-control">{{$info->custom_description_hin}}</textarea>
                                        </div>
                                        <div class="pmd-modal-action">
                                            <button  class="btn pmd-ripple-effect btn-primary btn-block" type="submit">Update Information</button>

                                        </div>

                                    </div>
                                </div>
                                {{Form::close()}}

                            </div>
                        </div><!-- end Text fields example -->

                    </div>
                </div><!--end Text fields code, example -->
            </section><!-- Bootstrap Fields end -->

            <!-- Text Fields-->
             <!-- Toggle Switch end -->

        </div> <!--container end -->

    </div>
@endsection
