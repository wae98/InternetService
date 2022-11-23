@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Registrar Falla</h1>
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
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Llene el siguiente formulario</h4>
                            <p class="mb-30">Los campos con (*) son obligatorios</p>
                        </div>
                    </div>
                    <form action="{{route('fails.store')}}" method="POST">
                    @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> SERVICIO * </label>
                                    <select name="service_provider_id" class="form-control" id="service_provider_id" value="{{ old('service_provider_id') }}">
                                        <option selected value="">Seleccione el servicio</option>
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

                                    <select class="form-control"  name="status" id="status" value="{{ old('status') }}">
                                        <option value="">--Selecciona una opcion --</option>
                                        <option value="1">En proceso</option>
                                        <option value="0">Resuelto</option>
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
                                    <input type="date" name="date_report" id="date_report" class="form-control" value="{{ old('date_report') }}">
                                    @error('date_report')
                                    <small style="color:red">{{ $message }}</small>
                                    <br>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>FECHA DE CIERRE  *</label>
                                    <input type="date"  name="date_repair" id="date_repair" class="form-control" value="{{ old('date_repair') }}">
                                    @error('date_repair')
                                    <small style="color:red">{{ $message }}</small>
                                    <br>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>OBSERVACIONES  *</label>
                                    <textarea name="observations" id="observations" class="form-control" value="{{ old('observations') }}"></textarea>
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

                                    <button type="submit" class="btn btn-outline-dark">REGISTRAR FALLA</button>
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
