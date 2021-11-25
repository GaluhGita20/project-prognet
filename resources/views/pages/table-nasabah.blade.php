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
            <li class="breadcrumb-item active"><a href="{{Route('home')}}">Nasabah</a></li>
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
                <h4 class="card-title">Table Nasabah</h4>
                <a href="{{Route('add_nasabah')}}"><div class="btn btn-primary">+ Add Data Nasabah</div></a>
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
                  @if($nasabahs->count()== 0)
                    <tr class="text-center">
                      <td colspan="10">Theres no nasabah found on  database</td>
                    </tr>
                  @endif
                  @foreach($nasabahs as $nasabah)
                  <tr>
                    <td>{{$loop->index+1}}</td>
                    <td class="sorting_1"><img class="rounded-circle" src="{{asset('../storage/'.$nasabah->file)}}" alt="" style="display:block; margin-left:auto;margin-right:auto; width:40px; height:40px;"></td>
                    <td>{{$nasabah->name}}</td>
                    <td>{{$nasabah->alamat}}</td>
                    <td>{{$nasabah->no_ktp}}</td>
                    <td>{{$nasabah->telepon}}</td>
                    @if($nasabah->status_aktif == 'Nonaktif')
                    <td><span class="badge badge-danger">{{$nasabah->status_aktif}}</span></td>
                    @else
                    <td><span class="badge badge-primary">{{$nasabah->status_aktif}}</span></td>
                    @endif  
                    <td>Rp. {{$nasabah->saldo}}</td>
                    <td>{{$nasabah->created_at->format('d/m/y')}}</td>
                    <td>
                      <div class="d-flex">
                        <a href="{{Route('edit_nasabah', $nasabah->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                        <div class="sweetalert">
                          <form action="{{Route('delete_nasabah', $nasabah->id)}}" method="POST">
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

    