<h2>Registrar un nuevo Usuario</h2>

<div class="formulario">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="formulario" id="idFormulario" enctype="multipart/form-data">
        <!-- ID - (Oculto) -->
        <input type="hidden" name="idUsuario" id="idUsuario" size="25" value="<?php
            echo "1";
        ?>">
        <!-- Nombre -->
        <div class="row mb-3 mt-3">
            <label for="idNombre" class="col-sm-2 col-form-label mt-3">Nombre</label>
            <div class="col-sm-5 mt-3">
                <div class="input-group">
                    <input type="text" class="form-control" id="idNombre" placeholder="Nombre" name="nombre" maxlength="20" onkeyup="compruebaLongitud('idNombre','contadorNombreRegistro','20')" value="<?php 
                        // Si no está vacío, se guarda el texto introducido
                        validaSiVacio("nombre","registro");
                    ?>">
                    <div class="input-group-text"><i><small id="contadorNombreRegistro">0/20</small></i></div>
                </div>
                <?php
                    // En caso de que esté vacío o mal formado, se muestra un error
                    imprimeError($_SESSION["erroresRegistro"],"idNombre",'nombre');
                ?>
            </div>
        </div>
        <!-- Apellidos -->
        <div class="row mb-3 mt-3">
            <label for="idApellido" class="col-sm-2 col-form-label mt-3">Apellidos</label>
            <div class="col-sm-5 mt-3">
                <div class="input-group">
                    <input type="text" class="form-control" id="idApellido" placeholder="Apellidos" name="apellido" maxlength="30" onkeyup="compruebaLongitud('idApellido','contadorApellidoRegistro','30')" value="<?php 
                        // Si no está vacío, se guarda el texto introducido
                        validaSiVacio("apellido","registro");
                    ?>">
                    <div class="input-group-text"><i><small id="contadorApellidoRegistro">0/30</small></i></div>
                </div>
                <?php
                    // En caso de que esté vacío o mal formado, se muestra un error
                    imprimeError($_SESSION["erroresRegistro"],"idApellido",'apellido');
                ?>
            </div>
        </div>
        
        <!-- Contraseña -->
        <div class="row mb-3 mt-3">
            <label for="idContraseña" class="col-sm-2 col-form-label m3-t">Contraseña</label>
            <div class="col-sm-5 mt-3">
            <div class="input-group">
                <input type="password" class="form-control" id="idContraseña" name="contraseña" maxlength="20" onkeyup="compruebaLongitud('idContraseña','contadorContraseñaRegistro','20')" placeholder="Contraseña" value="<?php
                    // Si no está vacío, se guarda el texto introducido
                    validaSiVacio("contraseña","registro")
                ?>">
                <div class="input-group-text"><i><small  id="contadorContraseñaRegistro">0/20</small></i></div>
            </div>
            <?php
                // En caso de que esté vacío o mal formado, se muestra un error
                imprimeError($_SESSION["erroresRegistro"],'idContraseña','contraseña');
            ?>
            </div>
        </div>
        <!-- Confirmar Contraseña -->
        <div class="row mb-3">
            <label for="idContraseñaConf" class="col-sm-2 col-form-label">Confirmar Contraseña</label>
            <div class="col-sm-5 mt-3">
                <div class="input-group">
                <input type="password" class="form-control" id="idContraseñaConf" name="contraseñaConf" maxlength="20" onkeyup="compruebaLongitud('idContraseñaConf','contadorContraseñaConfRegistro','20')" placeholder="Confirmar contraseña" value="<?php
                    // Si no está vacío, se guarda el texto introducido
                    validaSiVacio("contraseñaConf","registro")
                ?>">
                <div class="input-group-text"><i><small id="contadorContraseñaConfRegistro">0/20</small></i></div>
            </div>
            <?php
                // En caso de que esté vacío o mal formado, se muestra un error
                imprimeError($_SESSION["erroresRegistro"],'idContraseñaConf','contraseñaConf');
            ?>
            </div>
        </div>
        <!-- Email -->
        <div class="row mb-3">
            <label for="idEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-5 mt-3">
                <div class="input-group">
                <input type="email" class="form-control" id="idEmail" name="email" placeholder="Email" maxlength="30" onkeyup="compruebaLongitud('idEmail','contadorEmailRegistro','30')" value="<?php
                    // Si no está vacío, se guarda el texto introducido
                    validaSiVacio("email","registro")
                ?>">
                <div class="input-group-text"><i><small id="contadorEmailRegistro">0/30</small></i></div>
            </div>
            <?php
                // En caso de que esté vacío o mal formado, se muestra un error
                imprimeError($_SESSION["erroresRegistro"],'idEmail','email');
            ?>
            </div>
        </div>
        <!-- Fecha de Nacimiento -->
        <div class="row mb-3">
            <label for="idFecha" class="col-sm-2 col-form-label">Fecha de nacimiento</label>
            <div class="col-sm-5 mt-3">
            <input type="date" class="form-control" id="idFecha" name="fechaNacimiento" placeholder="Fecha de nacimiento" value="<?php
                // Si no está vacío, se guarda el texto introducido
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
            <div class="col-sm-5 mt-3">
                <div class="input-group">
                <input type="tel" class="form-control" id="idNumTelf" name="numTelefono" maxlength="9" placeholder="Nº de teléfono" onkeyup="compruebaLongitud('idNumTelf','contadorTelfRegistro','9')" value="<?php
                    // Si no está vacío, se guarda el texto introducido
                    validaSiVacio("numTelefono","registro")
                ?>">
                <div class="input-group-text"><i><small id="contadorTelfRegistro">0/9</small></i></div>
            </div>
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
            <?php
                // En caso de que esté vacío o mal formado, se muestra un error
                imprimeError($_SESSION["erroresRegistro"],'idImagenPerfil','imagenPerfil');
            ?>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary mb-3 m-1" name="registro">Registrar</button>
        <button type="submit" class="btn btn-primary mb-3 m-1" name="volver">Volver</button>
    </form>
</div>