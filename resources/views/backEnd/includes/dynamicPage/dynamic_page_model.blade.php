<div class="row">
    <div class="col-md-6 col-sm-6">
        <button data-target="#form-dialog-sub" data-toggle="modal" class="btn pmd-ripple-effect btn-primary pmd-z-depth pmd-ripple-effect " type="button">Add New Page</button>

        <div tabindex="-1" class="modal fade" id="form-dialog-sub" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Add New Page</h2>
                    </div>
                    <div class="modal-body">

                            {{Form::open(['url'=> '/save-new-page', 'method' => 'post', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data' ])}}
                        <div class="component-box">

                            <!-- Text fields example -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <!-- Regular Input -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Page Name English</label>
                                                <input type="text" id="regular1" class="form-control" name="page_name_eng">
                                            </div>
                                            @if ($errors->has('country_name'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $errors->first('page_name_eng') }}</strong>
                                               </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Page Name Bangla</label>
                                                <input type="text" id="regular1" class="form-control" name="page_name_ban">
                                            </div>
                                            @if ($errors->has('page_name_ban'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $errors->first('page_name_ban') }}</strong>
                                               </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Page Name Hindi</label>
                                                <input type="text" id="regular1" class="form-control" name="page_name_hin">
                                            </div>
                                            @if ($errors->has('page_name_hin'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $errors->first('page_name_hin') }}</strong>
                                               </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Image</label>
                                                <input type="file" id="regular1" class="form-control" name="image">
                                            </div>
                                            @if ($errors->has('page_name_hin'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $errors->first('page_name_hin') }}</strong>
                                               </span>
                                            @endif

                                            <!-- Textarea -->

                                            <!-- Bootstrap Selectbox -->

                                            <div class="form-group">
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="status" id="inlineRadio1" value="1">
                                                    <span for="inlineRadio1">Publish</span> </label>
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="status" id="inlineRadio2" value="2" >
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
                                <button  class="btn pmd-ripple-effect btn-primary" type="submit">Save</button>
                                <button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default" type="button">Discard</button>
                            </div>
                       {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div> <!--Form dialog example end -->

</div>
