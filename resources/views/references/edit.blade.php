@extends('adminlte::page')

@section('title', 'Dashboard')
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('content_header')
    <h1>Editar Referencia Personal</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a class="btn btn-primary" href="{{ route('references.index') }}"> Atras</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('references.update', $references->id) }}"  method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="names">NOMBRE COMPLETO <b style="color: red">*</b></label>
                                <input type="text" name="names" class="form-control" value="{{ $references->names }}">
                                @error('names')
                                <small style="color:red">{{ $message }}</small>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone_number">REFERENCIA  <b style="color: red">*</b></label>
                                <input type="text" name="phone_number" class="form-control" value="{{ $references->phone_number }}">
                                @error('phone_number')
                                <small style="color:red">{{ $message }}</small>
                                <br>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> CLIENTE</label>
                                        <select name="customer_id" class="form-control" id="customer_id">
                                            <optgroup label="Seleccion actual">
                                                <option value="{{$references->customer_id}}" selected>{{$references->customer->names}}</option>
                                            </optgroup>
                                            <optgroup label="Status">
                                            @foreach ($customers as $customer)
                                                <option value="{{$customer->id}}">{{$customer->name}}</option>
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
