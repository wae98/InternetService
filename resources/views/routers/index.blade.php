@extends('adminlte::page')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content_header')
    <h1>Routers</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <h3 class="card-title">
                                @can('routers.crear')
                                    <a class="btn btn-success" href="{{ route('routers.create') }}"> Nuevo Router</a>
                                @endcan
                            </h3>
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table id="routers" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>IDENTIFICADOR</th>
                                    <th>NUMERO ONU</th>
                                    <th>TIPO ONU</th>
                                    <th>POSICION ONU</th>
                                    <th>MAC ADDRESS</th>
                                    <th>DIRECCION IP</th>
                                    <th>VLAN</th>
                                    <th>NUMERO SPON O SFP</th>
                                    <th>SLOT</th>
                                    <th>COLOR PICTEL</th>
                                    <th>STATUS</th>
                                    <th>ACCIONES</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($routers as $router)
                                    <tr>
                                        <td> {{ $router->identification }} </td>
                                        <td> {{ $router->onu_number }} </td>
                                        <td> {{ $router->onu_type }} </td>
                                        <td> {{ $router->onu_position }} </td>
                                        <td> {{ $router->mac_address }} </td>
                                        <td> {{ $router->ip_number }} </td>
                                        <td> {{ $router->vlan }} </td>
                                        <td> {{ $router->pon_number }} </td>
                                        <td> {{ $router->slot }} </td>
                                        <td> {{ $router->color_pictel }} </td>
                                        <td> {{ $router->statusrouter->name}} </td>
                                        <td>
                                            <div class="grupo-botones">
                                                @can('routers.editar')
                                                    <div class="boton-warning">
                                                        <a class="btn btn-sm btn-primary"
                                                           href="{{ route('routers.edit', $router->id) }}"><i
                                                                class="fas fa-edit"></i></a>
                                                    </div>
                                                @endcan
                                                    @can('routers.visualizar')
                                                        <div class="boton-warning">
                                                            <a class="btn btn-sm btn-info"
                                                               href="{{ route('routers.show', $router->id) }}"><i
                                                                    class="fas fa-eye"></i></a>
                                                        </div>
                                                    @endcan
                                                @can('routers.eliminar')
                                                    <form action="{{ route('routers.destroy', $router) }}"
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
@section('footer')
    <div class="text-center">
        <p class="alert" style="background-color: rgba(255,255,255,0.7); color:teal; font-size:10px;"><strong>- WALTER BAMAC - TODOS LOS DERECHOS RESERVADOS © 2022</strong></p>
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
