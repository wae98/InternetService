@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Visualizar Cliente</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a class="btn btn-primary" href="{{ route('customers.index') }}"> Back</a>
                        </h3>
                    </div>
                    <div class="card-body">

                            <div class="modal-body">
                                <div class="form-group">
                                    <strong>NOMBRES Y APELLIDOS: </strong>{{$customers->names}}
                                </div>
                                <div class="form-group">
                                    <strong>NUMERO DE TELEFONO: </strong>{{$customers->phone_number}}
                                </div>
                                <div class="form-group">
                                    <strong>DIRECCION: </strong>{{$customers->address}}
                                </div>
                                <div class="form-group">
                                    <strong>REFERENCIA: </strong>{{$customers->references_address}}
                                </div>
                                <div class="form-group">
                                    <strong>SECTOR: </strong>{{$customers->sector->name}}
                                </div>
                            </div>
                            <div class="table-responsive-sm">
                                <table id="routers" class="table table-bordered table-striped" style="width: 100%" >
                                    <thead>
                                    <tr>
                                        <th colspan="3" style="text-align: center">REFERENCIAS PERSONALES</th>
                                    </tr>
                                    <tr>
                                        <th>NOMBRES Y APELLIDOS</th>
                                        <th>NUMERO DE TELEFONO</th>
                                        <th>ACCIONES</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($customers->personalreference as $reference)
                                        <tr>
                                            <td> {{ $reference->names }} </td>
                                            <td> {{ $reference->phone_number }} </td>
                                            <td>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>

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
