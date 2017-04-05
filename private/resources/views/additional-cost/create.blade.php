@extends('template.layout')

@section('header')
<h1>Additional Cost</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    @if($cost->company_id == '1')
    <li><a href="{{ route('company.index') }}"> Company / Vendor</a></li>
    @elseif($cost->company_id == '2')
    <li><a href="{{ route('company.index_trucking') }}"> Company / Vendor</a></li>
    @elseif($cost->company_id == '3')
    <li><a href="{{ route('company.index_shipping') }}"> Company / Vendor</a></li>
    @elseif($cost->company_id == '4')
    <li><a href="{{ route('company.index_dooring') }}"> Company / Vendor</a></li>
    @endif
    <li><a href="{{ route('additional_cost.index', $cost->company_id) }}">Additional Cost</a></li>
    <li class="active">Tambah</li>
</ol>
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-body">
        <div class="col-md-6">  
            <form class="form-horizontal" action="{{ route('additional_cost.store') }}" method="POST">                
                {{ csrf_field() }}
                @include('additional-cost.form')
                <div class="box-bottom">
                    <button type="submit" class="btn btn-flat btn-primary pull-right">Tambah</button>                    
                    <a class="btn btn-default" href="{{ route('additional_cost.index', $cost->company_id) }}">Batal</a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection