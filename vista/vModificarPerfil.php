<h2>Modificar Perfil</h2>
<div class="formulario" id="formulario">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
    <!-- Imagen de Perfil -->
    <img src="<?php decodificaImagen($usuario->imagenPerfil,"")?>" class="img-thumbnail img-fluid" height="10%" width="10%" alt="Imagen de Perfil"/>
    <!-- Nombre -->
    <div class="row mb-3 mt-3">
        <label for="idNombre" class="col-sm-2 col-form-label mt-3">Nombre</label>
        <div class="col-sm-5 mt-3">
        <input type="text" class="form-control" id="idNombre" placeholder="Nombre" name="nombre" value="<?php 
            echo $usuario->nombre;
        ?>">
        <?php
            // En caso de que esté vacío o mal formado, se muestra un error
            imprimeError($_SESSION["erroresModPerfil"],"idNombre",'nombre');
        ?>
        </div>
    </div>
    <!-- Apellido -->
    <div class="row mb-3 mt-3">
        <label for="idApellido" class="col-sm-2 col-form-label mt-3">Apellidos</label>
        <div class="col-sm-5 mt-3">
        <input type="text" class="form-control" id="idApellido" placeholder="Apellido" name="apellido" value="<?php 
            echo $usuario->apellido;
        ?>">
        <?php
            // En caso de que esté vacío o mal formado, se muestra un error
            imprimeError($_SESSION["erroresModPerfil"],"idApellido",'apellido');
        ?>
        </div>
    </div>
    <!-- Contraseña Actual -->
    <div class="row mb-3">
        <label for="idContraseñaActual" class="col-sm-2 col-form-label">Contraseña Actual</label>
        <div class="col-sm-5">
        <input type="password" class="form-control" id="idContraseñaActual" name="contraseñaActual" placeholder="Contraseña actual" value="<?php
            validaSiVacio("contraseñaActual","guardarMod");
        ?>">
        <?php
            // En caso de que esté vacío o mal formado, se muestra un error
            imprimeError($_SESSION["erroresModPerfil"],'idContraseñaActual','contraseñaActual');
        ?>
        </div>
    </div>
    <!-- Contraseña Nueva -->
    <div class="row mb-3">
        <label for="idContraseña" class="col-sm-2 col-form-label">Nueva Contraseña</label>
        <div class="col-sm-5">
        <input type="password" class="form-control" id="idContraseñaNueva" name="contraseñaNueva" placeholder="Contraseña nueva" value="<?php
            validaSiVacio("contraseñaNueva","guardarMod");
            ?>">
        <?php
            // En caso de que esté vacío o mal formado, se muestra un error
            imprimeError($_SESSION["erroresModPerfil"],'idContraseñaNueva','contraseñaNueva');
        ?>
        </div>
    </div>
    <!-- Confirmar Contraseña -->
    <div class="row mb-3">
        <label for="idContraseñaConf" class="col-sm-2 col-form-label">Confirmar Contraseña</label>
        <div class="col-sm-5">
        <input type="password" class="form-control" id="idContraseñaConf" name="contraseñaConf" placeholder="Confirmar nueva contraseña" value="<?php
            validaSiVacio("contraseñaConf","guardarMod");
        ?>">
        <?php
            // En caso de que esté vacío o mal formado, se muestra un error
            imprimeError($_SESSION["erroresModPerfil"],'idContraseñaConf','contraseñaConf');
        ?>
        </div>
    </div>
    <!-- Email -->
    <div class="row mb-3">
        <label for="idEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-5">
        <input type="email" class="form-control" id="idEmail" name="email" placeholder="Email" value="<?php
            echo $usuario->email;
        ?>">
        <?php
            // En caso de que esté vacío o mal formado, se muestra un error
            imprimeError($_SESSION["erroresModPerfil"],'idEmail','email');
        ?>
        </div>
    </div>
    <!-- Fecha de Nacimiento -->
    <div class="row mb-3">
        <label for="idFecha" class="col-sm-2 col-form-label">Fecha de nacimiento</label>
        <div class="col-sm-5">
        <input type="date" class="form-control" id="idFecha" name="fechaNacimiento" value="<?php
            echo $usuario->fechaNacimiento;
        ?>">
        <?php
            // En caso de que esté vacío o mal formado, se muestra un error
            imprimeError($_SESSION["erroresModPerfil"],'idFecha','fechaNacimiento');
        ?>
        </div>
    </div>
    <!-- Nº de teléfono -->
    <div class="row mb-3">
        <label for="idNumTelf" class="col-sm-2 col-form-label">Nº de teléfono</label>
        <div class="col-sm-5">
        <input type="number" class="form-control" id="idNumTelf" name="numTelefono" placeholder="Nº de teléfono" value="<?php
            echo $usuario->numTelefono;
        ?>">
        <?php
            // En caso de que esté vacío o mal formado, se muestra un error
            imprimeError($_SESSION["erroresModPerfil"],'idNumTelf','numTelefono');
        ?>
        </div>
    </div>
    <!-- Activo -->
    <input type="hidden" class="form-control" id="idActivo" name="activo" placeholder="Estado (Activo/Inactivo)" value="<?php
        if($usuario->activo)
            echo "true";
        else
            echo "false";
    ?>">
    <!-- Perfil -->
    <input type="hidden" class="form-control" id="idPerfil" name="perfil" value="<?php
        echo $usuario->perfil;
    ?>">
    <!-- Imagen de Perfil -->
    <div class="row mb-3">
        <label for="idImagenPerfil" class="col-sm-2 col-form-label">Imagen de Perfil</label>
        <div class="col-sm-5">
        <input type="file" class="form-control" id="idImagenPerfil" name="imagenPerfil">
        </div>
        </div>
    </div>
    <?php
        // En caso de que esté vacío o mal formado, se muestra un error
        imprimeError($_SESSION["erroresModPerfil"],'idImagenPerfil','imagenPerfil');
    ?>
    <hr>
    <button type="submit" class="btn btn-primary mb-3 m-1" name="guardarMod">Guardar Cambios</button>
    <button type="submit" class="btn btn-primary mb-3 m-1" name="volver">Volver</button>
</form>
</div>
<br><br><br><br>