@extends('template.layout')

@section('header')	
<h1>Company</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Company</li>
</ol>
@endsection

@section('content')
<div class="box box-primary">
    <div class="box-body">
        <div class="col-md-12" style="padding-bottom: 10px;">
            <div class="no-padding col-xs-6 clearfix" >
                <a href="{{ route('company.create') }}?type={{ $type }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>      
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
            @if($companies->count())
            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap tableview">
                <thead>
                    <tr>
                        <th class="text-center" width="45">No</th>                
                        <th width="50">Name</th>
                        <th width="150">Phone</th>
                        <th width="150">PIC (1)</th>         
                        <th width="150">HP (1)</th>   
                        <th width="150">Email (1)</th> 
                        <th width="100">NPWP</th> 
                        <th width="60" class="text-center">Aksi</th>
                        <th width="30" class="text-center">Vendor</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = $companies->firstItem() ?>
                    @foreach($companies as $company)
                    <tr>
                        <td class="text-right">{{ $i++ }}</td>                            
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->phone }}</td>
                        <td>{{ $company->pic1 }}</td>
                        <td>{{ $company->hp1 }}</td>  
                        <td>{{ $company->email1 }}</td>
                        <td>{{ $company->npwp }}</td>  
                        <td class="text-center">                            
                            <a title="Edit" class="text-black action-icon" href="{{ route('company.edit', $company->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                            <form action="{{ route('company.destroy', $company->id) }}" method="POST" style="display: inline;" onsubmit="if (confirm('Anda yakin ingin menghapus data?')) {
                                                return true
                                            } else {
                                                return false
                                            }
                                            ;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                {!! Form::input('hidden', 'type', $type , ['class'=> 'form-control']) !!}
                                <button style="border:0; background:none;margin-left: -5px;" title="Hapus" type="submit" class="text-btn text-black action-icon"><i class="fa fa-trash-o"></i></button>
                            </form>                            
                        </td>
                        <td class="text-center">
                            <a title="Additional Cost" class="text-black action-icon" href="{{ route('additional_cost.index', $company->id) }}?type={{$type}}"><i class="fa fa-usd"></i></a>
                            <a title="Service" class="text-black action-icon" href="{{ route('service.index', $company->id) }}?type={{$company->type}}"><i class="fa fa-paper-plane"></i></a>
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
                    <div class="col-sm-9" style="padding: 0;margin: 0;text-align: right;">{!! $companies->appends(['view' => $view, 'nama' => $nama ])->render() !!}</div>
                

            </div>
            @else
            <table class="table table-condensed table-striped tableview dataTable">
                <thead>
                    <tr>
                        <th class="text-center" width="45">No</th>                
                        <th width="50">Name</th>
                        <th width="150">Phone</th>
                        <th width="150">PIC (1)</th>         
                        <th width="150">HP (1)</th>   
                        <th width="150">Email (1)</th> 
                        <th width="100">NPWP</th> 
                        <th width="60" class="text-center">Aksi</th>
                        <th width="30" class="text-center">Vendor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="9" class="text-center">
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