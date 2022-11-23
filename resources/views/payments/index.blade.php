@extends('adminlte::page')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content_header')
    <h1>Pago de Servicios</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <h3 class="card-title">
                                @can('payments.services.crear')
                                    <a class="btn btn-success" href="{{ route('paymentservices.create') }}"> REGISTRAR NUEVO PAGO </a>
                                @endcan
                            </h3>
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table id="payments" class="table table-bordered table-striped" style="width: 100%" >
                                <thead>
                                <tr>
                                    <th>CLIENTE</th>
                                    <th>SERVICIO</th>
                                    <th>FECHA INICIAL</th>
                                    <th>FECHA DE PAGO</th>
                                    <th>OBSERVACIONES</th>
                                    <th>REGISTRADO POR:</th>
                                    <th>FECHA DE CREACION</th>
                                    <th>ACCIONES</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td> {{ $payment->serviceprovider->customer->names}} </td>
                                        <td> {{ $payment->serviceprovider->service->name}} </td>
                                        <td> {{ $payment->init_date}} </td>
                                        <td> {{ $payment->end_date}} </td>
                                        <td> {{ $payment->observations}} </td>
                                        <td> {{ $payment->user->name}} </td>
                                        <td> {{ $payment->created_at}} </td>
                                        <td>
                                            <div class="grupo-botones">
                                                @can('payments.services.editar')
                                                    <div class="boton-warning">
                                                        <a class="btn btn-sm btn-primary"
                                                           href="{{ route('paymentservices.edit', $payment->id) }}"><i
                                                                class="fas fa-edit"></i></a>
                                                    </div>
                                                @endcan
                                                    @can('payments.services.visualizar')
                                                        <div class="boton-warning">
                                                            <a class="btn btn-sm btn-info"
                                                               href="{{ route('paymentservices.show', $payment->id) }}"><i
                                                                    class="fas fa-eye"></i></a>
                                                        </div>
                                                    @endcan
                                                        <div class="boton-warning">
                                                            <a href="{{route('payments.ticket.pdf', $payment->id)}}" class="btn btn-sm btn-warning" role="button">
                                                                <i class="fas fa-file-pdf"></i>
                                                            </a>
                                                        </div>

                                                @can('payments.services.eliminar')
                                                    <form action="{{ route('paymentservices.destroy', $payment) }}"
                                                          class="delete-usuario" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
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

@endsection
@section('js')

    @if (session('update') == 'ok')
        <script>
            Swal.fire({
                type: 'success',
                title: 'Registro actualizado',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
    @if (session('create') == 'ok')
        <script>
            Swal.fire({
                type: 'success',
                title: 'Registro Creado',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    @if (session('delete') == 'ok')
        <script>
            Swal.fire({
                type: 'success',
                title: 'Registro Eliminado',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    <script>
        $(document).ready(function() {
            $('#payments').DataTable({
                responsive: true,
                scrollX: true,
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
