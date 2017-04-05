
<div class="form-group {!! $errors->has('pol') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Port Of Loading</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'pol', $service->pol , ['class'=> 'form-control']) !!}
        {!! Form::input('hidden', 'company_id', $service->company_id , ['class'=> 'form-control']) !!}
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
    <label  class="col-sm-4 control-label">Ocean Freight</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'tarif', ($service->tarif != '') ? format_angka($service->tarif) : '' , ['class'=> 'form-control angka']) !!}
        {!! $errors->first('tarif', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('thc_pol') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">THC POL</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'thc_pol', $service->thc_pol , ['class'=> 'form-control']) !!}
        {!! $errors->first('thc_pol', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('thc_pod') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">THC POD</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'thc_pod', $service->thc_pod , ['class'=> 'form-control']) !!}
        {!! $errors->first('thc_pod', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('status') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Status</label>
    <div class="col-sm-8">           
          {!! Form::select('status', status_shipping(), $service->status, ['class'=> 'form-control', 'style' => 'width:200px']); !!}
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>