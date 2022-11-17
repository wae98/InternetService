@extends('adminlte::page')
@section('css')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@stop
@section('title', 'Dashboard')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        @can('roles.crear')
                        <a class="btn btn-success" href="{{ route('roles.create') }}"> Crear Nuevo Rol</a>
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
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles1 as $key => $role)
                            <tr>
                                <td> {{ $role->id }} </td>
                                <td> {{ $role->name }} </td>
                                <td>
                                    <div class="grupo-botones">

                                        <div class="boton-warning">

                                            @can('roles.visualizar')
                                                <a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}">Ver</a>
                                            @endcan
                                            @can('roles.editar')
                                                <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                                            @endcan

                                        </div>
                                        @can('roles.eliminar')
                                            <form action="{{route('roles.destroy', $role)}}" class="delete-producto"method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">
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
