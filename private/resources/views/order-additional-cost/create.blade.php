@extends('template.layout')

@section('header')
<h1>Additional Cost</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Additional Cost</li>
    <li class="active">Tambah</li>
</ol>
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-body">
        <div class="col-md-6">  
            <form class="form-horizontal" action="{{ route('order_additional_cost.store') }}" method="POST">                
                {{ csrf_field() }}
                @include('order-additional-cost.form')
                <div class="box-bottom">
                    <button type="submit" class="btn btn-flat btn-primary pull-right">Tambah</button>       
                    <a class="btn btn-default" href="{{ route('order_vendor.index', $order->order_id) }}?type={{ $order->type }}">Batal</a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection