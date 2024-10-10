<div class="modal fade" id="insertarClientes" tabindex="-1">

        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registro de clientes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formularioClientes" method="post">
                        <div class="form-group">
                            <label for="nombre ">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="off">
                            <small id="nombre" class="form-text text-muted">Nombre con el que se va registrar.</small>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Nombre</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" autocomplete="off">
                            <small id="apellido" class="form-text text-muted">Apellido(s).</small>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo" autocomplete="off">
                            <small id="correo" class="form-text text-muted">Correo con el que se va registrar.</small>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Número telefónico</label>
                            <input type="number" class="form-control" id="telefono" name="telefono" autocomplete="off">
                            <small id="telefono" class="form-text text-muted">Número de teléfono con el que se va registrar.</small>
                        </div>
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" autocomplete="off">
                            <small id="usuario" class="form-text text-muted">Nombre de usuario con el que se va registrar.</small>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" autocomplete="off">
                            <small id="password" class="form-text text-muted">Contraseña.</small>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>

  
</div>