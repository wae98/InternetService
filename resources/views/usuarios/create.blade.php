@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui/jquery-ui.min.css') }}">
@stop

@section('content_header')
    <h1>Crear Nuevo Usuario</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a class="btn btn-primary" href="{{ route('usuarios.index') }}"> Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('usuarios.store') }}" class="validar-usuarios" method="POST">
                            @csrf
                                <div class="form-group">
                                    <label for="name">Nombre <b style="color: red">*</b></label>
                                    <input type="text" name="name" class="form-control " id="name">
                                    @error('name')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="username">Usuario <b style="color: red">*</b></label>
                                    <input type="text" name="username" class="form-control " id="username">
                                    @error('username')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Correo <b style="color: red">*</b></label>
                                    <input type="email" name="email" class="form-control" id="email">
                                    @error('email')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone_number">Telefono <b style="color: red">*</b></label>
                                    <input type="phone_number" name="phone_number" class="form-control" id="phone_number">
                                    @error('phone_number')
                                    <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="roles">Roles <b style="color: red">*</b> </label>
                                    <select class="form-control" name="roles" id="roles">
                                        <option value="">Seleccione un rol</option>
                                        <optgroup label="Roles Disponibles">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                    @error('roles')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nombre">Contraseña <b style="color: red">*</b></label>
                                    <div class="input-group mb-3">
                                        <input type="password" name="password" class="form-control" id="create-password"
                                            placeholder="Ingrese contraseña">
                                        <span class="input-group-text"> </span>
                                        <input type="password" name="confirm-password" class="form-control"
                                            id="create-password2" placeholder="Confirmar contraseña">
                                    </div>
                                    @error('password')
                                            <small style="color:red">{{ $message }}</small>
                                            <br>
                                        @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-dark">Crear Usuario</button>
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

