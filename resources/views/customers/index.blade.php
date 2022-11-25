@extends('adminlte::page')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content_header')
    <h1>Clientes</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <h3 class="card-title">
                                @can('customers.crear')
                                    <a class="btn btn-success" href="{{ route('customers.create') }}"> Nuevo Cliente</a>
                                @endcan
                            </h3>
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table id="routers" class="table table-bordered table-striped" style="width: 100%" >
                                <thead>
                                <tr>
                                    <th>NOMBRES Y APELLIDOS</th>
                                    <th>NUMERO DE TELEFONO</th>
                                    <th>DIRECCION</th>
                                    <th>REFERENCIA</th>
                                    <th>SECTOR</th>
                                    <th>CREADO POR: </th>
                                    <th>ACCIONES</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td> {{ $customer->names }} </td>
                                        <td> {{ $customer->phone_number }} </td>
                                        <td> {{ $customer->address }} </td>
                                        <td> {{ $customer->references_address }} </td>
                                        <td> {{ $customer->sector->name }} </td>
                                        <td> {{ $customer->user->name }} </td>
                                        <td>
                                            <div class="grupo-botones">
                                                @can('customers.editar')
                                                    <div class="boton-warning">
                                                        <a class="btn btn-sm btn-primary"
                                                           href="{{ route('customers.edit', $customer->id) }}"><i
                                                                class="fas fa-edit"></i></a>
                                                    </div>
                                                @endcan
                                                    @can('customers.visualizar')
                                                        <div class="boton-warning">
                                                            <a class="btn btn-sm btn-info"
                                                               href="{{ route('customers.show', $customer->id) }}"><i
                                                                    class="fas fa-eye"></i></a>
                                                        </div>
                                                    @endcan
                                                @can('customers.eliminar')
                                                    <form action="{{ route('customers.destroy', $customer) }}"
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
            $('#routers').DataTable({
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
