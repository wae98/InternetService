@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

@endsection

@section('content_header')
@endsection

@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <b><h2>Reporte de Fallas</h2></b>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <h3>Reporte Excel</h3>
                            <form action="{{route('fails.excel')}}" method="POST" class="excel">
                                @csrf
                                <div class="table-responsive-sm">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <td>
                                                <label for="finicial">Fecha Inicial</label>
                                                <input type="date" name="init_date" id="init_date" class="form-control">
                                            </td>
                                            <td>
                                                <label for="ffinal">Fecha Final</label>
                                                <input type="date" name="end_date"  id="end_date" class="form-control">
                                            </td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <button type="submit" class="btn btn-outline-success">
                                                    <i class="fas fa-file-excel"> Generar Reporte </i>
                                                </button>
                                            </td>

                                        </tr>
                                        </tbody>
                                    </table>
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
@endsection

@section('js')
    <script src="{{ asset('js/report.js') }}"></script>
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
