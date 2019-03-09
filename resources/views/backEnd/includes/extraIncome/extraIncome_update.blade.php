<div class="row">
    <div class="col-md-6 col-sm-6">

        <div tabindex="-1" class="modal fade" id="form-extraIncome-up" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Update Extra Income</h2>
                    </div>
                    <div class="modal-body">

                        {{Form::open(['url'=> '/update-extraIncome', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                        <div class="component-box">

                            <!-- Text fields example -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <!-- Regular Input -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Extra Income Name</label>
                                                <input type="text" id="income_name" class="form-control" name="income_name">
                                                <input type="hidden" id="income_id" class="form-control" name="income_id">
                                            </div>
                                            @if ($errors->has('income_name'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('income_name') }}</strong>
                                    </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Extra Income Amount</label>
                                                <input type="number" id="income_amount" class="form-control" name="income_amount">
                                            </div>
                                            @if ($errors->has('income_amount'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('income_amount') }}</strong>
                                    </span>
                                            @endif
                                        <!-- Textarea -->

                                            <!-- Bootstrap Selectbox -->
                                            <div class="form-group">
                                                <label class="control-label">Extra Income Description</label>
                                                <textarea name="income_description" id="income_description" required class="form-control"></textarea>
                                            </div>
                                            @if ($errors->has('income_description'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('income_description') }}</strong>
                                    </span>
                                            @endif
                                            <div class="form-group">
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="status" id="extra_income_radio_one" value="1">
                                                    <span for="inlineRadio1">Publish</span> </label>
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="status" id="extra_income_radio_two" value="2" >
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
