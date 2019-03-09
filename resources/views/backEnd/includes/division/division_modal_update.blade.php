<div class="row">
    <div class="col-md-6 col-sm-6">


        <div tabindex="-1" class="modal fade" id="form-dialog-division-up" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Update Division</h2>
                    </div>
                    <div class="modal-body">

                        {{Form::open(['url'=> 'update-division', 'name' => 'editeSubCat', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                        <div class="component-box">

                            <!-- Text fields example -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <!-- Regular Input -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Division Name</label>
                                                <input type="text" id="div_name" class="form-control" name="division_name">
                                                <input type="hidden" id="division_id" class="form-control" name="division_id">
                                            </div>
                                            @if ($errors->has('division_name'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('division_name') }}</strong>
                                    </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Shipping Charge</label>
                                                <input type="number" id="shippCharge" class="form-control" name="shipping_charge">
                                            </div>
                                            @if ($errors->has('shipping_charge'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('shipping_charge') }}</strong>
                                    </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Country Name</label>
                                                <select class="form-control" id="country_id" name="country_id">
                                                    <option>-Select Country-</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}">{{$country->country_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('country_id'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('invlid') }}</strong>
                                    </span>
                                            @endif
                                            <div class="form-group">
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="status" id="division_radio_one" value="1">
                                                    <span for="inlineRadio1">Publish</span> </label>
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="status" id="division_radio_two" value="2" >
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
