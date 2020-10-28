<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title_modal">Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" onclick="limpiarForm();" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="formData">
                    <div class="form-group">
                        <label for="form1">Nombre *</label>
                        <input id="nombre" class="form-control">

                    </div>
                    <div class="form-group">
                        <label for="form1">Usuario *</label>
                        <input id="usuario" class="form-control">
                    </div>
                    <div id="password_div" class="form-group">
                        <label for="form1">Contraseña *</label>
                        <input id="password" type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="form1"> Email *</label>
                        <input id="email" class="form-control">
                    </div>

                    <div class="d-none form-group" id="fecha_div">
                        <label for="form1"> Fecha de alta</label>
                        <input id="fecha_alta" readonly disabled class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="form1"> Tipo de usuario</label>
                        <select id="tipo_usuario" class="browser-default custom-select form-control">
                            <option selected disabled>Seleccionar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="form1"> Estado</label>
                        <select id="estado_usuario" class="browser-default custom-select form-control">
                            <option selected disabled>Seleccionar</option>
                        </select>
                    </div>

            </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-defualt" onclick="limpiarForm();" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="submit" onclick="submit();">Guardar</button>
            </div>
        </div>
    </div>
</div>