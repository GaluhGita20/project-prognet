<?php
  $title="PROGNET - TRANSAKSI SIMPANAN";
?>

@extends('layouts.template')
@section('content')
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
  <div class="container-fluid">
    <div class="page-titles">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
        <li class="breadcrumb-item active"><a href="{{Route('list-bunga')}}">Bunga</a></li>
      </ol>
    </div>
    @if(session()->has('success'))
    <div class="alert alert-success mt-2">
            {{ session()->get('success') }}
        </div>
    @endif
    <!-- row -->
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
            <h4 class="card-title">Table Bunga</h4>
            <a href="{{Route('add_bunga')}}"><div class="btn btn-primary">+ Add Data Bunga</div></a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-responsive-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Bulan</th>
                  <th>Tahun</th>
                  <th>Nasabah Id</th>
                  <th>Nominal Bunga (%)</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @if($bungas->count()== 0)
                <tr class="text-center">
                  <td colspan="7">Theres no bunga found on  database</td>
                </tr>
              @endif
              @foreach($bungas as $bunga)
              <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$bunga->bulan}}</td>
                <td>{{$bunga->tahun}}</td>
                <td>{{$bunga->nasabah_id}}</td>
                <td>{{$bunga->nominal_bunga}}</td>
                <td>{{$bunga->created_at}}</td>
                <td>
                  <div class="d-flex">
                    <a href="{{Route('edit_bunga', $bunga->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                    <div class="sweetalert">
                      <form action="{{Route('delete_bunga', $bunga->id)}}" method="POST">
                        @csrf
                        <button type="submit"   onclick="return confirm('Yakin Ingin Mengapus Data?')" class="btn btn-danger shadow btn-xs sharp sweet-success-cancel"><i class="fa fa-trash"></i></button>                 
                      </form>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--**********************************
    Content body end
***********************************-->
@endsection

    