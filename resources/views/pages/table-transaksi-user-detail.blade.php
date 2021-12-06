<?php
  $title="PROGNET - TRANSAKSI SIMPANAN";
  $debit=0;
  $kredit=0;
  $saldo=0;

  function rupiah ($angka) {
    $hasil = 'Rp ' . number_format($angka, 0, ",", ".");
    return $hasil;
  }
?>

@extends('layouts.template')
@section('content')
<!--**********************************
    Content body start
***********************************-->
@foreach($nasabahs as $nasabah)
<div class="content-body">
  <div class="container-fluid">
    <div class="page-titles">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Transaksi</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail Transaksi</a></li>
      </ol>
    </div>
    <!-- row -->
    <div class="row">
      <!-- Baris pertama -->
      <div class="col-xl-4 col-lg-6 col-sm-6 col-xxl-4">
        <div class="widget-stat card">
          <div class="card-body p-4">
            <div class="media ai-icon">
              <span class="mr-3 bgl-primary text-primary">
                <!-- <i class="ti-user"></i> -->
                <svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                  <line x1="12" y1="1" x2="12" y2="23"></line>
                  <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                </svg>
              </span>
              <div class="media-body">
                <p class="mb-1">Saldo</p>
                <h4 class="mb-0"><?php echo rupiah($nasabah->saldo); ?></h4>
                <span class="badge badge-primary"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-6 col-sm-6 col-xxl-4">
        <div class="widget-stat card">
          <div class="card-body p-4">
            <div class="media ai-icon">
              <span class="mr-3 bgl-warning text-warning">
                <svg id="icon-orders" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                  <polyline points="14 2 14 8 20 8"></polyline>
                  <line x1="16" y1="13" x2="8" y2="13"></line>
                  <line x1="16" y1="17" x2="8" y2="17"></line>
                  <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
              </span>
              <div class="media-body">
                <p class="mb-1">Jumlah Transaksi</p>
                <h4 class="mb-0">0</h4>
                <span class="badge badge-warning"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-6 col-sm-6 col-xxl-4">
        <div class="widget-stat card">
          <div class="card-body  p-4">
            <div class="media ai-icon">
              <span class="mr-3 bgl-danger text-danger">
                <svg id="icon-database-widget" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database">
                  <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                  <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                  <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                </svg>
              </span>
              <div class="media-body">
                <p class="mb-1">Bunga Terakhir Tercatat</p>
                <h4 class="mb-0">Rp.0,00</h4>
                <span class="badge badge-danger">+%</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <!-- Baris kedua -->
      <div class="col-xl-4 col-lg-12 col-sm-12">
        <div class="card overflow-hidden">
          <div class="text-center p-3 overlay-box " style="background:white!important;">
            <div class="profile-photo">
              <img src="{{asset('../storage/'.$nasabah->file)}}" width="200" class="img-fluid rounded-circle" alt="">
            </div>
            <h3 class="mt-3 mb-1 text-white">{{$nasabah->name}}</h3>
            <p class="text-white mb-0">Nasabah</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Status</span> <strong class="text-muted">{{$nasabah->status_aktif}}	</strong></li>
            <li class="list-group-item d-flex justify-content-between"><span class="mb-0">No. KTP</span> 		<strong class="text-muted">{{$nasabah->no_ktp}}	</strong></li>
            <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Telepon</span> <strong class="text-muted">{{$nasabah->telepon}}	</strong></li>
            <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Joined at</span> <strong class="text-muted">{{$nasabah->created_at->format('d/m/y')}}	</strong></li>
          </ul>
          <div class="card-footer border-0 mt-0">								
            <a href="{{Route('create_trx', $nasabah->id)}}"><button class="btn btn-primary btn-lg btn-block">
               Create Transaksi							
            </button></a>	
          </div>
        </div>
      </div>
      <div class="col-xl-8 col-xxl-8 col-lg-12 col-sm-12">
        <div id="user-activity" class="card">
          <div class="card-header border-0 pb-0 d-sm-flex d-block">
            <h4 class="card-title">Visitor Activity</h4>
            <div class="card-action mb-sm-0 my-2">
              <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#user" role="tab">
                          Day
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#bounce" role="tab">
                          Month
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#session-duration" role="tab">
                          Year
                      </a>
                  </li>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="user" role="tabpanel">
                <canvas id="activity" class="chartjs"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Baris ketiga -->
      <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
        <div class="card">
          <div class="card-header">
              <h4 class="card-title">List Transaksi User</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive recentOrderTable">
              <table class="table verticle-middle table-responsive-md">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Debit</th>
                        <th scope="col">Kredit</th>
                        <th scope="col">Saldo</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jenis Transaksi</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>-</td>
                    <td>Rp.{{$debit}},00</td>
                    <td>Rp.{{$kredit}},00</td>
                    <td>Rp.{{$saldo}},00</td>
                    <td>-</td>
                    <td>-</td>
                    <td>
                      <div class="dropdown custom-dropdown mb-0">
                        <div class="btn sharp btn-primary tp-btn" data-toggle="dropdown">
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="12" cy="5" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="12" cy="19" r="2"/></g></svg>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javascript:void(0);">Details</a>
                            <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
                        </div>
                      </div>
                    </td>
                  </tr> 
                  @if($trxs->count()==0)
                    <tr class="text-center">
                      <td colspan="10">Theres no transaction found on  database</td>
                    </tr>
                  @endif
                  @foreach($trxs as $trx)
                  <tr>
                    <td>{{$trx->id}}</td>
                    <!-- Debit -->
                    @if($trx->jenis_trx == "Simpanan")
                    <td><?php echo rupiah($trx->nominal_trx);$saldo+=$trx->nominal_trx ?></td>
                    @else
                    <td>Rp.0,00</td>
                    @endif
                    <!-- Kredit -->
                    @if($trx->jenis_trx == "Penarikan")
                    <td><?php echo rupiah($trx->nominal_trx);$saldo-=$trx->nominal_trx ?>,00</td>
                    @else
                    <td>Rp.0,00</td>
                    @endif
                    <!-- Saldo -->
                    <td><?php echo rupiah($saldo); ?></td>
                    <td>{{$trx->tanggal}}</td>
                    <td>{{$trx->jenis_trx}}</td>
                    <td>
                      <div class="dropdown custom-dropdown mb-0">
                        <div class="btn sharp btn-primary tp-btn" data-toggle="dropdown">
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="12" cy="5" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="12" cy="19" r="2"/></g></svg>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javascript:void(0);">Details</a>
                            <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
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
</div>
@endforeach
<!--**********************************
    Content body end
***********************************-->
@endsection

    