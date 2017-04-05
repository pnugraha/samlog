@extends('template.layout')

@section('header')	
<h1>Order</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Order</li>
</ol>
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-body">
        <div class="col-md-12" style="padding-bottom: 10px;">
            <div class="no-padding col-xs-6 clearfix" >
                <a href="{{ route('order.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>      
            </div>
            <div class="no-padding col-xs-6 ">            
                <form class="form-inline pull-right" method="get" id="form-cari">
                    <div class="search-box">
                        <input type="text" name="no" class="form-control" placeholder="No" value="{{ $no }}" >    
                        <input type="hidden" name="view" class="form-control" value="{{ $view }}" >
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-12">            
            @if($orders->count())
            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap tableview">
                <thead>
                    <tr>
                        <th class="text-center" width="45">No</th>                
                        <th width="150">No Order</th>
                        <th width="150">Customer</th>
                        <th width="150">Service</th>         
                        <th width="150">Cargo Type</th>   
                        <th width="150">Quantity</th> 
                        <th width="100">Volume</th> 
                        <th width="60" class="text-center">Aksi</th>
                        <th width="90" class="text-center">Vendor</th>
                        <th width="30" class="text-center">Dokumen</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = $orders->firstItem() ?>
                    @foreach($orders as $order)
                    <tr>
                        <td class="text-right">{{ $i++ }}</td>                            
                        <td>{{ $order->no }}</td>
                        <td>{{ $order->company->name }}</td>
                        <td>{{ $order->service->pick_up }} - {{ $order->service->delivery }}</td>
                        <td>{{ $order->cargo_type }}</td>  
                        <td>{{ $order->quantity_cargo }}</td>
                        <td>{{ $order->volume }}</td>  
                        <td class="text-center">                            
                            <a title="Edit" class="text-black action-icon" href="{{ route('order.edit', $order->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                            <form action="{{ route('order.destroy', $order->id) }}" method="POST" style="display: inline;" onsubmit="if (confirm('Anda yakin ingin menghapus data?')) {
                                        return true
                                    } else {
                                        return false
                                    }
                                    ;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button style="border:0; background:none;margin-left: -5px;" title="Hapus" type="submit" class="text-btn text-black action-icon"><i class="fa fa-trash-o"></i></button>
                            </form>                            
                        </td>
                        <td class="text-center">
                            <a title="Trucking" class="text-black action-icon" href="{{ route('order_vendor.index', $order->id) }}?type=2"><i class="fa fa-truck"></i></a>
                            <a title="Shipping" class="text-black action-icon" href="{{ route('order_vendor_shipping.index', $order->id) }}"><i class="fa fa-ship"></i></a>
                            <a title="Door to Door" class="text-black action-icon" href="{{ route('order_vendor.index', $order->id) }}?type=4"><i class="fa fa-home"></i></a>
<!--                            <a title="Additional Cost" class="text-black action-icon" href="{{ route('order_additional_cost.index', $order->id) }}"><i class="fa fa-usd"></i></a>-->
                        </td>
                        <td class="text-center">
                            <a title="Realisasi Cargo" class="text-black action-icon" href="{{ route('service.index', $order->id) }}?order={{$order->id}}"><i class="fa fa-book"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <?php
                if (isset($_GET['nama'])) {
                    $nama = $_GET['nama'];
                } else {
                    $nama = NULL;
                }
                ?>               
                <div class="col-sm-3 footer-left">       
                    <form class="form-inline pull-left" id='form_viewed' method="get" > 
                        <input type="hidden" name="nama" class="form-control" value="{{ $nama }}" >
                        {!! Form::select('view', array( 20 => '20', 50 => '50', 100 => '100', ), $view, array('class' => 'form-control', 'id' => 'jumlah_baris', 'onchange'=>'$("#form_viewed").submit()')); !!}
                    </form>&nbsp;&nbsp;Jumlah data: {{ $total }}
                </div>
                <div class="col-sm-9" style="padding: 0;margin: 0;text-align: right;">{!! $orders->appends(['view' => $view, 'nama' => $nama ])->render() !!}</div>


            </div>
            @else
            <table class="table table-condensed table-striped tableview dataTable">
                <thead>
                    <tr>
                        <th class="text-center" width="45">No</th>                
                        <th width="50">No</th>
                        <th width="150">Customer</th>
                        <th width="150">Service</th>         
                        <th width="150">Cargo Type</th>   
                        <th width="150">Quantity</th> 
                        <th width="100">Volume</th> 
                        <th width="60" class="text-center">Aksi</th>
                        <th width="90" class="text-center">Vendor</th>
                        <th width="30" class="text-center">Report</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="10" class="text-center">
                            <h3>Tidak Ada Data!</h3>
                        </td>
                    </tr>
                </tbody>
            </table>
            @endif

        </div>
    </div>
</div>

@endsection