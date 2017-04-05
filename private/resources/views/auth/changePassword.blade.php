@extends('layout-form')

@section('header')
<h1>Change Password<small> Be sure to always remember your password</small></h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Change Password</li>
</ol>
@endsection

@section('content')
@include('error')
<div class="row">
    <div class="col-md-12">            
        <form class="form-horizontal" method="POST" autocomplete="off">
            <div class="box-body no-padding col-md-12 margin-bottom">
                {{ csrf_field() }}
                <div class="box no-border">
                    <table class="table-form">        
                        <tr class="<?php if ($errors->has('password')) echo "has-error" ?>">
                            <td>
                                <label>Password Baru</label>
                            </td>
                            <td>   
                                <div class="col-sm-7">
                                    <input type="password" name="password" value="" class="form-control" required>
                                    <span class="help-block color-black">
                                        Minimal 6 karakter.
                                    </span>

                                    @if($errors->has("password"))
                                    <span class="help-block">{{ $errors->first("password") }}</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        <tr class="<?php if ($errors->has('password_repeat')) echo "has-error" ?>">
                            <td>
                                <label>Ulangi Password</label>
                            </td>
                            <td>   
                                <div class="col-sm-7">
                                    <input type="password" name="password_repeat" value="" class="form-control" required>
                                    <span class="help-block color-black">
                                        Inputan harus sama dengan kolom <b>Password Baru</b>.
                                    </span>

                                    @if($errors->has("password_repeat"))
                                    <span class="help-block">{{ $errors->first("password_repeat") }}</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-12 page-table-footer footer-white">
                        <div class="col-sm-3 tj-footer-left">
                            <a class="btn btn-default" href="{{ route('pegawai.index') }}">Batal</a>
                        </div>
                        <div class="col-sm-9 tj-footer-right">
                            <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>            
        </form>
    </div>
</div>
@endsection