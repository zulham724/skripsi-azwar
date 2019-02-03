@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Laporan<small> analisis perbandingan long polling dan websocket</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection

@section('content')
  
  <section class="container-fluid">
    @if($login == 'true')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">{{ trans('backpack::base.login_status') }}</div>
                </div>
                <div class="box-body">{{ trans('backpack::base.logged_in') }}</div>
            </div>
        </div>
    </div>
    @endif

    <comparison-table-component></comparison-table-component>

    <div class="row" style="padding-top: 50px;">
        <div class="col-md-6">
            <div class="alert alert-warning">
              <strong>Kecepatan!</strong> perbandingan lamanya pengiriman data, dengan satuan milisecond semakin kecil nilainya berati semakin cepat pengirimannya.
            </div>
              
            <comparison-date-component :height="300"></comparison-date-component>
           
        </div>
        <div class="col-md-6">
            <div class="alert alert-info">
              <strong>Bandwidth!</strong> perbandingan penggunaan internet dalam bentuk byte.
            </div>

            <comparison-bandwidth-component :height="300"></comparison-bandwidth-component>
              
        </div>
    </div>

    <div class="row" style="padding-top: 50px;">
        <div class="col-md-6">
            <div class="alert alert-success">
              <strong>Memory!</strong> Estimasi penggunaan RAM pada hardware.
            </div>

            <comparison-memory-component :height="300"></comparison-memory-component>

        </div>

        <div class="col-md-6">
            <div class="alert alert-danger">
              <strong>CPU!</strong> Estimasi beban CPU pada hardware.
            </div>

            <comparison-cpu-component :height="300"></comparison-cpu-component>
            
        </div>
    </div>

  </section>

@endsection

@section('after_scripts')
<script type="text/javascript">

  $(()=>{
    if({!! $login !!}){
      swal('Halo','Kamu telah berhasil Login','success');
    }
  });

</script>
@endsection
