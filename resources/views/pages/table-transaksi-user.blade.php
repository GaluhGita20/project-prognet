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
        <li class="breadcrumb-item"><a href="javascript:void(0)">Transaksi</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Cari Nasabah</a></li>
      </ol>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="dataTables_length" id="example_length" >
          <label>Show 
            <div class="dropdown bootstrap-select">
              <select name="example_length" aria-controls="example" class="" tabindex="-98">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
              </select>
            </div> entries
          </label>
        </div>
      </div>
      <div class="col-md-6" >
        <div id="example_filter" class="col-6 dataTables_filter" style=" float:right">
          <label>Search:<input type="search" class="" placeholder="" aria-controls="example" style="border:1px solid #e2e2e2; padding: .3rem 0.5rem; color: #715d5d; border-radius:5px; margin-left: 0.5em"></label>
        </div>
      </div>
    </div>
    <div class="row" style="width:100%">
      @foreach ($nasabahs as $nasabah)
      <a href="{{Route('list-transaksi-user', $nasabah->id)}}"><div class="col-xl-2 col-lg-6 col-md-6 col-sm-6">
        <div class="card" style="cursor:pointer">
          <div class="card-body">
            <div class="new-arrival-product">
              <div class="new-arrivals-img-contnent">
                  <a href="{{Route('list-transaksi-user', $nasabah->id)}}"><img class="img-fluid" src="{{asset('../storage/'.$nasabah->file)}}" style="width:100%; height:150px;" alt=""></a>
              </div>
              <div class="new-arrival-content text-center mt-3">
                <h4><a href="#" class="text-black">{{$nasabah->name}}</a></h4>
                <span class="price">{{$nasabah->id}}</span>
              </div>
            </div>
          </div>
        </div>
      </div></a>
      @endforeach
    </div>
  </div>
</div>
<!--**********************************
    Content body end
***********************************-->
@endsection

    