<h2>Registrar un nuevo Usuario</h2>

<div class="formulario">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="formulario" id="idFormulario" enctype="multipart/form-data">
        <!-- ID - (Oculto) -->
        <input type="hidden" name="idUsuario" id="idUsuario" size="25"  value="<?php
            echo "1";
        ?>">
        <!-- Nombre -->
        <div class="row mb-3 mt-3">
            <label for="idNombre" class="col-sm-2 col-form-label mt-3">Nombre</label>
            <div class="col-sm-5 mt-3">
            <input type="text" class="form-control" id="idNombre" placeholder="Nombre" name="nombre" value="<?php 
                // Si no está vacío, se guarda el texto introducido
                validaSiVacio("nombre","registro");
                
            ?>">
            <?php
                // En caso de que esté vacío o mal formado, se muestra un error
                imprimeError($_SESSION["erroresRegistro"],"idNombre",'nombre');
            ?>
            </div>
        </div>
        <!-- Apellido -->
        <div class="row mb-3 mt-3">
            <label for="idApellido" class="col-sm-2 col-form-label mt-3">Apellido</label>
            <div class="col-sm-5 mt-3">
            <input type="text" class="form-control" id="idApellido" placeholder="Apellido" name="apellido" value="<?php 
                // Si no está vacío, se guarda el texto introducido
                validaSiVacio("apellido","registro");
                
            ?>">
            <?php
                // En caso de que esté vacío o mal formado, se muestra un error
                imprimeError($_SESSION["erroresRegistro"],"idApellido",'apellido');
            ?>
            </div>
        </div>
        <!-- Contraseña -->
        <div class="row mb-3">
            <label for="idContraseña" class="col-sm-2 col-form-label">Contraseña</label>
            <div class="col-sm-5">
            <input type="password" class="form-control" id="idContraseña" name="contraseña" placeholder="Contraseña" value="<?php
                
                validaSiVacio("contraseña","registro")
            ?>">
            <?php
                // En caso de que esté vacío o mal formado, se muestra un error
                imprimeError($_SESSION["erroresRegistro"],'idContraseña','contraseña');
            ?>
            </div>
        </div>
        <!-- Confirmar Contraseña -->
        <div class="row mb-3">
            <label for="idContraseñaConf" class="col-sm-2 col-form-label">Confirmar Contraseña</label>
            <div class="col-sm-5">
            <input type="password" class="form-control" id="idContraseñaConf" name="contraseñaConf" placeholder="Confirmar contraseña" value="<?php
                
                validaSiVacio("contraseñaConf","registro")
            ?>">
            <?php
                // En caso de que esté vacío o mal formado, se muestra un error
                imprimeError($_SESSION["erroresRegistro"],'idContraseñaConf','contraseñaConf');
            ?>
            </div>
        </div>
        <!-- Email -->
        <div class="row mb-3">
            <label for="idEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-5">
            <input type="email" class="form-control" id="idEmail" name="email" placeholder="Email" value="<?php
                
                validaSiVacio("email","registro")
            ?>">
            <?php
                // En caso de que esté vacío o mal formado, se muestra un error
                imprimeError($_SESSION["erroresRegistro"],'idEmail','email');
            ?>
            </div>
        </div>
        <!-- Fecha de Nacimiento -->
        <div class="row mb-3">
            <label for="idFecha" class="col-sm-2 col-form-label">Fecha de nacimiento</label>
            <div class="col-sm-5">
            <input type="date" class="form-control" id="idFecha" name="fechaNacimiento" placeholder="Fecha de nacimiento" value="<?php
                
                validaSiVacio("fechaNacimiento","registro")
            ?>">
            <?php
                // En caso de que esté vacío o mal formado, se muestra un error
                imprimeError($_SESSION["erroresRegistro"],'idFecha','fechaNacimiento');
            ?>
            </div>
        </div>
        <!-- Nº de teléfono -->
        <div class="row mb-3">
            <label for="idNumTelf" class="col-sm-2 col-form-label">Nº de teléfono</label>
            <div class="col-sm-5">
            <input type="number" class="form-control" id="idNumTelf" name="numTelefono" placeholder="Nº de teléfono" value="<?php
                
                validaSiVacio("numTelefono","registro")
            ?>">
            <?php
                // En caso de que esté vacío o mal formado, se muestra un error
                imprimeError($_SESSION["erroresRegistro"],'idNumTelf','numTelefono');
            ?>
            </div>
        </div>
        <!-- Activo -->
        <input type="hidden" name="activo" id="idActivo" value="<?php
            // Por defecto, los nuevos usuarios registrados no estarán activos
            echo "false";
        ?>">
        <!-- Imagen de Perfil -->
        <div class="row mb-3">
            <label for="idImagenPerfil" class="col-sm-2 col-form-label">Imagen de Perfil</label>
            <div class="col-sm-5">
            <input type="file" class="form-control" id="idImagenPerfil" name="imagenPerfil">
            </div>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary mb-3 m-1" name="registro">Registrar</button>
        <button type="submit" class="btn btn-primary mb-3 m-1" name="volver">Volver</button>
    </form>
</div>