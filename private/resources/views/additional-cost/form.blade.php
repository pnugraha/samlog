<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Nama</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'name', $cost->name , ['class'=> 'form-control']) !!}
        {!! Form::input('hidden', 'company_id', $cost->company_id , ['class'=> 'form-control']) !!}
        {!! Form::input('hidden', 'type', $type , ['class'=> 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('tarif') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Tarif</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'tarif', ($cost->tarif != '') ? format_angka($cost->tarif) : '' , ['class'=> 'form-control angka']) !!}
        {!! $errors->first('tarif', '<p class="help-block">:message</p>') !!}
    </div>
</div>

@if($type == '1' || $type == '3')
<div class="form-group {!! $errors->has('status') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Status</label>
    <div class="col-sm-8">           
        @if($type == '1')
        {!! Form::select('status', status_customer(), $cost->status, ['class'=> 'form-control', 'style' => 'width:200px']); !!}
        @elseif($type == '3')
        {!! Form::select('status', status_shipping(), $cost->status, ['class'=> 'form-control', 'style' => 'width:200px']); !!}

        @endif

        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@endif