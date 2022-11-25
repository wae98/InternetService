@extends('adminlte::page')

@section('title', 'Dashboard')
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('content_header')
    <h1>Editar Rol</h1>
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
                        <form action="{{ route('routers.update', $routers->id) }}"  method="POST">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>IDENTIFICADOR  *</label>
                                        <input type="text" name="identification" id="identification" class="form-control" value="{{$routers->identification}}">
                                        @error('identification')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>TIPO DE ONU  *</label>
                                        <input type="text"  name="onu_type" id="onu_type" class="form-control" value="{{$routers->onu_type}}">
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
                                        <input type="text" name="mac_address" id="mac_address" class="form-control" value="{{$routers->mac_address}}">
                                        @error('mac_address')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>DIRECCION IP *</label>
                                        <input type="text"  name="ip_number" id="ip_number" class="form-control" value="{{$routers->ip_number}}">
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
                                        <input type="text" name="vlan" id="vlan" class="form-control" value="{{$routers->vlan}}">
                                        @error('vlan')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NUMERO DE PON O SFP  *</label>
                                        <input type="text"  name="pon_number" id="pon_number" class="form-control" value="{{$routers->pon_number}}">
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
                                        <input type="text" name="slot" id="slot" class="form-control" value="{{$routers->slot}}">
                                        @error('slot')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>COLOR PICTEL  *</label>
                                        <input type="text" name="color_pictel" id="color_pictel" class="form-control" value="{{$routers->color_pictel}}">
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
                                        <input type="text"  name="onu_position" id="onu_position" class="form-control" value="{{$routers->onu_position}}">
                                        @error('onu_position')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NUMERO DE ONU *</label>
                                        <input type="text" name="onu_number" id="onu_number" class="form-control" value="{{$routers->onu_number}}">
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
                                        <select name="status_router_id" class="form-control" id="status_router_id">
                                            <optgroup label="Seleccion actual">
                                                <option value="{{$routers->status_router_id}}" selected>{{$routers->statusrouter->name}}</option>
                                            </optgroup>
                                            <optgroup label="Status">
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

                                        <button type="submit" class="btn btn-outline-dark">ACTUALIZAR ROUTER</button>
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
