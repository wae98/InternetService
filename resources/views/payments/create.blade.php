@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nuevo Registro de Pago</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a class="btn btn-primary" href="{{ route('paymentservices.index') }}"> Back</a>
                    </h3>
                </div>
            <div class="card-body">
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Llene el siguiente formulario</h4>
                            @foreach ($serviceproviders as $providers)
                                <p class="mb-30">La fecha de pago recomendada para este servicio y sector es el dia {{$providers->customer->sector->payment_date}} de cada mes.</p>
                            @endforeach
                                <p class="mb-30">Los campos con (*) son obligatorios</p>
                        </div>
                    </div>
                    <form action="{{route('paymentservices.store')}}" method="POST">
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
                                    <label>TOTAL  *</label>
                                    <input type="text" name="total" id="total" class="form-control" value="{{ old('total') }}">
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
                                    <input type="date" name="init_date" id="init_date" class="form-control" value="{{ old('init_date') }}">
                                    @error('init_date')
                                    <small style="color:red">{{ $message }}</small>
                                    <br>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>FECHA FINAL  *</label>
                                    <input type="date"  name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}">
                                    @error('end_date')
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

                                        <button type="submit" class="btn btn-outline-dark">REGISTRAR PAGO</button>
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
@section('js')
    <script>
        window.onload = function() {
            var fecha = new Date();
            var mes = fecha.getMonth() + 1; //obteniendo mes
            var anio = fecha.getFullYear(); //obteniendo año
            const ultimoDia = new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0).getDate()
            if (mes < 10)
                mes = '0' + mes //agrega cero si el menor de 10
            document.getElementById('init_date').value = anio + "-" + mes + "-" + "01";
            document.getElementById('end_date').value = anio + "-" + mes + "-" + ultimoDia;
        }
    </script>
@endsection
