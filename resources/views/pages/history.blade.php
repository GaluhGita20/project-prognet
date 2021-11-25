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
        <li class="breadcrumb-item active"><a href="{{Route('list-history')}}">History</a></li>
      </ol>
    </div>
    <!-- row -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
              <h4 class="card-title">Log History</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="example" class="display min-w850">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Log</th>
                    <th>Created At</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($histories as $history)
                  <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$history->log}}</td>
                    <td>{{$history->created_at}}</td>
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Log</th>
                    <th>Created At</th>
                  </tr>
                </tfoot>
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

    