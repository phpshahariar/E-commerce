<div class="row">
    <div class="col-md-6 col-sm-6">


        <div tabindex="-1" class="modal fade" id="form-dialog-subDistrict-up" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Update Sub District</h2>
                    </div>
                    <div class="modal-body">

                        {{Form::open(['url'=> 'update-sub-district', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                        <div class="component-box">

                            <!-- Text fields example -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <!-- Regular Input -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Sub District Name</label>
                                                <input type="text" id="sub_district_name" class="form-control" name="sub_district_name">
                                                <input type="hidden" id="sub_district_id" class="form-control" name="sub_district_id">
                                            </div>
                                            @if ($errors->has('sub_district_name'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('sub_district_name') }}</strong>
                                    </span>
                                            @endif
                                        <!-- Textarea -->

                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Country Name</label>
                                                <select id="country_up_sub" class="form-control" name="country_id">
                                                    <option>-Select Country-</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}">{{$country->country_name}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('division_id'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('division_id') }}</strong>
                                    </span>
                                            @endif

                                            <!-- Bootstrap Selectbox -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Division Name</label>
                                                <select id="division-up-sub" class="form-control" name="division_id">
                                                    <option>-Select Division-</option>
                                                    @foreach($divisions as $division)
                                                        <option value="{{$division->id}}">{{$division->division_name}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('division_id'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('division_id') }}</strong>
                                    </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">District Name</label>
                                                <select id="district-up" class="form-control" name="district_id">
                                                    <option>-Select District-</option>
                                                    @foreach($districts as $district)
                                                        <option value="{{$district->id}}">{{$district->district_name}}</option>

                                                    @endforeach

                                                </select>
                                            </div>
                                            @if ($errors->has('district_id'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('district_id') }}</strong>
                                    </span>
                                            @endif

                                            <div class="form-group">
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="status" id="sub_district_radio_one" value="1">
                                                    <span for="inlineRadio1">Publish</span> </label>
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="status" id="sub_district_radio_two" value="2" >
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
