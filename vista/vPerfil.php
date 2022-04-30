<div class="formulario">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    
    <!-- Imagen de Perfil -->
    <img src="./webroot/img/usuario.png" height="70px" alt="Imagen de Perfil"/>

    <!-- Id del Usuario -->
    <div class="row mb-3 mt-3">
        <label for="idNombre" class="col-sm-2 col-form-label mt-3">Id</label>
        <div class="col-sm-5 mt-3">
        <input type="text" class="form-control" id="user" placeholder="Id del Usuario" readonly name="user" value="<?php 
            echo $usuario->idUsuario;            
        ?>">
        <input type="hidden" name="user" id="user" value="<?php 
            echo $usuario->idUsuario;    
        ?>">
        </div>
    </div>

    <!-- Nombre -->
    <div class="row mb-3 mt-3">
        <label for="idNombre" class="col-sm-2 col-form-label mt-3">Nombre</label>
        <div class="col-sm-5 mt-3">
        <input type="text" class="form-control" id="idNombre" placeholder="Nombre" name="nombre" value="<?php 
            echo $usuario->nombre;
            
        ?>">
        <?php
            // En caso de que esté vacío o mal formado, se muestra un error
            imprimeError($_SESSION["erroresPerfil"],"idNombre",'nombre');
        ?>
        </div>
    </div>
    <!-- Apellido -->
    <div class="row mb-3 mt-3">
        <label for="idApellido" class="col-sm-2 col-form-label mt-3">Apellido</label>
        <div class="col-sm-5 mt-3">
        <input type="text" class="form-control" id="idApellido" placeholder="Apellido" name="apellido" value="<?php 
            echo $usuario->apellido;
            
        ?>">
        <?php
            // En caso de que esté vacío o mal formado, se muestra un error
            imprimeError($_SESSION["erroresPerfil"],"idApellido",'apellido');
        ?>
        </div>
    </div>
    <!-- Contraseña -->
    <div class="row mb-3">
        <label for="idContraseña" class="col-sm-2 col-form-label">Contraseña</label>
        <div class="col-sm-5">
        <input type="password" class="form-control" id="idContraseña" name="contraseña" placeholder="Contraseña" value="<?php
            echo $usuario->contraseña;
        ?>">
        <?php
            // En caso de que esté vacío o mal formado, se muestra un error
            imprimeError($_SESSION["erroresPerfil"],'idContraseña','contraseña');
        ?>
        </div>
    </div>
    <!-- Confirmar Contraseña -->
    <div class="row mb-3">
        <label for="idContraseñaConf" class="col-sm-2 col-form-label">Confirmar Contraseña</label>
        <div class="col-sm-5">
        <input type="password" class="form-control" id="idContraseñaConf" name="contraseñaConf" placeholder="Confirmar contraseña" value="<?php
            echo $usuario->contraseña;
        ?>">
        <?php
            // En caso de que esté vacío o mal formado, se muestra un error
            imprimeError($_SESSION["erroresPerfil"],'idContraseñaConf','contraseñaConf');
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
            imprimeError($_SESSION["erroresPerfil"],'idEmail','email');
        ?>
        </div>
    </div>
    <!-- Fecha de Nacimiento -->
    <div class="row mb-3">
        <label for="idFecha" class="col-sm-2 col-form-label">Fecha de nacimiento</label>
        <div class="col-sm-5">
        <input type="date" class="form-control" id="idFecha" name="fechaNacimiento" placeholder="Fecha de nacimiento" value="<?php
            echo $usuario->fechaNacimiento;
        ?>">
        <?php
            // En caso de que esté vacío o mal formado, se muestra un error
            imprimeError($_SESSION["erroresPerfil"],'idFecha','fechaNacimiento');
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
            imprimeError($_SESSION["erroresPerfil"],'idNumTelf','numTelefono');
        ?>
        </div>
    </div>
    <!-- Activo -->
    <div class="row mb-3">
        <label for="idActivo" class="col-sm-2 col-form-label">Estado</label>
        <div class="col-sm-5">
        <input type="text" class="form-control" id="idActivo" name="numTelefono" placeholder="Estado (Activo/Inactivo)" value="<?php
            if($usuario->activo)
                echo "Activo";   
            else
                echo "Inactivo";
        ?>">
        <?php
            // En caso de que esté vacío o mal formado, se muestra un error
            imprimeError($_SESSION["erroresPerfil"],'idActivo','numTelefono');
        ?>
        </div>
    </div>
    <hr>
    <button type="submit" class="btn btn-primary mb-3 m-1" name="modificar">Modificar</button>
    <button type="submit" class="btn btn-primary mb-3 m-1" name="volver">Volver</button>
</form>
</div>