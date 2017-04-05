@extends('template.layout')

@section('header')
<h1>User</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>User</li>
    <li class="active">Tambah</li>
</ol>
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-body">
        <div class="col-md-6">  
            <form class="form-horizontal" action="{{ route('user.store') }}" method="POST">
                {{ csrf_field() }}
                @include('user.form')
                <div class="box-bottom">
                    <button type="submit" class="btn btn-flat btn-primary pull-right">Tambah</button>                    
                    <a class="btn btn-default" href="{{ route('user.index') }}">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection