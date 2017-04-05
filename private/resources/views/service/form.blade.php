<div class="form-group {!! $errors->has('pick_up') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Pick Up</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'pick_up', $service->pick_up , ['class'=> 'form-control']) !!}
        {!! Form::input('hidden', 'company_id', $service->company_id , ['class'=> 'form-control']) !!}
        {!! $errors->first('pick_up', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('delivery') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Delivery</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'delivery', $service->delivery , ['class'=> 'form-control']) !!}
        {!! $errors->first('delivery', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('pol') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Port Of Loading</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'pol', $service->pol , ['class'=> 'form-control']) !!}
        {!! $errors->first('pol', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('pod') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Port Of Discharge</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'pod', $service->pod , ['class'=> 'form-control']) !!}
        {!! $errors->first('pod', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('tarif') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Tarif</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'tarif', ($service->tarif != '') ? format_angka($service->tarif) : ''  , ['class'=> 'form-control angka']) !!}
        {!! $errors->first('tarif', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('status') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Status</label>
    <div class="col-sm-8">           
        {!! Form::select('status', status_customer(), $service->status, ['class'=> 'form-control', 'style' => 'width:200px']); !!}
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>