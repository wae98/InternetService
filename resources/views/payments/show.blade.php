@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Pago</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a class="btn btn-primary" href="{{ route('paymentservices.index') }}"> Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                            <div class="modal-body">
                                <div class="form-group">
                                    <strong>CLIENTE: </strong>{{$payments->serviceprovider->customer->names}}
                                </div>
                                <div class="form-group">
                                    <strong>SERVICIO: </strong>{{$payments->serviceprovider->service->name}}
                                </div>
                                <div class="form-group">
                                    <strong>FECHA INICIAL: </strong>{{$payments->init_date}}
                                </div>
                                <div class="form-group">
                                    <strong>FECHA FINAL: </strong>{{$payments->end_date}}
                                </div>
                                <div class="form-group">
                                    <strong>REGISTRADO POR: </strong>{{$payments->user->name}}
                                </div>
                                <div class="form-group">
                                    <strong>FECHA DE REGISTRO: </strong>{{$payments->created_at}}
                                </div>
                                <div class="form-group">
                                    <strong>OBSERVACIONES: </strong>{{$payments->observations}}
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
