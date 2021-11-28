<?php
  $title="PROGNET - TRANSAKSI SIMPANAN | Create Nasabah";
  $namaBulans = array("Januari","Februaru","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
  $listTahuns = array("2020", "2021", "2022");
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
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item"><a href="{{Route('list-bunga')}}">Bunga</a></li>
        <li class="breadcrumb-item active"><a href="{{Route('add_bunga')}}">Create Data</a></li>
      </ol>
    </div>
    <!-- row -->
    <div class="row">
      <div class="col-xl-12 col-xxl-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Form Data Bunga</h4>
          </div>
          <div class="card-body">
            <form action="{{Route('save_newbunga')}}" method="POST" id="step-form-horizontal" class="step-form-horizontal" enctype="multipart/form-data">
              @csrf
              <div>
                <section>
                  <div class="row">
                    <div class="col-lg-6 mb-2">
                      <div class="form-group">
                        <label class="text-label">Bulan*</label>
                        <div class="dropdown bootstrap-select form-control dropup">
                          <select name="bulan" id="bulan" class="form-control" tabindex="-98">
                            <option selected value="" disabled>Pilih bulan dari transaksi bunga</option>
                            @foreach($namaBulans as $namaBulan)
                              <option value="{{$loop->index+1}}">{{$namaBulan}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 mb-2">
                      <div class="form-group">
                          <label class="text-label">Tahun*</label>
                          <div class="dropdown bootstrap-select form-control dropup">
                          <select name="tahun" id="tahun" class="form-control" tabindex="-98">
                            <option selected value="" disabled>Pilih tahun dari transaksi bunga</option>
                            @foreach($listTahuns as $listTahun)
                              <option value="{{$loop->index+1}}">{{$listTahun}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 mb-2">
                      <div class="form-group">
                        <label class="text-label">Nasabah Id*</label>
                        <div class="dropdown bootstrap-select form-control dropup">
                          <select name="nasabah_id" id="nasabah_id" class="form-control" tabindex="-98">                    
                            @if($nasabahs->count() == 0)
                              <option selected value="" disabled>Theres no nasabah found on  database</option>
                            @else
                              <option selected value="" disabled>Pilih nasabah dari transaksi bunga</option>
                              @foreach($nasabahs as $nasabah)
                              <option value="{{$nasabah->id}}">{{$nasabah->name}}</option>
                              @endforeach
                            @endif    
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 mb-2">
                      <div class="form-group">
                        <label class="text-label">Nominal Bunga (%)*</label>
                        <input type="text" class="form-control" id="nominal_bunga" name="nominal_bunga" aria-describedby="inputGroupPrepend2" placeholder="0-100" required>
                      </div>
                    </div>
                    <div class="col-lg-12 mb-3">
                      <button type="submit" class="btn btn-primary" style="float:right;">Submit</button>
                    </div>
                  </div>
                </section>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  const realFileBtn = document.getElementById("foto_nasabah");
  const customTxt = document.getElementById("custom-text")

  realFileBtn.addEventListener("change", function(){
    if(realFileBtn.value){
      customTxt.innerHTML = realFileBtn.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
    }
  });
</script>

<!--**********************************
    Content body end
***********************************-->
@endsection