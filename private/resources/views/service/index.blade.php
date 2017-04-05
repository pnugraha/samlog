@extends('template.layout')

@section('header')	
<h1>Service</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    @if($company == '1')
    <li><a href="{{ route('company.index') }}"> Company</a></li>
    @elseif($company == '2')
    <li><a href="{{ route('company.index_trucking') }}">  Vendor</a></li>
    @elseif($company == '3')
    <li><a href="{{ route('company.index_shipping') }}">  Vendor</a></li>
    @elseif($company == '4')
    <li><a href="{{ route('company.index_dooring') }}"> Vendor</a></li>
    @endif
    <li class="active">Service</li>
</ol>
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-body">
        <div class="col-md-12" style="padding-bottom: 10px;">
            <div class="no-padding col-xs-6 clearfix" >
                <a href="{{ route('service.create') }}?company={{ $company }}&type={{ $type }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>      
            </div>
            <div class="no-padding col-xs-6 ">            
                <form class="form-inline pull-right" method="get" id="form-cari">
                    <div class="search-box">
                        <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $nama }}" >    
                        <input type="hidden" name="view" class="form-control" value="{{ $view }}" >
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-12">            
            @if($services->count())
            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap tableview">
                <thead>
                    <tr>
                        <th class="text-center" width="45">No</th>                
                        <th width="200">Pick Up</th>
                        <th width="200">Delivery</th>
                        <th width="150">Port Of Loading</th> 
                        <th width="150">Port Of Discharge</th> 
                        @if($type == '3')
                        <th width="150">Ocean Freight</th> 
                        @else 
                        <th width="150">Tarif</th> 
                        @endif
                        <th width="60" class="text-center">Aksi</th>                        
                    </tr>
                </thead>

                <tbody>
                    <?php $i = $services->firstItem() ?>
                    @foreach($services as $service)
                    <tr>
                        <td class="text-right">{{ $i++ }}</td>                            
                        <td>{{ $service->pick_up }}</td>
                        <td>{{ $service->delivery }}</td>
                        <td>{{ $service->pol }}</td>       
                        <td>{{ $service->pod }}</td>
                        <td>{{ rupiah($service->tarif) }}</td>
                        <td class="text-center">                            
                            <a title="Edit" class="text-black action-icon" href="{{ route('service.edit', $service->id) }}?type={{ $type }}"><i class="fa fa-pencil-square-o"></i></a>
                            <form action="{{ route('service.destroy', $service->id) }}?type={{ $type }}" method="POST" style="display: inline;" onsubmit="if (confirm('Anda yakin ingin menghapus data?')) {
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
                <div class="col-sm-9" style="padding: 0;margin: 0;text-align: right;">{!! $services->appends(['view' => $view, 'nama' => $nama, 'type' => $type ])->render() !!}</div>


            </div>
            @else
            <table class="table table-condensed table-striped tableview dataTable">
                <thead>
                    <tr>
                        <th class="text-center" width="45">No</th>                
                        <th width="200">Pick Up</th>
                        <th width="200">Delivery</th>
                        <th width="150">Port Of Loading</th> 
                        <th width="150">Port Of Discharge</th> 
                        <th width="150">Tarif</th> 
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

@endsection