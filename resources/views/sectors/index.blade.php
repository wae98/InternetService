@extends('adminlte::page')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content_header')
    <h1>Sectores</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <h3 class="card-title">
                                @can('sectors.crear')
                                    <a class="btn btn-success" href="{{ route('sectors.create') }}"> Nuevo Sector</a>
                                @endcan
                            </h3>
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table id="sectors" class="table table-bordered table-striped" style="width: 100%">
                                <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>FECHA DE PAGO</th>
                                    <th>ACCIONES</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($sectors as $sector)
                                    <tr>
                                        <td> {{ $sector->name }} </td>
                                        <td> {{ $sector->payment_date }} </td>
                                        <td>
                                            <div class="grupo-botones">
                                                @can('sectors.editar')
                                                    <div class="boton-warning">
                                                        <a class="btn btn-sm btn-primary"
                                                           href="{{ route('sectors.edit', $sector->id) }}"><i
                                                                class="fas fa-edit"></i></a>
                                                    </div>
                                                @endcan
                                                    @can('sectors.visualizar')
                                                        <div class="boton-warning">
                                                            <a class="btn btn-sm btn-info"
                                                               href="{{ route('sectors.show', $sector->id) }}"><i
                                                                    class="fas fa-eye"></i></a>
                                                        </div>
                                                    @endcan
                                                @can('sectors.eliminar')
                                                    <form action="{{ route('sectors.destroy', $sector) }}"
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

    @if (session('store') == 'ok')
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
            $('#sectors').DataTable({
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
