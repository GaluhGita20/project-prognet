<?php
  $title="PROGNET - TRANSAKSI SIMPANAN | Edit Nasabah";
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
          <li class="breadcrumb-item"><a href="{{Route('home')}}">Nasabah</a></li>
          <li class="breadcrumb-item active"><a href="#">Edit Data</a></li>
        </ol>
      </div>
      <!-- row -->
      <div class="row">
        <div class="col-xl-12 col-xxl-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Form Data Nasabah</h4>
            </div>
            <div class="card-body">
              <form action="{{Route('update_nasabah', $nasabah->id)}}" method="POST" id="step-form-horizontal" class="step-form-horizontal" enctype="multipart/form-data">
                @csrf
                <div>
                  <section>
                    <div class="row">
                      <div class="col-lg-12 mb-2">
                        <div class="form-group">
                            <label class="text-label">Name*</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$nasabah->name}}" required>
                        </div>
                      </div>
                      <div class="col-lg-12 mb-2">
                        <div class="form-group">
                            <label class="text-label">Alamat*</label>
                            <textarea class="form-control" rows="2" id="alamat" name="alamat" >{{$nasabah->alamat}}</textarea>
                        </div>
                      </div>
                      <div class="col-lg-6 mb-2">
                          <div class="form-group">
                              <label class="text-label">No. KTP*</label>
                              <input type="text" class="form-control" id="no_ktp" name="no_ktp" aria-describedby="inputGroupPrepend2" value="{{$nasabah->no_ktp}}" required>
                          </div>
                      </div>
                      <div class="col-lg-6 mb-2">
                        <div class="form-group">
                          <label class="text-label">Phone Number*</label>
                          <input type="text" class="form-control" id="telepon" name="telepon" aria-describedby="inputGroupPrepend2" value="{{$nasabah->telepon}}" required>
                        </div>
                      </div>
                      <div class="col-lg-12 mb-3">
                        <div class="form-group">
                          <label class="text-label">Status*</label>
                          <div class="dropdown bootstrap-select form-control dropup">
                            <select name="status_aktif" id="status_aktif" class="form-control" tabindex="-98">
                            <option value="" disabled>Status Aktif/Nonaktif</option>
                              <option {{$nasabah->status_aktif == 'Aktif' ? 'selected' : ''}} value="Aktif">Aktif</option>
                              <option {{$nasabah->status_aktif == 'Nonaktif' ? 'selected' : ''}} value="Nonaktif">Nonaktif</option>
                              <!-- <option>4</option> -->
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12 mb-3">
                        <div class="form-group">
                          <label class="text-label">Photo*</label>
                          <img src="{{asset('../storage/'.$nasabah->file)}}" class="img-thumbnail row mb-3" id="update_image_nasabah">
                          <div class="input-group mb-3">
                            <div class="custom-file">
                              <input type="text" class="form-control" id="check" name="check"  value="0" required style="display:none">
                              <input name="file" type="file" class="custom-file-input" id="foto_nasabah"  accept="image/*">
                              <label class="custom-file-label" id="custom-text">{{$nasabah->file}}</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12 mb-3">                     
                        <button type="submit" class="btn btn-primary" style="float:right;">Submit</button>  
                        <a href="{{Route('list-nasabah')}}" class="btn btn-info" style="float:left;">Back</a>                      
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
    const customTxt = document.getElementById("custom-text");
    const customImage = document.getElementById("update_image_nasabah");
    const customCheck = document.getElementById("check");
    realFileBtn.addEventListener("change", function(){
      if(realFileBtn.value){
        customTxt.innerHTML = realFileBtn.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
        customImage.style.display= "none";
        check.value = 1;
      }
    });
  </script>
  <!--**********************************
      Content body end
  ***********************************-->
@endsection