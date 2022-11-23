@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Visualizar Router</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a class="btn btn-primary" href="{{ route('routers.index') }}"> Back</a>
                    </h3>
                </div>
            <div class="card-body">
                <form >
                <div class="modal-body">
                    <div class="form-group">
                        <strong>NUMERO ONU: </strong>{{$routers->onu_number}}
                    </div>
                    <div class="form-group">
                        <strong>TIPO DE ONU: </strong>{{$routers->onu_type}}
                    </div>
                    <div class="form-group">
                        <strong>POSICION DE ONU: </strong>{{$routers->onu_position}}
                    </div>
                    <div class="form-group">
                        <strong>DIRECCION MAC: </strong>{{$routers->mac_address}}
                    </div>
                    <div class="form-group">
                        <strong>DIRECCION IP: </strong>{{$routers->ip_number}}
                    </div>
                    <div class="form-group">
                        <strong>VLAN: </strong>{{$routers->vlan}}
                    </div>
                    <div class="form-group">
                        <strong>NUMERO DE PON O SFP: </strong>{{$routers->pon_number}}
                    </div>
                    <div class="form-group">
                        <strong>SLOT: </strong>{{$routers->slot}}
                    </div>
                    <div class="form-group">
                        <strong>IDENTIFICADOR: </strong>{{$routers->identification}}
                    </div>
                    <div class="form-group">
                        <strong>COLOR PICTEL: </strong>{{$routers->color_pictel}}
                    </div>
                    <div class="form-group">
                        <strong>STATUS: </strong>{{$routers->statusrouter->name}}
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
