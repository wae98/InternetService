@extends('adminlte::page')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content_header')
    <h1>Servicios Adquiridos</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <h3 class="card-title">
                                @can('services.providers.crear')
                                    <a class="btn btn-success" href="{{ route('servicesproviders.create') }}"> Adquirir Nuevo Servicio </a>
                                @endcan
                            </h3>
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table id="services" class="table table-bordered table-striped" style="width: 100%" >
                                <thead>
                                <tr>
                                    <th>CLIENTE</th>
                                    <th>SERVICIO</th>
                                    <th>ROUTER</th>
                                    <th>MUFA</th>
                                    <th>STATUS</th>
                                    <th>OBSERVACION</th>
                                    <th>CREADO POR: </th>
                                    <th>FECHA DE ADQUISICION: </th>
                                    <th>ACCIONES</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($servicesproviders as $service)
                                    <tr>
                                        <td> {{ $service->customer->names}} </td>
                                        <td> {{ $service->service->name}} </td>
                                        <td> {{ $service->router->identification}} </td>
                                        <td> {{ $service->mufa->ubication}} </td>
                                        <td>
                                            @if ($service->status == 1)
                                                <strong>Activo</strong>
                                            @else
                                                <strong>Inactivo</strong>
                                            @endif
                                        </td>
                                        <td> {{ $service->observations}} </td>
                                        <td> {{ $service->user->name}} </td>
                                        <td> {{date('d-m-Y',strtotime($service->created_at))}}  </td>
                                        <td>
                                            <div class="grupo-botones">
                                                @can('services.providers.editar')
                                                    <div class="boton-warning">
                                                        <a class="btn btn-sm btn-primary"
                                                           href="{{ route('servicesproviders.edit', $service->id) }}"><i
                                                                class="fas fa-edit"></i></a>
                                                    </div>
                                                @endcan
                                                    @can('services.providers.visualizar')
                                                        <div class="boton-warning">
                                                            <a class="btn btn-sm btn-info"
                                                               href="{{ route('servicesproviders.show', $service->id) }}"><i
                                                                    class="fas fa-eye"></i></a>
                                                        </div>
                                                    @endcan
                                                @can('services.providers.eliminar')
                                                    <form action="{{ route('servicesproviders.destroy', $service) }}"
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
            $('#services').DataTable({
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
