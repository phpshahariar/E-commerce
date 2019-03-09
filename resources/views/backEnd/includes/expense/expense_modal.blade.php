<div class="row">
    <div class="col-md-6 col-sm-6">
        <button data-target="#form-dialog-sub" data-toggle="modal" class="btn pmd-ripple-effect btn-primary pmd-z-depth pmd-ripple-effect " type="button">Add Expense</button>

        <div tabindex="-1" class="modal fade" id="form-dialog-sub" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Add Expense</h2>
                    </div>
                    <div class="modal-body">

                            {{Form::open(['url'=> '/save-expense', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                        <div class="component-box">

                            <!-- Text fields example -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <!-- Regular Input -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Expense Name</label>
                                                <input type="text" id="regular1" class="form-control" name="expense_name">
                                            </div>
                                            @if ($errors->has('expense_name'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('expense_name') }}</strong>
                                    </span>
                                        @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Expense Amount</label>
                                                <input type="number" id="regular1" class="form-control" name="expense_amount">
                                            </div>
                                            @if ($errors->has('expense_amount'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('expense_amount') }}</strong>
                                    </span>
                                            @endif
                                            <!-- Textarea -->

                                            <!-- Bootstrap Selectbox -->
                                            <div class="form-group">
                                                <label class="control-label">Expense Description</label>
                                                <textarea name="expense_description" required class="form-control"></textarea>
                                            </div>
                                            @if ($errors->has('expense_description'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('expense_description') }}</strong>
                                    </span>
                                            @endif
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
