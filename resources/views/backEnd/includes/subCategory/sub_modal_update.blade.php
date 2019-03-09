<div class="row">
    <div class="col-md-6 col-sm-6">


        <div tabindex="-1" class="modal fade" id="form-dialog-sub-up" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bordered">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h2 class="pmd-card-title-text">Update Sub Categories</h2>
                    </div>
                    <div class="modal-body">

                        {{Form::open(['url'=> 'update-sub-category', 'name' => 'editeSubCat', 'method' => 'post', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data' ])}}
                        <div class="component-box">

                            <!-- Text fields example -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pmd-card pmd-z-depth pmd-card-custom-form">
                                        <div class="pmd-card-body">
                                            <!-- Regular Input -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Sub Category</label>
                                                <input type="text" id="sub_cat_name" class="form-control" name="sub_category_name">
                                                <input type="hidden" id="sub_cat_id" class="form-control" name="sub_category_id">
                                            </div>
                                            @if ($errors->has('sub_category_name'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('sub_category_name') }}</strong>
                                    </span>
                                            @endif

                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Sub Category Bangla</label>
                                                <input type="text" id="sub_cat_name_ban" class="form-control" name="sub_category_name_ban">
                                            </div>
                                            @if ($errors->has('sub_category_name_ban'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('sub_category_name_ban') }}</strong>
                                    </span>
                                            @endif
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Sub Category Hindi</label>
                                                <input type="text" id="sub_cat_name_hin" class="form-control" name="sub_category_name_hin">
                                            </div>
                                            @if ($errors->has('sub_category_name'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('sub_category_name') }}</strong>
                                    </span>
                                            @endif
                                        <!-- Textarea -->

                                            <!-- Bootstrap Selectbox -->
                                            <div class="form-group">
                                                <label for="regular1" class="control-label">Main Category</label>
                                                <select id="sub_main_cat_id" class="form-control" name="main_category_id">
                                                    <option>-Select Main Category-</option>
                                                    @foreach($main_category as $category)
                                                        <option value="{{$category->id}}">{{$category->category_name}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($errors->has('main_category_id'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('main_category_id') }}</strong>
                                    </span>
                                            @endif
                                            <div class="form-group">
                                                <input type="file" id="regular1" required  name="image" accept="image/*">
                                            </div>
                                            @if ($errors->has('image"'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $errors->first('image"') }}</strong>
                                    </span>
                                            @endif
                                            <div class="form-group">
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="status" id="sub_cat_radio_one" value="1">
                                                    <span for="inlineRadio1">Publish</span> </label>
                                                <label class="radio-inline pmd-radio">
                                                    <input type="radio" name="status" id="sub_cat_radio_two" value="2" >
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
