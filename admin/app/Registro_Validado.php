<div class="form-group">
    <label class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Nombre" name="nombre" <?php $validador->mostrar_nombre(); ?>>
        <?php $validador->mostrar_error_nombre(); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Apellido</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Apellido" name="apellido" <?php $validador->mostrar_apellido(); ?>>
        <?php $validador->mostrar_error_apellido(); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Fecha de nacimiento</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Fecha de nacimiento" name="fechaNacimiento">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Email" name="email">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Usuario</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Usuario" name="usuario" <?php $validador->mostrar_usuario(); ?>>
        <?php $validador->mostrar_error_usuario(); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Contraseña</label>
    <div class="col-sm-10">
        <input type="password" class="form-control" placeholder="Contraseña" name="clave1">
        <?php $validador->mostrar_error_clave1(); ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Repetir la contraseña</label>
    <div class="col-sm-10">
        <input type="password" class="form-control" placeholder="Repite la contraseña" name="clave2">
        <?php $validador->mostrar_error_clave2(); ?>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary" name="enviar">Guardar</button>
    </div>
</div>