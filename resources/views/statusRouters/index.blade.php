@extends('adminlte::page')
@section('css')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@stop
@section('title', 'Dashboard')

@section('content_header')
    <h1>Status Router</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        @can('status.routers.crear')
                        <a class="btn btn-success" href="{{ route('statusRouters.create') }}"> Crear Nuevo Status</a>
                        @endcan
                    </h3>
                </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table id="usuarios" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($statusRouter as $key => $status)
                            <tr>
                                <td> {{ $status->id }} </td>
                                <td> {{ $status->name }} </td>
                                <td> {{ $status->description }} </td>
                                <td>
                                    <div class="grupo-botones">

                                        <div class="boton-warning">

                                            @can('status.routers.visualizar')
                                                <a class="btn btn-info btn-sm" href="{{ route('statusRouters.show',$status->id) }}">Ver</a>
                                            @endcan
                                            @can('status.routers.editar')
                                                <a class="btn btn-primary btn-sm" href="{{ route('statusRouters.edit',$status->id) }}">Editar</a>
                                            @endcan

                                        </div>
                                        @can('status.routers.eliminar')
                                            <form action="{{route('statusRouters.destroy', $status)}}" class="delete-producto"method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm show_confirm" data-toggle="tooltip" title='Delete'>
                                                    Eliminar
                                                </button>
                                            </form>
                                        @endcan
                                    </div>


                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                        </tfoot>
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
 @endsection
