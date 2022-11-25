@extends('adminlte::page')

@section('title', 'Dashboard')
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('content_header')
    <h1>Editar Sector</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a class="btn btn-primary" href="{{ route('sectors.index') }}"> Atras</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('sectors.update', $sectors->id) }}"  method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">Nombre <b style="color: red">*</b></label>
                                <input type="text" name="name" class="form-control" value="{{$sectors->name}}">
                                @error('name')
                                <small style="color:red">{{ $message }}</small>
                                <br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="payment_date">Fecha de Pago <b style="color: red">*</b></label>
                                <input type="text" name="payment_date" class="form-control" value="{{ $sectors->payment_date }}" placeholder="format dd/MM">
                                @error('payment_date')
                                <small style="color:red">{{ $message }}</small>
                                <br>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <button type="submit" class="btn btn-outline-dark">ACTUALIZAR SECTOR</button>
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
