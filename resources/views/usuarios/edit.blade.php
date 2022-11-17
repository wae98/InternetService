@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui/jquery-ui.min.css') }}">
@stop

@section('content_header')
    <h1>Actualizar Usuario</h1>
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
                        <form action="{{ route('usuarios.update', $user) }}" class="validar-usuarios" method="POST">
                            @method('put')
                            @csrf
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="name">Nombre <b style="color: red">*</b></label>
                                    <input type="text" name="name" class="form-control " id="name" value="{{$user->name}}">
                                    @error('name')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="username">Usuario <b style="color: red">*</b></label>
                                    <input type="text" name="username" class="form-control " id="username" id="name" value="{{$user->username}}">
                                    @error('username')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Correo <b style="color: red">*</b></label>
                                    <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}">
                                    @error('email')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                        <label for="roles">Roles <b style="color: red">*</b> </label>
                                        <select class="form-control" name="roles" id="roles">
                                            <optgroup label="Seleccion Actual">
                                                @if ($nameRole->count())
                                                @foreach($nameRole as $nm)
                                                <option value="{{$nm->id}}" selected>{{$nm->name}}</option>
                                                @endforeach
                                                @else
                                                <option value="" selected>No has seleccionado un rol</option>
                                                @endif
                                              </optgroup>
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
                                    <label for="status">Estado <b style="color: red">*</b> </label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="{{$user->status}}">
                                                @if ($user->status == 0)
                                                    Bloquedo
                                                @else
                                                    Activo
                                                @endif
                                            </option>
                                            <optgroup label="Estados Disponibles">
                                                <option value="1">Activo</option>
                                                <option value="0">Bloqueado</option>
                                                </optgroup>
                                        </select>
                                        @error('status')
                                            <small style="color:red">{{ $message }}</small>
                                            <br>
                                        @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nombre">Contraseña <b style="color: red">*</b></label>
                                    <div class="input-group mb-3">
                                        <input type="password" name="password" class="form-control" placeholder="Ingrese nueva contraseña">
                                        <span class="input-group-text"> </span>
                                        <input type="password" name="confirm-password" class="form-control" placeholder="Confirmar contraseña">
                                    </div>
                                    @error('password')
                                            <small style="color:red">{{ $message }}</small>
                                            <br>
                                        @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-dark">Actualizar Usuario</button>
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

