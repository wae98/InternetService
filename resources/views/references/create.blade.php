@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Referencia Personal</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a class="btn btn-primary" href="{{ route('references.index') }}"> Back</a>
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
                    <form action="{{route('references.store')}}" class="validar-producto" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="names">NOMBRE COMPLETO *<b style="color: red">*</b></label>
                            <input type="text" name="names" class="form-control" value="{{ old('names') }}">
                            @error('names')
                            <small style="color:red">{{ $message }}</small>
                            <br>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone_number">NUMERO DE TELEFONO  *  <b style="color: red">*</b></label>
                            <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}">
                            @error('phone_number')
                            <small style="color:red">{{ $message }}</small>
                            <br>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> CLIENTE</label>
                                    <select name="customer_id" class="form-control" id="customer_id" value="{{ old('sector_id') }}">
                                        <option selected value="">Seleccione el cliente al que hace referencia</option>
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

                                        <button type="submit" class="btn btn-outline-dark">CREAR REFERENCIA</button>
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
