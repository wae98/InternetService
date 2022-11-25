@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Status</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a class="btn btn-primary" href="{{ route('statusRouters.index') }}"> Atras</a>
                    </h3>
                </div>
            <div class="card-body">
                <form action="{{route('statusRouters.store')}}" class="validar-producto" method="POST">
                    @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre <b style="color: red">*</b></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        @error('name')
                        <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Descripcion <b style="color: red">*</b></label>
                        <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                        @error('description')
                        <small style="color:red">{{ $message }}</small>
                        @enderror
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
