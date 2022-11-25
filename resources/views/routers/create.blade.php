@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Router</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a class="btn btn-primary" href="{{ route('routers.index') }}"> Atras</a>
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

                    <form action="{{route('routers.store')}}" class="validar-producto" method="POST">
                    @csrf
                          <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>IDENTIFICADOR  *</label>
                                        <input type="text" name="identification" id="identification" class="form-control" value="{{ old('identification') }}">
                                        @error('identification')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>TIPO DE ONU  *</label>
                                        <input type="text"  name="onu_type" id="onu_type" class="form-control" value="{{ old('onu_type') }}">
                                        @error('onu_type')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>MAC ADDRESS  *</label>
                                        <input type="text" name="mac_address" id="mac_address" class="form-control" value="{{ old('mac_address') }}">
                                        @error('mac_address')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>DIRECCION IP *</label>
                                        <input type="text"  name="ip_number" id="ip_number" class="form-control" value="{{ old('ip_number') }}">
                                        @error('ip_number')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>VLAN  *</label>
                                        <input type="text" name="vlan" id="vlan" class="form-control" value="{{ old('vlan') }}">
                                        @error('vlan')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NUMERO DE PON O SFP  *</label>
                                        <input type="text"  name="pon_number" id="pon_number" class="form-control" value="{{ old('pon_number') }}">
                                        @error('pon_number')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SLOT  *</label>
                                        <input type="text" name="slot" id="slot" class="form-control" value="{{ old('slot') }}">
                                        @error('slot')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>COLOR PICTEL  *</label>
                                        <input type="text" name="color_pictel" id="color_pictel" class="form-control" value="{{ old('color_pictel') }}">
                                        @error('color_pictel')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>POSICION ONU  *</label>
                                        <input type="text"  name="onu_position" id="onu_position" class="form-control" value="{{ old('onu_position') }}">
                                        @error('onu_position')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NUMERO DE ONU *</label>
                                        <input type="text" name="onu_number" id="onu_number" class="form-control" value="{{ old('onu_number') }}">
                                        @error('onu_number')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> STATUS</label>
                                        <select name="status_router_id" class="form-control" id="status_router_id" value="{{ old('status_router_id') }}">
                                            <option selected value="">Seleccione un estado</option>
                                            @foreach ($statusRouters as $status)
                                                <option value="{{$status->id}}">{{$status->name}}</option>
                                                @endforeach
                                                </optgroup>
                                        </select>
                                        @error('status_router_id')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <button type="submit" class="btn btn-outline-dark">CREAR ROUTER</button>
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
