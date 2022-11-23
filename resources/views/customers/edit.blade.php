@extends('adminlte::page')

@section('title', 'Dashboard')
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('content_header')
    <h1>Editar Cliente</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a class="btn btn-primary" href="{{ route('customers.index') }}"> Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('customers.update', $customers->id) }}"  method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="names">NOMBRE COMPLETO <b style="color: red">*</b></label>
                                <input type="text" name="names" class="form-control" value="{{ $customers->names }}">
                                @error('names')
                                <small style="color:red">{{ $message }}</small>
                                <br>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NUMERO DE TELEFONO  *</label>
                                        <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ $customers->phone_number }}">
                                        @error('phone_number')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>DIRECCION  *</label>
                                        <input type="text"  name="address" id="address" class="form-control" value="{{ $customers->address }}">
                                        @error('address')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="references_address">REFERENCIA  <b style="color: red">*</b></label>
                                <textarea name="references_address" class="form-control" >{{ $customers->references_address }}</textarea>
                                @error('references_address')
                                <small style="color:red">{{ $message }}</small>
                                <br>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> SECTOR</label>
                                        <select name="sector_id" class="form-control" id="sector_id">
                                            <optgroup label="Seleccion actual">
                                                <option value="{{$customers->sector_id}}" selected>{{$customers->sector->name}}</option>
                                            </optgroup>
                                            <optgroup label="Status">
                                            @foreach ($sectors as $sector)
                                                <option value="{{$sector->id}}">{{$sector->name}}</option>
                                                @endforeach
                                                </optgroup>
                                        </select>
                                        @error('sector_id')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <button type="submit" class="btn btn-outline-dark">ACTUALIZAR CLIENTE</button>
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
