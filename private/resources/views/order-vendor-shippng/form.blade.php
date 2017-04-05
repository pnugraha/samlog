<script type="text/javascript">
    $(document).ready(function() {
        $('.datetimepicker').datetimepicker({
            showTodayButton: true,
            format: 'D MMM YYYY',
            sideBySide: true,
        });
        $(".select2").select2();
    });
</script>

<div class="form-group {!! $errors->has('vendor_id') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Vendor</label>
    <div class="col-sm-8">           
        
        {!! Form::select('vendor_id', $services, $order->vendor_id, ['class'=> 'form-control select2', 'style' => 'width: 100%;']); !!}        
        {!! $errors->first('vendor_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('seal') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Seal</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'seal', $order->seal , ['class'=> 'form-control']) !!}
        {!! Form::input('hidden', 'order_id', $order->order_id , ['class'=> 'form-control']) !!}
        {!! $errors->first('seal', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('bl_fee') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">BL Fee</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'bl_fee', ($order->bl_fee) ? format_angka($order->bl_fee) : '' , ['class'=> 'form-control angka']) !!}
        {!! $errors->first('bl_fee', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('vessel_name') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Vessel Name</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'vessel_name', $order->vessel_name , ['class'=> 'form-control']) !!}
        {!! $errors->first('vessel_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('voyage') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Voyage</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'voyage', $order->voyage , ['class'=> 'form-control']) !!}
        {!! $errors->first('voyage', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('closing_date') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Closing Date</label>
    <div class="col-sm-8">           
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            {!! Form::input('text', 'closing_date', ($order->closing_date) ? tanggal_datetime($order->closing_date) : '' , ['class'=> 'form-control datetimepicker', 'id' => '']) !!}
        </div>
        
        {!! $errors->first('closing_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('etd_pol') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">ETD POL</label>
    <div class="col-sm-8">           
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            {!! Form::input('text', 'etd_pol', ($order->etd_pol) ? tanggal_datetime($order->etd_pol) : '' , ['class'=> 'form-control datetimepicker', 'id' => '']) !!}
        </div>
        
        {!! $errors->first('etd_pol', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('etd_pod') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">ETD POD</label>
    <div class="col-sm-8">           
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            {!! Form::input('text', 'etd_pod', ($order->etd_pod) ? tanggal_datetime($order->etd_pod) : '' , ['class'=> 'form-control datetimepicker', 'id' => '']) !!}
        </div>
        
        {!! $errors->first('etd_pod', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('note') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Note</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'note', $order->note , ['class'=> 'form-control']) !!}
        {!! $errors->first('note', '<p class="help-block">:message</p>') !!}
    </div>
</div>