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
                            <a class="btn btn-primary" href="{{ route('customers.index') }}"> Atras</a>
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
                                        <label> COBRADOR</label>
                                        <select name="user_id" class="form-control" id="user_id">
                                            <optgroup label="Seleccion actual">
                                                <option value="{{$customers->user_id}}" selected>{{$customers->user->name}}</option>
                                            </optgroup>
                                            <optgroup label="Status">
                                                @foreach ($users as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                        @error('user_id')
                                        <small style="color:red">{{ $message }}</small>
                                        <br>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="table-responsive-sm" >
                                <div style="width: 100%;display: flex;padding: 1%">
                                    <div style="text-align: left; width: 75%">
                                        <h4 class="">Referencias Personales</h4>
                                    </div>
                                    <div style="text-align: right; width: 25%" >
                                        <button type="button"  class="btn btn-success btn-sm add-option">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                                <table class="table table-bordered table-striped table-hover options">
                                    <thead>
                                    <tr>
                                        <th>NOMBRE COMPLETO</th>
                                        <th>TELEFONO</th>
                                        <th>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(old('option_text', ['']) as $key => $questionOption)
                                        <tr>
                                            <td>
                                                <input
                                                    class="form-control{{ $errors->has('option_text' . $key) ? 'is-invalid' : '' }}"
                                                    type="text"
                                                    name="option_text[{{ $loop->index }}]"
                                                    value="{{ $questionOption }}"
                                                    required>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="is_correct[{{ $loop->index }}]" value="{{$questionOption}}">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-xs btn-danger delete-option">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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


@section('js')
    <script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-ui/jquery-ui.min.js') }}"></script>

    <script>
        $(function () {
            let $options = $('table.options tbody');
            let index = $options.find('tr').length;

            $('.add-option').click(function (e) {
                e.preventDefault();
                if ($options.find('tr:last input[type="text"]').val()) {
                    let $newRow = $options.find('tr:last').clone();
                    $newRow.find('td input[type="text"]').prop({
                        value: '',
                        name: 'option_text[' + index + ']'
                    });
                    $newRow.find('td input[type="number"]').prop({
                        value: '',
                        name: 'is_correct[' + index + ']'
                    });
                    index++;
                    $newRow.appendTo($options);
                }
            });

            $options.on('click', '.delete-option', function (e) {
                e.preventDefault();
                if ($options.find('tr').length > 0) {
                    $(this).closest('tr').remove();
                }
            });
        });
    </script>
@endsection
