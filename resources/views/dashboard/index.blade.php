@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@stop


@section('content')
<div class="card">

  <div class="card-header">
    <h3>Bienvenido {{auth()->user()->name}} </h3>
  </div>
  @can('dashboard')
  <div class="card-body">

    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-md-6 col-12">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>10</h3>

              <p>Numero total de colaboradores</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="" class="small-box-footer">Ver colaboradores <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-md-6 col-12">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>20</h3>

              <p>Nuevos Colaboradores </p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a class="small-box-footer">Ultimos 30 dias </a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-md-6 col-12">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>22</h3>

              <p>Nuevos Colaboradores</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a class="small-box-footer"> Nuevos Colaboradores en {{date("Y")}} </a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-md-6 col-12">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>Q. 100</h3>

              <p>Total de Egresos</p>
            </div>
            <div class="icon">
              <i class="fas fa-money-bill-alt"></i>
            </div>
            <a href="/" class="small-box-footer"> Total Egresos en {{date("Y")}} </a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </div>
  </div>
  @endcan
</div>
@stop

@section('footer')
      <div class="text-center">
          <p class="alert" style="background-color: rgba(255,255,255,0.7); color:teal; font-size:10px;"><strong>- WALTER BAMAC - TODOS LOS DERECHOS RESERVADOS © 2022</strong></p>
      </div>
 @endsection

@section('js')
@endsection
