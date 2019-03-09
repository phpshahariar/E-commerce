<script src="{{asset('backEnd/assets/ckeditor/')}}/ckeditor.js"></script>
<script src="{{asset('backEnd/assets/ckeditor/')}}/samples/js/sample.js"></script>
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/css/samples.css">--}}
<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/toolbarconfigurator/lib/codemirror/neo.css">


<div role="tablist" class="tab-pane" id="bootstrap-about">
    <div class="form-group">
        <label for="regular1" class="control-label">পণ্যের নাম</label>
        <input type="text" id="regular1" class="form-control" name="product_name_ban">
    </div>
    @if ($errors->has('product_name_ban'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('product_name_ban') }}</strong>
        </span>
    @endif
    <div class="form-group">
        <label for="regular1" class="control-label">পণ্যের দাম</label>
        <input type="number" id="regular1" class="form-control" name="product_price_ban">
    </div>
    @if ($errors->has('product_price_ban'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('product_price_ban') }}</strong>
        </span>
    @endif
    <div class="form-group">
        <label class="control-label">Note</label>
        <textarea name="note_ban"  class="form-control"></textarea>
    </div>
    @if ($errors->has('prodcut_short_description_ban'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('prodcut_short_description_ban') }}</strong>
        </span>
    @endif

    <div class="form-group">
        <label class="control-label">ছোট বিবরণ</label>
        <textarea name="prodcut_short_description_ban"  class="form-control"></textarea>
    </div>
    @if ($errors->has('prodcut_short_description_ban'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('prodcut_short_description_ban') }}</strong>
        </span>
    @endif

    <div class="form-group">
        <label class="control-label">দীর্ঘ বিবরণ</label>
        <textarea id="prodcut_long_description_ban" name="prodcut_long_description_ban"  class="form-control"></textarea>
    </div>
    @if ($errors->has('prodcut_long_description_ban'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('prodcut_long_description_ban') }}</strong>
        </span>
    @endif

    <div class="form-group">
        <label for="regular1" class="control-label">পণ্য রঙ</label>
        <input type="text" id="regular1" class="form-control" name="product_color_ban">
    </div>
    @if ($errors->has('product_color_ban'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('product_color_ban') }}</strong>
        </span>
    @endif

</div>

<script>
    CKEDITOR.replace( 'prodcut_long_description_ban' );
</script>
