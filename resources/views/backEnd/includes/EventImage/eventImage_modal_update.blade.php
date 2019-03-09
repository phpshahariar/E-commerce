<div class="row">
    <div class="col-md-6 col-sm-6">


        <div tabindex="-1" class="modal fade" id="form-dialog-country-up{{$eventImage->id}}" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Event Image Update</h2>
                    </div>
                    <div class="modal-body">

                        {{Form::open(['url'=> '/update-event-image', 'name' => 'editeSubCat', 'method' => 'post', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data' ])}}
                        <div class="component-box">

                            <!-- Text fields example -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <!-- Regular Input -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Event Image</label>
                                                <img width="100%" src="{{asset($eventImage->event_image)}}" />
                                                <input type="file"  class="form-control-file" name="event_image" accept="image/*">
                                                <input type="hidden" class="form-control" value="{{$eventImage->id}}" name="id">
                                            </div>
                                            @if ($errors->has('event_image'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('event_image') }}</strong>
                                    </span>
                                            @endif


                                        <!-- Textarea -->

                                            <!-- Bootstrap Selectbox -->
                                            <div class="form-group">
                                                <label class="radio-inline pmd-radio">
                                                    <input {{$eventImage->status == 1 ? 'Checked' : ' '}} type="radio" name="status"  value="1">
                                                    <span for="inlineRadio1">Publish</span> </label>
                                                <label class="radio-inline pmd-radio">
                                                    <input {{$eventImage->status == 0 ? 'Checked' : ' '}} type="radio" name="status"  value="0" >
                                                    <span for="inlineRadio2">Unpublish</span> </label>
                                            </div>
                                            @if ($errors->has('status'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('status') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div><!-- end Text fields example -->

                        </div>
                        <div class="pmd-modal-action">
                            <button  class="btn pmd-ripple-effect btn-primary" type="submit">Update</button>
                            <button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default" type="button">Discard</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div> <!--Form dialog example end -->

</div>
