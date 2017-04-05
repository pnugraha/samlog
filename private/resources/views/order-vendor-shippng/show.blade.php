@extends('layout')

@section('header')
	<div class="page-header clearfix">
        <h1>Users / Show #{{ $pegawai->id }}
        </h1>

        <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-default" href="{{ route('pegawai.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                <a class="btn btn-warning btn-group" role="group" href="{{ route('pegawai.edit', $pegawai->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
	<div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                	<label for="title">Nama</label>
                 	<p class="form-control-static">{{ $pegawai->nama }}</p>
                </div>
                <div class="form-group">
                    <label for="title">NIP</label>
                    <p class="form-control-static">{{ $pegawai->nip }}</p>
                </div>
                <div class="form-group">
                    <label for="body">SKPD</label>
                    <p class="form-control-static">{{ $pegawai->skpd }}</p>
                </div>
                <div class="form-group">
                    <label for="body">Unit Kerja</label>
                    <p class="form-control-static">{{ $pegawai->unit_kerja }}</p>
                </div>     
                <div class="form-group">
                    <label for="body">Bagian</label>
                    <p class="form-control-static">{{ $pegawai->bagian }}</p>
                </div>
                <div class="form-group">
                    <label for="body">Jabatan</label>
                    <p class="form-control-static">{{ $pegawai->jabatan }}</p>
                </div>
                <div class="form-group">
                    <label for="body">Jenis Jabatan</label>
                    <p class="form-control-static">{{ $pegawai->jenis_jabatan }}</p>
                </div>
                <div class="form-group">
                    <label for="body">Eselon</label>
                    <p class="form-control-static">{{ $pegawai->eselon }}</p>
                </div>
                <div class="form-group">
                    <label for="body">Golongan</label>
                    <p class="form-control-static">{{ $pegawai->golongan }}</p>
                </div>
            </form>

        </div>
    </div>
@endsection