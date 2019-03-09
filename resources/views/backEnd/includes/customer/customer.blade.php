<div class="row">
    <div class="col-md-6 col-sm-6">


        <div tabindex="-1" class="modal fade" id="form-dialog-customer-up" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Update Country</h2>
                    </div>
                    <div class="modal-body">

                        {{Form::open(['url'=> '/update-customer', 'name' => 'editeSubCat', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                        <div class="component-box">

                            <!-- Text fields example -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <!-- Regular Input -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Customer Name</label>
                                                <input type="text" id="customer_name" class="form-control" name="customer_name">
                                                <input type="hidden" id="customer_id" class="form-control" name="customer_id">
                                            </div>
                                            @if ($errors->has('customer_name'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('customer_name') }}</strong>
                                    </span>
                                            @endif

                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Customer Phone Number</label>
                                                <input type="text" id="customer_phone_number" class="form-control" name="customer_phone_number">
                                            </div>
                                            @if ($errors->has('customer_phone_number'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('customer_phone_number') }}</strong>
                                    </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Customer Email</label>
                                                <input type="text" id="customer_email" class="form-control" name="customer_email">
                                            </div>
                                            @if ($errors->has('customer_email'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('customer_email') }}</strong>
                                    </span>
                                            @endif
                                        <!-- Textarea -->

                                            <!-- Bootstrap Selectbox -->
                                            <div class="form-group">
                                                <label class="control-label">Customer Address</label>
                                                <textarea id="customer_address" name="customer_address" required class="form-control"></textarea>
                                            </div>

                                            @if ($errors->has('customer_address'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('customer_address') }}</strong>
                                    </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Add Member Cart</label>
                                                <select class="form-control" id="customer_member_id" name="member_id">
                                                    <option>-Select Member Cart-</option>
                                                    @foreach($memberCart as $memberCart)
                                                    <option value="{{$memberCart->id}}">{{$memberCart->member_cart_name}}</option>
                                                        <option value="0">-None-</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            @if ($errors->has('member_id'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('invlid') }}</strong>
                                    </span>
                                            @endif

                                            {{--<div class="form-group">--}}
                                                {{--<label class="radio-inline pmd-radio">--}}
                                                    {{--<input type="radio" name="status" id="country_radio_one" value="1">--}}
                                                    {{--<span for="inlineRadio1">Publish</span> </label>--}}
                                                {{--<label class="radio-inline pmd-radio">--}}
                                                    {{--<input type="radio" name="status" id="country_radio_two" value="2" >--}}
                                                    {{--<span for="inlineRadio2">Unpublish</span> </label>--}}
                                            {{--</div>--}}
                                            {{--@if ($errors->has('status'))--}}
                                                {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong style="color: red">{{ $errors->first('status') }}</strong>--}}
                                    {{--</span>--}}
                                            {{--@endif--}}
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
