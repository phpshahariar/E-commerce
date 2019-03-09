<script src="{{asset('backEnd/assets/ckeditor/')}}/ckeditor.js"></script>
<script src="{{asset('backEnd/assets/ckeditor/')}}/samples/js/sample.js"></script>
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/css/samples.css">--}}
<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/toolbarconfigurator/lib/codemirror/neo.css">

<div role="tablist" class="tab-pane" id="hindi_tabs{{$product->id}}">
    <div class="form-group">
        <label for="regular1" class="control-label">Country Name</label>
        <input type="text" value="{{$product->product_name_hin}}" class="form-control" name="product_name_hin">
    </div>
    @if ($errors->has('product_name_hin'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('product_name_hin') }}</strong>
        </span>
    @endif
    <div class="form-group">
        <label for="regular1" class="control-label">Product Price</label>
        <input type="number" value="{{$product->product_price_hin}}" class="form-control" name="product_price_hin">
    </div>
    @if ($errors->has('product_price_hin'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('product_price_hin') }}</strong>
        </span>
    @endif
    <div class="form-group">
        <label class="control-label">Note</label>
        <textarea  name="note_hin"  class="form-control">{{$product->note_hin}}</textarea>
    </div>
    @if ($errors->has('product_short_description_hin'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('product_short_description_hin') }}</strong>
        </span>
    @endif

    <div class="form-group">
        <label class="control-label">Short Description</label>
        <textarea  name="product_short_description_hin"  class="form-control">{{$product->product_short_description_hin}}</textarea>
    </div>
    @if ($errors->has('product_short_description_hin'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('product_short_description_hin') }}</strong>
        </span>
    @endif

    <div class="form-group">
        <label class="control-label">Long Description</label>
        <textarea id="product_long_description_hin_up{{$product->id}}" name="product_long_description_hin" class="form-control">{{$product->product_long_description_hin}}</textarea>
    </div>
    @if ($errors->has('product_long_description_hin'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('product_long_description_hin') }}</strong>
        </span>
    @endif

    <div class="form-group">
        <label for="regular1" class="control-label">Product Color</label>
        <input type="text" value="{{$product->product_color_hin}}" class="form-control" name="product_color_hin">
    </div>
    @if ($errors->has('product_color_hin'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('product_color_hin') }}</strong>
        </span>
    @endif

</div>

<script>
    CKEDITOR.replace( 'product_long_description_hin_up{{$product->id}}' );
</script>
