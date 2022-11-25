@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Mufas</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a class="btn btn-primary" href="{{ route('mufas.index') }}"> Atras</a>
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
                    <form action="{{route('mufas.store')}}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="ubication">UBICACION <b style="color: red">*</b></label>
                            <input type="text" name="ubication" class="form-control" value="{{ old('ubication') }}">
                            @error('ubication')
                            <small style="color:red">{{ $message }}</small>
                            <br>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="number">NUMERO DE MUFA<b style="color: red">*</b></label>
                            <input type="text" name="number" class="form-control" value="{{ old('number') }}">
                            @error('number')
                            <small style="color:red">{{ $message }}</small>
                            <br>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="is_cable_onu">CABLE DE MUFA ONU<b style="color: red">*</b></label>

                            <select class="form-control"  name="is_cable_onu" id="is_cable_onu" value="{{ old('is_cable_onu') }}">
                                <option value="">--Selecciona una opcion --</option>
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                            @error('is_cable_onu')
                            <small style="color:red">{{ $message }}</small>
                            <br>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="position_onu_olt">POSICION DE ONU EN OLT<b style="color: red">*</b></label>
                            <input type="text" name="position_onu_olt" class="form-control" value="{{ old('position_onu_olt') }}">
                            @error('position_onu_olt')
                            <small style="color:red">{{ $message }}</small>
                            <br>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="number_conexion">NUMERO DE CONEXION MUFA<b style="color: red">*</b></label>
                            <input type="text" name="number_conexion" class="form-control" value="{{ old('number_conexion') }}">
                            @error('number_conexion')
                            <small style="color:red">{{ $message }}</small>
                            <br>
                            @enderror
                        </div>
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <button type="submit" class="btn btn-outline-dark">CREAR MUFA</button>
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
