<div class="row">
    <div class="col-md-6 col-sm-6">


        <div tabindex="-1" class="modal fade" id="form-dialog-user-up{{$shopper_order->id}}" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Update User</h2>
                    </div>
                    <div class="modal-body">

                        {{Form::open(['url'=> '/update-shopper-payment', 'method' => 'post', 'class' => 'form-horizontal' ])}}
                        <div class="component-box">

                            <!-- Text fields example -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <!-- Regular Input -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Order ID</label>
                                                <input required type="text" name="order_id" value="{{$shopper_order->order_id}}" class="form-control">
                                                <input required type="hidden" name="id" value="{{$shopper_order->id}}" class="form-control">
                                            </div>
                                            @if ($errors->has('order_id'))
                                                <span class="invalid-feedback" role="alert">
                                           <strong style="color: red">{{ $errors->first('order_id') }}</strong>
                                           </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Order Amount</label>
                                                <input required type="text" name="order_total" value="{{$shopper_order->order_total}}" class="form-control">
                                            </div>
                                            @if ($errors->has('order_total'))
                                                <span class="invalid-feedback" role="alert">
                                           <strong style="color: red">{{ $errors->first('order_total') }}</strong>
                                           </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Admin Commission</label>
                                                <input required type="text" name="admin_commission" value="{{($shopper_order->order_total*$user_admin->commission_rate)/100}}" class="form-control">
                                            </div>
                                            @if ($errors->has('admin_commission'))
                                                <span class="invalid-feedback" role="alert">
                                           <strong style="color: red">{{ $errors->first('admin_commission') }}</strong>
                                           </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Shoppper Payable</label>
                                                <input required type="text" name="shopper_payable" value="{{(($shopper_order->order_total)-(($shopper_order->order_total*$user_admin->commission_rate)/100))}}" class="form-control" >
                                            </div>
                                            @if ($errors->has('shopper_payable'))
                                                <span class="invalid-feedback" role="alert">
                                           <strong style="color: red">{{ $errors->first('shopper_payable') }}</strong>
                                           </span>
                                            @endif

                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Admin Payment</label>
                                                <input required type="text" name="admin_payment_amount" value="{{(($shopper_order->order_total)-(($shopper_order->order_total*$user_admin->commission_rate)/100))}}" class="form-control">
                                            </div>
                                            @if ($errors->has('admin_payment'))
                                                <span class="invalid-feedback" role="alert">
                                           <strong style="color: red">{{ $errors->first('admin_payment') }}</strong>
                                           </span>
                                            @endif

                                            <div class="form-group">
                                                <label class="radio-inline pmd-radio">
                                                    <input {{$shopper_order->admin_payment == 1 ? 'Checked' : ''}} type="radio" name="admin_payment_status" id="user-radio-up-one" value="1">
                                                    <span for="inlineRadio1">Paid</span> </label>
                                                <label class="radio-inline pmd-radio">
                                                    <input {{$shopper_order->admin_payment == 0 ? 'Checked' : ''}} type="radio" name="admin_payment_status" id="user-radio-up-two" value="0" >
                                                    <span for="inlineRadio2">Unpaid</span> </label>
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
                            <button id="btn_up" class="btn pmd-ripple-effect btn-primary" type="submit">Update</button>
                            <button data-dismiss="modal"  class="btn pmd-ripple-effect btn-default" type="button">Discard</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div> <!--Form dialog example end -->

</div>
