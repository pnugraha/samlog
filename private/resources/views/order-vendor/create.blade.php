@extends('template.layout')

@section('header')
<h1>Order Vendor</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ route('order.index') }}"> Order</a></li>
    <li><a href="{{ route('order_vendor.index', $order->order_id) }}?type={{ $order->type }}">Order Vendor</a></li>
    <li class="active">Tambah</li>
</ol>
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-body">
        <div class="col-md-6">  
            <form class="form-horizontal" action="{{ route('order_vendor.store') }}" method="POST">                
                {{ csrf_field() }}
                @include('order-vendor.form')
                <div class="box-bottom">
                    <button type="submit" class="btn btn-flat btn-primary pull-right">Tambah</button>                    
                    <a class="btn btn-default" href="{{ route('order_vendor.index', $order->order_id) }}?type={{ $order->type }}">Batal</a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection