@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Servicio</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a class="btn btn-primary" href="{{ route('services.index') }}"> Atras</a>
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
                    <form action="{{route('services.store')}}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="name">NOMBRE  <b style="color: red">*</b></label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                            <small style="color:red">{{ $message }}</small>
                            <br>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">PRECIO<b style="color: red">*</b></label>
                            <input type="text" name="price" class="form-control" value="{{ old('price') }}">
                            @error('price')
                            <small style="color:red">{{ $message }}</small>
                            <br>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">DESCRIPCION<b style="color: red">*</b></label>
                            <textarea name="description" class="form-control" value="{{ old('description') }}"></textarea>
                            @error('description')
                            <small style="color:red">{{ $message }}</small>
                            <br>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> TIPO DE CABLE</label>
                                    <select name="cable_type_id" class="form-control" id="cable_type_id" value="{{ old('cable_type_id') }}">
                                        <option selected value="">Seleccione el tipo de cable</option>
                                        @foreach ($typecables as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach
                                            </optgroup>
                                    </select>
                                    @error('cable_type_id')
                                    <small style="color:red">{{ $message }}</small>
                                    <br>
                                    @enderror
                                </div>
                            </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <button type="submit" class="btn btn-outline-dark">CREAR SERVICIO</button>
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
