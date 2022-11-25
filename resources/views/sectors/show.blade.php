@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Visualizar Sector</h1>
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
                <form >
                <div class="modal-body">
                    <div class="form-group">
                        <strong>Nombre: </strong>{{$sectors->name}}
                    </div>
                    <div class="form-group">
                        <strong>Fecha de pago: </strong>{{$sectors->payment_date}}
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
          <p class="alert" style="background-color: rgba(255,255,255,0.7); color:teal; font-size:10px;"><strong>- WALTER BAMAC - TODOS LOS DERECHOS RESERVADOS © 2022- LOGO © 2022</strong></p>
      </div>
 @endsection
