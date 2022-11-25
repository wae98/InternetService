@extends('adminlte::page')

@section('title', 'Dashboard')
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('content_header')
    <h1>Editar Pago</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a class="btn btn-primary" href="{{ route('paymentservices.index') }}"> Atras</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('paymentservices.update', $payments->id) }}"  method="POST">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> SERVICIO * </label>
                                        <select name="service_provider_id" class="form-control" id="service_provider_id" value="{{ old('service_provider_id') }}">
                                            <option selected value="">Seleccione el servicio</option>
                                            <optgroup label="Seleccion actual">
                                                <option value="{{$payments->service_provider_id}}" selected>{{$payments->serviceprovider->service->name.' - Q'.$payments->serviceprovider->service->price .' - '.$payments->serviceprovider->customer->names}}</option>
                                            </optgroup>
                                            <optgroup label="Status">
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
                                        <label>TOTAL  *</label>
                                        <input type="text" name="total" id="total" class="form-control" value="{{$payments->total}}">
                                        @error('total')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>FECHA INICIAL  *</label>
                                        <input type="date" name="init_date" id="init_date" class="form-control" value="{{$payments->init_date}}">
                                        @error('init_date')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>FECHA FINAL  *</label>
                                        <input type="date"  name="end_date" id="end_date" class="form-control" value="{{$payments->end_date}}">
                                        @error('end_date')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>OBSERVACIONES  *</label>
                                        <textarea name="observations" id="observations" class="form-control">{{$payments->observations}}</textarea>
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

                                        <button type="submit" class="btn btn-outline-dark">ACTUALIZAR PAGO</button>
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
