@extends('template.layout')

@section('header')
<h1>Service</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    @if($service->company_id == '1')
    <li><a href="{{ route('company.index') }}"> Company</a></li>
    @elseif($service->company_id == '2')
    <li><a href="{{ route('company.index_trucking') }}">  Vendor</a></li>
    @elseif($service->company_id == '3')
    <li><a href="{{ route('company.index_shipping') }}">  Vendor</a></li>
    @elseif($service->company_id == '4')
    <li><a href="{{ route('company.index_dooring') }}"> Vendor</a></li>
    @endif
    <li><a href="{{ route('service.index', $service->company_id) }}?type={{$type}}">Service</a></li>
    <li class="active">Edit</li>
</ol>
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-body">
        <div class="col-md-6">  
            <form class="form-horizontal" action="{{ route('service.update', $service->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                @if($type == 1)
                @include('service.form')
                @elseif($type == 2 || $type == 4)
                @include('service.form_trucking')
                @elseif($type == 3)
                @include('service.form_shipping')
                @endif
                <input type="hidden" name="type" value="{{ $type }}">
                <div class="box-bottom">
                    <button type="submit" class="btn btn-flat btn-primary pull-right">Simpan</button>                    
                    <a class="btn btn-default" href="{{ route('service.index', $service->company_id) }}?type={{$type}}">Batal</a>
                </div>        

            </form>
        </div>
    </div>
</div>
@endsection