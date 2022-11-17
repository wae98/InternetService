@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Nuevo Rol</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
                    </h3>
                </div>
            <div class="card-body">
                <form action="{{route('roles.store')}}" class="validar-producto" method="POST">
                    @csrf
                <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre">Nombre <b style="color: red">*</b></label>
                            <input type="text" name="name" class="form-control" id="nombre-create">

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Permisos:</strong>
                                    <br/>
                                    @foreach($permission as $value)
                                    <div class="form-check">
                                        <input class="form-check-input" name="permission[]" type="checkbox" value="{{$value->name}}" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            {{$value->name}}
                                        </label>
                                      </div>
                                    <br/>
                                    @endforeach

                                </div>

                            </div>

                        </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-outline-dark">Guardar</button>
                </div>
                </form>

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
