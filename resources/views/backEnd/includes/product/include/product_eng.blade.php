<div role="tablist" class="tab-pane active" id="bootstrap-home">
    <div class="form-group">
        <label for="regular1" class="control-label">Product Name</label>
        <input type="text" id="product_name_eng" required class="form-control" name="product_name_eng">
    </div>
    @if ($errors->has('product_name_eng'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('product_name_eng') }}</strong>
        </span>
    @endif
    <div class="form-group">
        <label for="regular1" class="control-label">Product Price</label>
        <input type="number" required id="product_price_eng" class="form-control" name="product_price_eng">
    </div>
    @if ($errors->has('product_price_eng'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('product_price_eng') }}</strong>
        </span>
    @endif
    <div class="form-group">
        <label class="control-label">Note</label>
        <textarea required name="note_eng" class="form-control"></textarea>
    </div>
    @if ($errors->has('product_short_description_eng'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('product_short_description_eng') }}</strong>
        </span>
    @endif

    <div class="form-group">
        <label class="control-label">Short Description</label>
        <textarea id="product_short_description_eng" required name="product_short_description_eng" class="form-control"></textarea>
    </div>
    @if ($errors->has('product_short_description_eng'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('product_short_description_eng') }}</strong>
        </span>
    @endif

    <div class="form-group">
        <label class="control-label">Long Description</label>
        <textarea id="editor" required name="prodcut_long_description_eng"  class="form-control"></textarea>
    </div>
    @if ($errors->has('prodcut_long_description_eng'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('prodcut_long_description_eng') }}</strong>
        </span>
    @endif

    <div class="form-group">
        <label for="regular1" class="control-label">Product Color</label>
        <input type="text" id="product_color_eng" required class="form-control" name="product_color_eng">
    </div>



</div>

