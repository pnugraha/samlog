@extends('template.layout')

@section('header')	
<h1>Order Vendor Shipping</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ route('order.index') }}"> Order</a></li>    
    <li class="active">Order Vendor Shipping</li>
</ol>
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-body">
        <div class="col-md-12" style="padding-bottom: 10px;">
            <div class="no-padding col-xs-6 clearfix" >
                <a href="{{ route('order_vendor_shipping.create') }}?order={{ $order }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>      
            </div>
            <div class="no-padding col-xs-6 ">            

            </div>
        </div>
        <div class="col-md-12">            
            @if($orders->count())
            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap tableview">
                <thead>
                    <tr>
                        <th class="text-center" width="45">No</th>                
                        <th width="200">Vendor</th>
                        <th width="200">Seal</th>
                        <th width="200">Vessel Name</th>
                        <th width="150">Voyage</th>         
                        <th width="150">Closing Date</th>                        
                        <th width="60" class="text-center">Aksi</th>                        
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    @foreach($orders as $v)
                    <tr>
                        <td class="text-right">{{ $i++ }}</td>        
                        <td>{{ $v->service->pod }} - {{ $v->service->pol }}</td>  
                        <td>{{ $v->seal }}</td>
                        <td>{{ $v->vessel_name }}</td>
                        <td>{{ $v->voyage }}</td>    
                        <td>{{ tanggal_datetime($v->closing_date) }}</td>    
                        <td class="text-center">                            
                            <a title="Edit" class="text-black action-icon" href="{{ route('order_vendor_shipping.edit', $v->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                            <form action="{{ route('order_vendor_shipping.destroy', $v->id) }}" method="POST" style="display: inline;" onsubmit="if (confirm('Anda yakin ingin menghapus data?')) {
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{--<div class="row">                        
                <div class="col-sm-3 footer-left">       
                    <form class="form-inline pull-left" id='form_viewed' method="get" >                             
                        {!! Form::select('view', array( 20 => '20', 50 => '50', 100 => '100', ), $view, array('class' => 'form-control', 'id' => 'jumlah_baris', 'onchange'=>'$("#form_viewed").submit()')); !!}
                    </form>&nbsp;&nbsp;Jumlah data: {{ $total }}
                </div>
                <div class="col-sm-9" style="padding: 0;margin: 0;text-align: right;">{!! $orders->appends(['view' => $view ])->render() !!}</div>


            </div>
            --}}
            @else
            <table class="table table-condensed table-striped tableview dataTable">
                <thead>
                    <tr>
                        <th class="text-center" width="45">No</th>      
                        <th width="200">Vendor</th>
                        <th width="200">Seal</th>
                        <th width="200">Vessel Name</th>
                        <th width="150">Voyage</th>         
                        <th width="150">Closing Date</th>                        
                        <th width="60" class="text-center">Aksi</th>        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="7" class="text-center">
                            <h3>Tidak Ada Data!</h3>
                        </td>
                    </tr>
                </tbody>
            </table>
            @endif

        </div>
    </div>
</div>
<div class="box box-primary">
    <div class="box-body">
        <div class="col-md-12" style="padding-bottom: 10px;">
            <div class="no-padding col-xs-6 clearfix" >
                <a href="{{ route('order_additional_cost.create') }}?order={{ $order }}&type={{ $type }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>      
            </div>
            <div class="no-padding col-xs-6 ">            

            </div>
        </div>
        <div class="col-md-12">            
            @if($additionals->count())
            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap tableview">
                <thead>
                    <tr>
                        <th class="text-center" width="45">No</th>                
                        <th width="200">Name</th>
                        <th width="200">Tarif</th>                          
                        <th width="60" class="text-center">Aksi</th>                           
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1 ?>
                    @foreach($additionals as $additional)
                    <tr>
                        <td class="text-right">{{ $i++ }}</td>                            
                        <td>{{ $additional->name }}</td>                        
                        <td>{{ rupiah($additional->tarif) }}</td>                        
                        <td class="text-center">                            
                            <a title="Edit" class="text-black action-icon" href="{{ route('order_additional_cost.edit', $additional->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                            <form action="{{ route('order_additional_cost.destroy', $additional->id) }}" method="POST" style="display: inline;" onsubmit="if (confirm('Anda yakin ingin menghapus data?')) {
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{--            <div class="row">                        
                <div class="col-sm-3 footer-left">       
                    <form class="form-inline pull-left" id='form_viewed' method="get" >                             
                        {!! Form::select('view', array( 20 => '20', 50 => '50', 100 => '100', ), $view, array('class' => 'form-control', 'id' => 'jumlah_baris', 'onchange'=>'$("#form_viewed").submit()')); !!}
                    </form>&nbsp;&nbsp;Jumlah data: {{ $total }}
                </div>
                <div class="col-sm-9" style="padding: 0;margin: 0;text-align: right;">{!! $orders->appends(['view' => $view ])->render() !!}</div>


            </div>--}}
            @else
            <table class="table table-condensed table-striped tableview dataTable">
                <thead>
                    <tr>
                        <th class="text-center" width="45">No</th>                
                        <th width="200">Name</th>
                        <th width="200">Tarif</th>                          
                        <th width="60" class="text-center">Aksi</th>    
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4" class="text-center">
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