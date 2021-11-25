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
            <li class="breadcrumb-item active"><a href="{{Route('home')}}">Transaksi</a></li>
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
                <h4 class="card-title">Table Transaksi</h4>
                <a href="#"><div class="btn btn-primary">+ Add Data Transaksi</div></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-responsive-sm">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Alamat</th>
                      <th>No. KTP</th>
                      <th>Telepon</th>
                      <th>Status</th>
                      <th>Saldo</th>
                      <th>Join</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if($transaksis->count()== 0)
                    <tr class="text-center">
                      <td colspan="10">Theres no transaksi found on  database</td>
                    </tr>
                  @endif
                  @foreach($transaksis as $transaksi)
                  <tr>
                    <td>{{$loop->index+1}}</td>
                    <td class="sorting_1"><img class="rounded-circle" src="{{asset('../storage/'.$transaksi->file)}}" alt="" style="display:block; margin-left:auto;margin-right:auto; width:40px; height:40px;"></td>
                    <td>{{$transaksi->name}}</td>
                    <td>{{$transaksi->alamat}}</td>
                    <td>{{$transaksi->no_ktp}}</td>
                    <td>{{$transaksi->telepon}}</td>
                    @if($transaksi->status_aktif == 'Nonaktif')
                    <td><span class="badge badge-danger">{{$transaksi->status_aktif}}</span></td>
                    @else
                    <td><span class="badge badge-primary">{{$transaksi->status_aktif}}</span></td>
                    @endif  
                    <td>Rp. {{$transaksi->saldo}}</td>
                    <td>{{$transaksi->created_at->format('d/m/y')}}</td>
                    <td>
                      <div class="d-flex">
                        <a href="{{Route('edit_transaksi', $transaksi->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                        <div class="sweetalert">
                          <form action="{{Route('delete_transaksi', $transaksi->id)}}" method="POST">
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

    