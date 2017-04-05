@extends('template.layout')

@section('header')
<h1>Company</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    @if($company->type == '1')
    <li><a href="{{ route('company.index') }}"> Company </a></li>
    @elseif($company->type == '2')
    <li><a href="{{ route('company.index_trucking') }}"> Vendor</a></li>
    @elseif($company->type == '3')
    <li><a href="{{ route('company.index_shipping') }}"> Vendor</a></li>
    @elseif($company->type == '4')
    <li><a href="{{ route('company.index_dooring') }}"> Vendor</a></li>
    @endif   
    <li class="active">Edit</li>
</ol>
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-body">
        <div class="col-md-6">  
            <form class="form-horizontal" action="{{ route('company.update', $company->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                @include('company.form')
                <div class="box-bottom">
                    <button type="submit" class="btn btn-flat btn-primary pull-right">Simpan</button>                    
                    <a class="btn btn-default" href="{{ route('company.index') }}">Batal</a>
                </div>        

            </form>
        </div>
    </div>
</div>
@endsection