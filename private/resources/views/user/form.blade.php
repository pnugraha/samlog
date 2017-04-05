<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Name</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'name', $user->name , ['class'=> 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Email</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'email', $user->email , ['class'=> 'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('username') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Username</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'username', $user->username , ['class'=> 'form-control']) !!}
        {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
    <label  class="col-sm-4 control-label">Password</label>
    <div class="col-sm-8">           
        {!! Form::input('text', 'password', '' , ['class'=> 'form-control']) !!}
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>
