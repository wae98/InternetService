@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Servicio Adquirido</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a class="btn btn-primary" href="{{ route('servicesproviders.index') }}"> Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="modal-body">
                                    <h4>Datos del Cliente</h4>
                                    <div class="form-group">
                                        <strong>NOMBRE: </strong>{{$servicesproviders->customer->names}}
                                    </div>
                                    <div class="form-group">
                                        <strong>DIRECCION: </strong>{{$servicesproviders->customer->address}}
                                    </div>
                                    <div class="form-group">
                                        <strong>SECTOR: </strong>{{$servicesproviders->customer->sector->name}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-body">
                                    <h4>Datos del Servicio</h4>
                                    <div class="form-group">
                                        <strong>NOMBRE: </strong>{{$servicesproviders->service->name}}
                                    </div>
                                    <div class="form-group">
                                        <strong>precio: </strong>Q. {{$servicesproviders->service->price}}.00
                                    </div>
                                    <div class="form-group">
                                        <strong>SECTOR: </strong>{{$servicesproviders->service->description}}
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="modal-body">
                                    <h4>Datos del Router</h4>
                                    <div class="form-group">
                                        <strong>IDENTIFICAION : </strong>{{$servicesproviders->router->identification}}
                                    </div>
                                    <div class="form-group">
                                        <strong>DIRECCION IP: </strong>{{$servicesproviders->router->ip_number}}
                                    </div>
                                    <div class="form-group">
                                        <strong>VLAN: </strong>{{$servicesproviders->router->vlan}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-body">
                                    <h4>Datos de la Mufa</h4>
                                    <div class="form-group">
                                        <strong>UBICACION : </strong>{{$servicesproviders->mufa->ubication}}
                                    </div>
                                    <div class="form-group">
                                        <strong>NUMERO ONU: </strong> {{$servicesproviders->mufa->number}}
                                    </div>
                                    <div class="form-group">
                                        <strong>PUERTO : </strong>{{$servicesproviders->mufa->number_conexion}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>

                    <div class="form-group">
                        <div class="row">
                            @if($servicesproviders->paymentservice !== null)
                                <div class="col-md-6">
                                    <div class="table-responsive-sm">
                                        <table id="payments" class="table table-bordered table-striped" style="width: 100%" >
                                            <thead>
                                            <tr>
                                                <th colspan="3"><h4>Pagos</h4></th>
                                                <th>
                                                    @can('payments.services.crear')
                                                        <a class="btn btn-success btn-sm" href="{{ route('paymentservices.create') }}"> NUEVO PAGO </a>
                                                    @endcan
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>FECHA INICIAL</th>
                                                <th>FECHA DE PAGO</th>
                                                <th>OBSERVACIONES</th>
                                                <th>REGISTRADO POR:</th>
                                                <th>FECHA DE CREACION</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($servicesproviders->paymentservice as $payment)
                                                <tr>
                                                    <td> {{ $payment->init_date}} </td>
                                                    <td> {{ $payment->end_date}} </td>
                                                    <td> {{ $payment->observations}} </td>
                                                    <td> {{ $payment->user->name}} </td>
                                                    <td> {{ $payment->created_at}} </td>
                                                </tr>
                                            @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            @endif


                            @if($servicesproviders->fail !== null)
                                <div class="col-md-6">
                                    <div class="table-responsive-sm">
                                        <table id="fails" class="table table-bordered table-striped" style="width: 100%" >
                                            <thead>
                                            <tr>
                                                <th colspan="3"><h4>Fallas</h4></th>
                                                <th>
                                                    @can('fails.crear')
                                                        <a class="btn btn-success btn-sm" href="{{ route('fails.create') }}"> REGISTRAR FALLA </a>
                                                    @endcan
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>FECHA DE REPORTE</th>
                                                <th>FECHA DE SOLUCION</th>
                                                <th>STATUS</th>
                                                <th>OBSERVACIONES</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($servicesproviders->fail as $fail)
                                                <tr>
                                                    <td> {{ $fail->date_report}} </td>
                                                    <td> {{ $fail->date_repair}} </td>
                                                    <td>
                                                        @if ($fail->status == 0)
                                                            <strong>Resuelto</strong>
                                                        @else
                                                            <strong>En Proceso</strong>
                                                        @endif
                                                    </td>
                                                    <td> {{ $fail->observations}} </td>
                                                </tr>
                                            @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <strong>STATUS: </strong>@if ($servicesproviders->status == 1)<strong>Disponible</strong>@else<strong>Inactivo</strong>@endif
                            </div>
                            <div class="form-group">
                                <strong>OBSERVACIONES : </strong> {{$servicesproviders->observations}}
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

@section('js')


    <script>
        $(document).ready(function() {
            $('#payments').DataTable({
                responsive: true,
                "order": [
                    [0, "ASC"]
                ],
                "language": {
                    "search": "Buscar:",
                    "info": "_TOTAL_ registros",
                    "paginate":{
                        "next":"Siguiente",
                        "previous": "Anterior",
                    },
                    "lengthMenu": 'Mostrar <select>'+
                        '<option value ="10">10</option>'+
                        '<option value ="30">30</option>'+
                        '<option value ="-1">Todos</option>'+
                        '</select> registros',
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "emptyTable": "No hay datos",
                    "infoEmpty": "",
                    "infoFiltered": "",
                    "zeroRecords": "No hay registros",
                }
            });
        });


        $(document).ready(function() {
            $('#fails').DataTable({
                responsive: true,
                "order": [
                    [0, "ASC"]
                ],
                "language": {
                    "search": "Buscar:",
                    "info": "_TOTAL_ registros",
                    "paginate":{
                        "next":"Siguiente",
                        "previous": "Anterior",
                    },
                    "lengthMenu": 'Mostrar <select>'+
                        '<option value ="10">10</option>'+
                        '<option value ="30">30</option>'+
                        '<option value ="-1">Todos</option>'+
                        '</select> registros',
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "emptyTable": "No hay datos",
                    "infoEmpty": "",
                    "infoFiltered": "",
                    "zeroRecords": "No hay registros",
                }
            });
        });

    </script>
@endsection
