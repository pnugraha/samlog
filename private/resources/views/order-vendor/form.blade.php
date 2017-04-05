<script type="text/javascript">
    $(document).ready(function() {
        $(".select2").select2();
    });
</script>

<div class="form-group {!! $errors->has('vendor_id') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Vendor</label>
    <div class="col-sm-8">           
        
        {!! Form::select('vendor_id', $services, $order->vendor_id, ['class'=> 'form-control select2', 'style' => 'width: 100%;']); !!}
        {!! Form::input('hidden', 'order_id', $order->order_id , ['class'=> 'form-control']) !!}
        {!! Form::input('hidden', 'type', $order->type , ['class'=> 'form-control']) !!}
        {!! $errors->first('vendor_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('tax') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Tax</label>
    <div class="col-sm-8">           
       
        {!! Form::select('tax', status(), $order->tax, ['class'=> 'form-control', 'style' => 'width: 100%;']); !!}
        {!! $errors->first('tax', '<p class="help-block">:message</p>') !!}
    </div>
</div>