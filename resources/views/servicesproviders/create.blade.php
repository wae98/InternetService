@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nuevo Servicio de Internet</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a class="btn btn-primary" href="{{ route('servicesproviders.index') }}"> Atras</a>
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
                    <form action="{{route('servicesproviders.store')}}" method="POST">
                    @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> CLIENTE<b style="color: red">*</b></label>
                                    <select name="customer_id" class="form-control" id="cable_type_id" value="{{ old('customer_id') }}">
                                        <option selected value="">Seleccione un cliente</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->names}}</option>
                                            @endforeach
                                            </optgroup>
                                    </select>
                                    @error('customer_id')
                                    <small style="color:red">{{ $message }}</small>
                                    <br>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> SERVICIO<b style="color: red">*</b></label>
                                    <select name="service_id" class="form-control" id="service_id" value="{{ old('service_id') }}">
                                        <option selected value="">Seleccione un servicio</option>
                                        @foreach ($services as $service)
                                            <option value="{{$service->id}}">{{$service->name . ' - ' . $service->price}}</option>
                                            @endforeach
                                            </optgroup>
                                    </select>
                                    @error('service_id')
                                    <small style="color:red">{{ $message }}</small>
                                    <br>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> ROUTER<b style="color: red">*</b></label>
                                    <select name="router_id" class="form-control" id="router_id" value="{{ old('router_id') }}">
                                        <option selected value="">Seleccione un router</option>
                                        @foreach ($routers as $router)
                                            <option value="{{$router->id}}">{{$router->identification}}</option>
                                            @endforeach
                                            </optgroup>
                                    </select>
                                    @error('router_id')
                                    <small style="color:red">{{ $message }}</small>
                                    <br>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> MUFA<b style="color: red">*</b></label>
                                    <select name="mufa_id" class="form-control" id="mufa_id" value="{{ old('mufa_id') }}">
                                        <option selected value="">Seleccione un router</option>
                                        @foreach ($mufas as $mufa)
                                            <option value="{{$mufa->id}}">{{$mufa->ubication . ' - ' . $mufa->number}}</option>
                                            @endforeach
                                            </optgroup>
                                    </select>
                                    @error('mufa_id')
                                    <small style="color:red">{{ $message }}</small>
                                    <br>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status">STATUS<b style="color: red">*</b></label>

                            <select class="form-control"  name="status" id="status" value="{{ old('status') }}">
                                <option value="">--Selecciona una opcion --</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                            @error('status')
                            <small style="color:red">{{ $message }}</small>
                            <br>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="observations">OBSERVACION<b style="color: red">*</b></label>
                            <textarea name="observations" class="form-control" value="{{ old('observations') }}"></textarea>
                            @error('observations')
                            <small style="color:red">{{ $message }}</small>
                            <br>
                            @enderror
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
