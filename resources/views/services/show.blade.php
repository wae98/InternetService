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
                            <a class="btn btn-primary" href="{{ route('services.index') }}"> Atras</a>
                        </h3>
                    </div>
                    <div class="card-body">
                            <div class="modal-body">
                                <div class="form-group">
                                    <strong>NOMBRE: </strong>{{$services->name}}
                                </div>
                                <div class="form-group">
                                    <strong>PRECIO: </strong>{{$services->price}}
                                </div>
                                <div class="form-group">
                                    <strong>DESCRIPCION: </strong>{{$services->description}}
                                </div>

                                <div class="form-group">
                                    <strong>TIPO DE CABLE: </strong>{{$services->cabletype->name}}
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
