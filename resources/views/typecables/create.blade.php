@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Tipo de Cable</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a class="btn btn-primary" href="{{ route('typecables.index') }}"> Back</a>
                    </h3>
                </div>
            <div class="card-body">
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Llene el siguiente formulario</h4>
                            <p class="mb-30">Los campos con (*) son obligatorios</p>
                        </div>
                    </div>
                    <form action="{{route('typecables.store')}}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="name">NOMBRE <b style="color: red">*</b></label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                            <small style="color:red">{{ $message }}</small>
                            <br>
                            @enderror
                        </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <button type="submit" class="btn btn-outline-dark">CREAR CABLE</button>
                                    </div>
                                </div>

                            </div>
                        </form>
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
