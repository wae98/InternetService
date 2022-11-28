@extends('adminlte::page')

@section('title', 'Dashboard')
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('content_header')
    <h1>Editar Servicio</h1>
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
                        <form action="{{ route('services.update', $services->id) }}"  method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">NOMBRE <b style="color: red">*</b></label>
                                <input type="text" name="name" class="form-control" value="{{ $services->name }}">
                                @error('name')
                                <small style="color:red">{{ $message }}</small>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">PRECIO  <b style="color: red">*</b></label>
                                <input type="text" name="price" class="form-control" value="{{ $services->price }}">
                                @error('price')
                                <small style="color:red">{{ $message }}</small>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="installation_price">PRECIO DE INSTALACION <b style="color: red">*</b></label>
                                <input type="text" name="installation_price" class="form-control" value="{{ $services->installation_price }}">
                                @error('installation_price')
                                <small style="color:red">{{ $message }}</small>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">DESCRIPCION  <b style="color: red">*</b></label>
                                <textarea name="description" class="form-control">{{ $services->description }}</textarea>
                                @error('description')
                                <small style="color:red">{{ $message }}</small>
                                <br>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> TIPO DE CABLE</label>
                                        <select name="cable_type_id" class="form-control" id="cable_type_id">
                                            <optgroup label="Seleccion actual">
                                                <option value="{{$services->cable_type_id}}" selected>{{$services->cabletype->name}}</option>
                                            </optgroup>
                                            <optgroup label="Status">
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

                                        <button type="submit" class="btn btn-outline-dark">ACTUALIZAR SERVICIO</button>
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
