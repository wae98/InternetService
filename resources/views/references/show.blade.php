@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Referencias Personales</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a class="btn btn-primary" href="{{ route('references.index') }}"> Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                            <div class="modal-body">
                                <div class="form-group">
                                    <strong>NOMBRES Y APELLIDOS: </strong>{{$references->names}}
                                </div>
                                <div class="form-group">
                                    <strong>NUMERO DE TELEFONO: </strong>{{$references->phone_number}}
                                </div>
                                <div class="form-group">
                                    <strong>REFERENCIA DE: </strong>{{$references->customer->names}}
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
