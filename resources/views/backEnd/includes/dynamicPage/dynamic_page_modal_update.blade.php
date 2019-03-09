<div class="row">
    <div class="col-md-6 col-sm-6">


        <div tabindex="-1" class="modal fade" id="form-dialog-country-up{{$dynamicpage->id}}" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Update Page</h2>
                    </div>
                    <div class="modal-body">

                        {{Form::open(['url'=> '/update-page', 'name' => 'editeSubCat', 'method' => 'post', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data' ])}}
                        <div class="component-box">

                            <!-- Text fields example -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <!-- Regular Input -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Page Name English</label>
                                                <input type="text"  value="{{$dynamicpage->page_name_eng}}" class="form-control" name="page_name_eng">
                                                <input type="hidden" value="{{$dynamicpage->id}}" class="form-control" name="id">
                                            </div>
                                            @if ($errors->has('page_name_eng'))
                                                <span class="invalid-feedback" role="alert">
                                           <strong style="color: red">{{ $errors->first('page_name_eng') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Page Name Bangla</label>
                                                <input type="text"  value="{{$dynamicpage->page_name_ban}}" class="form-control" name="page_name_ban">
                                            </div>
                                            @if ($errors->has('page_name_ban'))
                                                <span class="invalid-feedback" role="alert">
                                           <strong style="color: red">{{ $errors->first('page_name_ban') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Page Name Hindi</label>
                                                <input type="text"  value="{{$dynamicpage->page_name_eng}}" class="form-control" name="page_name_hin">
                                            </div>
                                            @if ($errors->has('page_name_hin'))
                                                <span class="invalid-feedback" role="alert">
                                           <strong style="color: red">{{ $errors->first('page_name_hin') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group">
                                                {{--<label for="regular1" class="control-label">Image</label>--}}
                                                <img id="image" src="{{ asset($dynamicpage->image)  }}" style="width: 100%">
                                                <input type="file" onchange="showImage(event)"  class="form-control" name="image">
                                            </div>
                                            @if ($errors->has('image'))
                                                <span class="invalid-feedback" role="alert">
                                           <strong style="color: red">{{ $errors->first('image') }}</strong>
                                                </span>
                                            @endif



                                            <div class="form-group">
                                                <label class="radio-inline pmd-radio">
                                                    <input  {{$dynamicpage->status == 1 ? 'Checked' : ' ' }} type="radio" name="status" id="country_radio_one" value="1">
                                                    <span for="inlineRadio1">Publish</span> </label>
                                                <label class="radio-inline pmd-radio">
                                                    <input {{$dynamicpage->status == 2 ? 'Checked' : ' ' }} type="radio" name="status" id="country_radio_two" value="2" >
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
