<div class="row">
    <div class="col-md-6 col-sm-6">
        {{--<button data-target="#form-order-update" data-toggle="modal" class="btn pmd-ripple-effect btn-primary pmd-z-depth pmd-ripple-effect " type="button">Add District</button>--}}

        <div tabindex="-1" class="modal fade" id="form-order-update" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Order Publish</h2>
                    </div>
                    <div class="modal-body">

                        {{Form::open(['url'=> '/order-send-to-shopper', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                        <div class="component-box">

                            <!-- Text fields example -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <!-- Regular Input -->
                                            {{--@if ($errors->has('district_name'))--}}
                                                {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong style="color: red">{{ $errors->first('district_name') }}</strong>--}}
                                    {{--</span>--}}
                                            {{--@endif--}}

                                            {{--<div class="form-group">--}}
                                                {{--<label for="regular1" class="control-label">Shopper Name</label>--}}
                                                <input type="hidden" name="order_id" id="updateOrderId">
                                                {{--<select class="form-control" id="country" name="shopper_id">--}}
                                                    {{--<option>-Select Shopper-</option>--}}
                                                    {{--@foreach($users as $user)--}}
                                                        {{--<option value="{{$user->id}}">{{$user->user_name}}</option>--}}

                                                    {{--@endforeach--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                            {{--@if ($errors->has('country_id'))--}}
                                                {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong style="color: red">{{ $errors->first('country_id') }}</strong>--}}
                                    {{--</span>--}}
                                            {{--@endif--}}
                                        <!-- Textarea -->

                                            <!-- Bootstrap Selectbox -->


                                            <div class="form-group">
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="status" id="inlineRadio1" value="1">
                                                    <span for="inlineRadio1">Publish</span> </label>
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="status" id="inlineRadio2" value="0" >
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
