<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Nama</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'name', $company->name , ['class'=> 'form-control']) !!}
        {!! Form::input('hidden', 'type', $company->type , ['class'=> 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('address') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Address</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'address', $company->address , ['class'=> 'form-control']) !!}
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('phone') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Phone</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'phone', $company->phone , ['class'=> 'form-control']) !!}
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('pic1') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">PIC 1</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'pic1', $company->pic1 , ['class'=> 'form-control']) !!}
        {!! $errors->first('pic1', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('hp1') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">HP 1</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'hp1', $company->hp1 , ['class'=> 'form-control']) !!}
        {!! $errors->first('hp1', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('email1') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Email 1</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'email1', $company->email1 , ['class'=> 'form-control']) !!}
        {!! $errors->first('email1', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('pic2') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">PIC 2</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'pic2', $company->pic2 , ['class'=> 'form-control']) !!}
        {!! $errors->first('pic2', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('hp2') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">HP 2</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'hp2', $company->hp2 , ['class'=> 'form-control']) !!}
        {!! $errors->first('hp2', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('email2') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Email 2</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'email2', $company->email2 , ['class'=> 'form-control']) !!}
        {!! $errors->first('email2', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('npwp') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">NPWP</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'npwp', $company->npwp , ['class'=> 'form-control']) !!}
        {!! $errors->first('npwp', '<p class="help-block">:message</p>') !!}
    </div>
</div>