<div class="row">
    <div class="col-md-6 col-sm-6">
        <button data-target="#form-dialog-brand" data-toggle="modal" class="btn pmd-ripple-effect btn-primary pmd-z-depth pmd-ripple-effect " type="button">Add Brand</button>

        <div tabindex="-1" class="modal fade" id="form-dialog-brand" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Add Brand</h2>
                    </div>
                    <div class="modal-body">

                            {{Form::open(['url'=> 'save-brand', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label for="first-name">Brand Name</label>
                                <input name="brand_name" type="text" class="mat-input form-control"  value="">
                                @if ($errors->has('brand_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('brand_name') }}</strong>
                                    </span>
                                @endif
                                <label for="first-name">Brand Name Bangla</label>
                                <input name="brand_name_ban" type="text" class="mat-input form-control" value="">
                                @if ($errors->has('brand_name_ban'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('brand_name_ban') }}</strong>
                                    </span>
                                @endif
                                <label for="first-name">Brand Name Hindi</label>
                                <input name="brand_name_hin" type="text" class="mat-input form-control"  value="">
                                @if ($errors->has('brand_name_hin'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('brand_name_hin') }}</strong>
                                    </span>
                                @endif


                                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                    <label class="control-label">Brand Description</label>
                                    <textarea name="brand_description" required class="form-control"></textarea>

                                </div>
                                @if ($errors->has('brand_description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('brand_description') }}</strong>
                                    </span>
                                @endif


                                <div class="pmd-card-body">
                                    <!-- Inline radio -->
                                    <label class="radio-inline pmd-radio">
                                        <input type="radio" name="brand_status" id="inlineRadio1" value="1">
                                        <span for="inlineRadio1">Publish</span> </label>
                                    <label class="radio-inline pmd-radio">
                                        <input type="radio" name="brand_status" id="inlineRadio2" value="2" >
                                        <span for="inlineRadio2">Unpublish</span> </label>

                                </div>
                                <br/>
                                @if ($errors->has('brand_status'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('brand_status') }}</strong>
                                    </span>
                                @endif


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
