@extends('adminlte::page')

@section('title', 'Dashboard')
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('content_header')
    <h1>Editar Falla</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a class="btn btn-primary" href="{{ route('fails.index') }}"> Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('fails.update', $fails->id) }}"  method="POST">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> SERVICIO * </label>
                                        <select name="service_provider_id" class="form-control" id="service_provider_id" value="{{ old('service_provider_id') }}">
                                            <optgroup label="Seleccion actual">
                                                <option value="{{$fails->service_provider_id}}" selected>{{$fails->serviceprovider->service->name.' - Q'.$fails->serviceprovider->service->price .' - '.$fails->serviceprovider->customer->names}}</option>
                                            </optgroup>
                                            <optgroup label="Servicios">
                                            @foreach ($serviceproviders as $providers)
                                                <option value="{{$providers->id}}">{{$providers->service->name.' - Q'.$providers->service->price .' - '.$providers->customer->names}}</option>
                                                @endforeach
                                                </optgroup>
                                        </select>
                                        @error('service_provider_id')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">STATUS<b style="color: red">*</b></label>
                                        <select name="status" class="form-control" id="status">
                                            <optgroup label="Seleccion actual">
                                                <option value="{{$fails->status}}" selected>@if ($fails->status == 1)<strong>En proceso</strong>@else<strong>Resuelto</strong>@endif</option>
                                            </optgroup>
                                            <optgroup label="Status">
                                                <option value="1">En Proceso</option>
                                                <option value="0">Resuelto</option>
                                            </optgroup>
                                        </select>
                                        @error('status')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>FECHA DE REPORTE  *</label>
                                        <input type="date" name="date_report" id="date_report" class="form-control" value="{{$fails->date_report}}">
                                        @error('date_report')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>FECHA DE CIERRE  *</label>
                                        <input type="date"  name="date_repair" id="date_repair" class="form-control" value="{{$fails->date_repair}}">
                                        @error('date_repair')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>OBSERVACIONES  *</label>
                                        <textarea name="observations" id="observations" class="form-control">{{$fails->observations}}</textarea>
                                        @error('observations')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <button type="submit" class="btn btn-outline-dark">ACTUALIZAR FALLA</button>
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
