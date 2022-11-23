@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon.png') }}">
@stop


@section('content')
<div class="card">

  <div class="card-header">
    <h3>Dashboard</h3>
  </div>
  @can('dashboard')
  <div class="card-body">
      <div class="pd-ltr-20">
          <div class="card-box pd-20 height-100-p mb-30">
              <div class="row align-items-center">
                  <div class="col-md-4">
                      <img  src="{{asset('vendor/adminlte/dist/img/banner.png')}}"  alt="">
                  </div>
                  <div class="col-md-8">
                      <h4 class="font-20 weight-500 mb-10 text-capitalize">
                          Bienvenid(@) <div class="weight-600 font-30 text-blue">{{ Auth::user()->name }}</div>
                      </h4>
                      <p class="font-18 max-width-600">Estas en el sistema gestor de servicios internet.</p>
                  </div>
              </div>
          </div>
      </div>
  @endcan
</div>
@stop
