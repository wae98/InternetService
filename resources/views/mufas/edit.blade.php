@extends('adminlte::page')

@section('title', 'Dashboard')
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('content_header')
    <h1>Editar Mufa</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a class="btn btn-primary" href="{{ route('mufas.index') }}"> Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('mufas.update', $mufas->id) }}"  method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="ubication">NOMBRE <b style="color: red">*</b></label>
                                <input type="text" name="ubication" class="form-control" value="{{ $mufas->ubication }}">
                                @error('ubication')
                                <small style="color:red">{{ $message }}</small>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="number">NUMERO DE MUFA <b style="color: red">*</b></label>
                                <input type="text" name="number" class="form-control" value="{{ $mufas->number }}">
                                @error('number')
                                <small style="color:red">{{ $message }}</small>
                                <br>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="is_cable_onu">CABLE DE MUFA ONU<b style="color: red">*</b></label>
                                <select name="is_cable_onu" class="form-control" id="is_cable_onu">
                                <optgroup label="Seleccion actual">
                                    <option value="{{$mufas->is_cable_onu}}" selected>@if ($mufas->is_cable_onu == 1)<strong>Si</strong>@else<strong>No</strong>@endif</option>
                                </optgroup>
                                <optgroup label="Status">
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </optgroup>
                                </select>
                                @error('is_cable_onu')
                                <small style="color:red">{{ $message }}</small>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="status">STATUS<b style="color: red">*</b></label>
                                <select name="status" class="form-control" id="status">
                                    <optgroup label="Seleccion actual">
                                        <option value="{{$mufas->status}}" selected>@if ($mufas->status == 1)<strong>Disponible</strong>@else<strong>Asignada</strong>@endif</option>
                                    </optgroup>
                                    <optgroup label="Status">
                                        <option value="1">Disponible</option>
                                        <option value="0">Asignada</option>
                                    </optgroup>
                                </select>
                                @error('status')
                                <small style="color:red">{{ $message }}</small>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="position_onu_olt">POSICION DE ONU EN OLT<b style="color: red">*</b></label>
                                <input type="text" name="position_onu_olt" class="form-control" value="{{ $mufas->position_onu_olt }}">
                                @error('position_onu_olt')
                                <small style="color:red">{{ $message }}</small>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="number_conexion">NUMERO DE CONEXION MUFA<b style="color: red">*</b></label>
                                <input type="text" name="number_conexion" class="form-control" value="{{ $mufas->number_conexion }}">
                                @error('number_conexion')
                                <small style="color:red">{{ $message }}</small>
                                <br>
                                @enderror
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <button type="submit" class="btn btn-outline-dark">ACTUALIZAR MUFA</button>
                                    </div>
                                </div>

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
