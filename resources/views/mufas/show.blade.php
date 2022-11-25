@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Servicios</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a class="btn btn-primary" href="{{ route('mufas.index') }}"> Atras</a>
                        </h3>
                    </div>
                    <div class="card-body">
                            <div class="modal-body">
                                <div class="form-group">
                                    <strong>UBICACION MUFA: </strong>{{$mufas->ubication}}
                                </div>
                                <div class="form-group">
                                    <strong>NUMERO DE MUFA: </strong>{{$mufas->number}}
                                </div>
                                <div class="form-group">
                                    <strong>CABLE DE MUFA ONU: </strong>{{$mufas->is_cable_onu}}
                                </div>
                                <div class="form-group">
                                    <strong>POSICION MUFA ONU: </strong>{{$mufas->position_onu_olt}}
                                </div>
                                <div class="form-group">
                                    <strong>NUMERO DE CONEXION: </strong>{{$mufas->number_conexion}}
                                </div>

                            </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@stop
