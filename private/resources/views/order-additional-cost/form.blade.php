<script type="text/javascript">
    $(document).ready(function() {
        $(".select2").select2();
    });
</script>

<div class="form-group {!! $errors->has('cost_id') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Additional Cost</label>
    <div class="col-sm-8">           
        
        {!! Form::select('cost_id', $additionals, $order->cost_id, ['class'=> 'form-control select2', 'style' => 'width: 100%;']); !!}
        {!! Form::input('hidden', 'order_id', $order->order_id , ['class'=> 'form-control']) !!}
        {!! Form::input('hidden', 'type', $order->type , ['class'=> 'form-control']) !!}
        {!! $errors->first('cost_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>