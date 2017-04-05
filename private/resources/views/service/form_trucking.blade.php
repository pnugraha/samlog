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

<div class="form-group {!! $errors->has('tarif') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Tarif</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'tarif', ($service->tarif != '') ? format_angka($service->tarif) : '' , ['class'=> 'form-control angka']) !!}
        {!! $errors->first('tarif', '<p class="help-block">:message</p>') !!}
    </div>
</div>