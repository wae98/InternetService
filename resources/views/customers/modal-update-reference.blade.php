<!-- modal -->
<div class="modal fade" id="modal-update-reference-{{$reference->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Referencia Personal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('references.update', $reference)}}"  method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombres y Apellidos <b style="color: red">*</b></label>
                        <input type="text" name="names" class="form-control" id="names" value="{{$reference->names}}">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono <b style="color: red">*</b></label>
                        <input type="text" name="phone_number" class="form-control"  id="phone_number" value="{{$reference->phone_number}}">
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-dark" >Guardar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
