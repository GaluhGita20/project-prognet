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
@foreach($nasabahs as $nasabah)
<div class="content-body">
  <div class="container-fluid">
    <div class="page-titles">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item"><a href="{{Route('list-transaksi-user', $nasabah->id)}}">Transaksi</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Create Data</a></li>
      </ol>
    </div>
    @if(session()->has('success'))
    <div class="alert alert-success mt-2">
        {{ session()->get('success') }}
    </div>
    @endif
    <!-- row -->
    <div class="row">
      <div class="col-xl-12 col-xxl-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Form Data Transaksi</h4>
          </div>
          <div class="card-body">
            <form action="{{Route('savecreate_trx')}}" method="POST" id="step-form-horizontal" class="step-form-horizontal" enctype="multipart/form-data">
              @csrf
              <div>
                <section>
                  <div class="row">
                    <div class="col-lg-12 mb-2">
                      <div class="form-group">
                        <label class="text-label">Jenis Transaksi*</label>
                        <div class="dropdown bootstrap-select form-control dropup">
                          <select name="jenis_trx" id="jenis_trx" class="form-control" tabindex="-98">
                            <option selected value="" disabled>Pilih jenis transaksi</option>
                            <option value="Simpanan">Simpanan</option>
                            <option value="Penarikan">Penarikan</option>
                            <option value="Koreksi">Koreksi</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 mb-2">
                      <div class="form-group">
                        <label class="text-label">Id Nasabah*</label>
                        <input type="text" class="form-control" id="nasabah_id" name="nasabah_id" aria-describedby="inputGroupPrepend2" value="{{$nasabah->id}}" readonly>
                      </div>        
                    </div>
                    <div class="col-lg-6 mb-2">
                      <div class="form-group">
                        <label class="text-label">Tanggal*</label>
                        <input type="datetime-local" class="form-control" aria-describedby="inputGroupPrepend2" value="<?php echo strftime('%Y-%m-%dT%H:%M:%S', time()); ?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-12 mb-2">
                      <div class="form-group">
                        <label class="text-label">Nominal Transaksi*</label>
                        <input type="text" class="form-control" id="nominal_transaksi" name="nominal_trx" aria-describedby="inputGroupPrepend2" placeholder="Rp.0,00" required>
                        <p>Rp.<label class="text-label" id="real_nominal_transaksi">0</label>,00</p>
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
@endforeach
<script type="text/javascript">
var rupiah = document.getElementById("nominal_transaksi");
const nominalReal = document.getElementById("real_nominal_transaksi");
rupiah.addEventListener("input", function(e) {
  // tambahkan 'Rp.' pada saat form di ketik
  // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
  // nominalReal.innerHTML = this.value;
  nominalReal.innerHTML = formatRupiah(this.value);
  
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}
</script>

<!--**********************************
    Content body end
***********************************-->
@endsection