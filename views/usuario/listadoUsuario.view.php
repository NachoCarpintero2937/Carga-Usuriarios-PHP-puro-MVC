<div class="container div_principal">
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex title_card">
                <div>
                    <h5> Listado de usuarios</h5>

                </div>
                <div>
                    <button type="button" class="btn-floating btn-success" onclick="getAtributeUsers();" data-toggle="modal" data-target="#basicExampleModal" style="background: #3ea467e8!important"><i class="fas fa-plus"></i></button>
                </div>
            </div>
            <div class="p-4">
                <div class="md-form add_user">
                    <div>
                        <input type="text" id="filtro_generico" onkeyup="loadTable(1)" class="form-control">
                        <label for="form1">Filtro genérico</label>
                    </div>

                </div>
            </div>
            <table class="table" id="dtMaterialDesignExample">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha alta</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="users">
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal de crear editar y ver -->
<?php require_once 'views/usuario/modals/accion.view.php' ?>