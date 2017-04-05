<script type="text/javascript">
    $(document).ready(function() {
        $('#datetimepicker').datetimepicker({
            showTodayButton: true,
            format: 'D MMM YYYY',
            sideBySide: true,
        });
        $(".select2").select2();
    });
</script>

<div class="form-group {!! $errors->has('no') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">No</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'no', $order->no , ['class'=> 'form-control']) !!}       
        {!! $errors->first('no', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('customer_id') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Customer</label>
    <div class="col-sm-8">           
        {!! Form::select('customer_id', $customers, $order->customer_id, ['class'=> 'form-control select2', 'style' => 'width: 100%;']); !!}
        
        {!! $errors->first('customer_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('service_id') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Service</label>
    <div class="col-sm-8">           
        {!! Form::select('service_id', $services, $order->service_id, ['class'=> 'form-control select2', 'style' => 'width: 100%;']); !!}
       
        {!! $errors->first('service_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('cargo_type') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Cargo Type</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'cargo_type', $order->cargo_type , ['class'=> 'form-control']) !!}
        {!! $errors->first('cargo_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('quantity_cargo') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Quantity Cargo</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'quantity_cargo', $order->quantity_cargo , ['class'=> 'form-control']) !!}
        {!! $errors->first('quantity_cargo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('volume') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Volume</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'volume', $order->volume , ['class'=> 'form-control']) !!}
        {!! $errors->first('volume', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('party') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Party</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'party', $order->party , ['class'=> 'form-control']) !!}
        {!! $errors->first('party', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('weight') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Weight</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'weight', $order->weight , ['class'=> 'form-control']) !!}
        {!! $errors->first('weight', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('stuffing_date') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Stuffing Date</label>
    <div class="col-sm-8">           
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            {!! Form::input('text', 'stuffing_date', ($order->stuffing_date) ? tanggal_datetime($order->stuffing_date) : '' , ['class'=> 'form-control', 'id' => 'datetimepicker']) !!}
        </div>
        
        {!! $errors->first('stuffing_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('note') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Note</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'note', $order->note , ['class'=> 'form-control']) !!}
        {!! $errors->first('note', '<p class="help-block">:message</p>') !!}
    </div>
</div>