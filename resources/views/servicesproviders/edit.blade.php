@extends('adminlte::page')

@section('title', 'Dashboard')
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('content_header')
    <h1>Editar Servicio Adquirido</h1>
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
                        <form action="{{ route('servicesproviders.update', $servicesproviders->id) }}"  method="POST">
                            @csrf
                            @method('put')

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> CLIENTE</label>
                                        <select name="customer_id" class="form-control" id="customer_id">
                                            <optgroup label="Seleccion actual">
                                                <option value="{{$servicesproviders->customer_id}}" selected>{{$servicesproviders->customer->names}}</option>
                                            </optgroup>
                                            <optgroup label="Status">
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
                                        <label> SERVICIO</label>
                                        <select name="service_id" class="form-control" id="service_id">
                                            <optgroup label="Seleccion actual">
                                                <option value="{{$servicesproviders->service_id}}" selected>{{$servicesproviders->service->name .' - '. $servicesproviders->service->price}}</option>
                                            </optgroup>
                                            <optgroup label="Status">
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
                                        <label> ROUTER</label>
                                        <select name="router_id" class="form-control" id="router_id">
                                            <optgroup label="Seleccion actual">
                                                <option value="{{$servicesproviders->router_id}}" selected>{{$servicesproviders->router->identification .' - '. $servicesproviders->router->ip_number}}</option>
                                            </optgroup>
                                            <optgroup label="Status">
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
                                        <label> MUFA</label>
                                        <select name="mufa_id" class="form-control" id="mufa_id">
                                            <optgroup label="Seleccion actual">
                                                <option value="{{$servicesproviders->mufa_id}}" selected>{{$servicesproviders->mufa->ubication .' - '. $servicesproviders->router->number_conexion}}</option>
                                            </optgroup>
                                            <optgroup label="Status">
                                                @foreach ($mufas as $mufa)
                                                    <option value="{{$mufa->id}}">{{$mufa->ubication . ' - ' . $router->number_conexion}}</option>
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
                                <select name="status" class="form-control" id="status">
                                    <optgroup label="Seleccion actual">
                                        <option value="{{$servicesproviders->status}}" selected>@if ($servicesproviders->status == 1)<strong>Disponible</strong>@else<strong>Inactivo</strong>@endif</option>
                                    </optgroup>
                                    <optgroup label="Status">
                                        <option value="1">Disponible</option>
                                        <option value="0">Inactivo</option>
                                    </optgroup>
                                </select>
                                @error('status')
                                <small style="color:red">{{ $message }}</small>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="observations">OBSERVACIONES  <b style="color: red">*</b></label>
                                <textarea name="observations" class="form-control">{{ $servicesproviders->observations }}</textarea>
                                @error('observations')
                                <small style="color:red">{{ $message }}</small>
                                <br>
                                @enderror
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
