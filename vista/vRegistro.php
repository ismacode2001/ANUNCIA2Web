<div class="formulario">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="formulario" id="idFormulario">
        
        <h2>Registrar un nuevo Usuario</h2>

        <!-- ID - (Oculto) -->
        <section>
            <input type="hidden" name="idUsuario" id="idUsuario" size="25"  value="<?php
                    // Si no está vacío, se guarda el texto introducido
                    //validaSiVacio("nombre","registro");
                    echo "1";
                ?>">

                <?php
                    // En caso de que esté vacío o mal formado, se muestra un error
                    //imprimeError($_SESSION["erroresRegistro"],"idNombre",'nombre');
                ?>
        </section>

        <!-- Nombre - Alfabetico -->
        <section>
            <label for="idNombre">Nombre:</label>

            <input type="text" name="nombre" id="idNombre" size="40" placeholder="Nombre" value="<?php
                    // Si no está vacío, se guarda el texto introducido
                    validaSiVacio("nombre","registro");
                ?>">

                <?php
                    // En caso de que esté vacío o mal formado, se muestra un error
                    imprimeError($_SESSION["erroresRegistro"],"idNombre",'nombre');
                ?>
        </section>

        <!-- Apellido - Alfabetico -->
        <section>
            <label for="idApellido">Apellido:</label>

            <input type="text" name="apellido" id="idApellido" size="40" placeholder="Apellido" value="<?php
                    // Si no está vacío, se guarda el texto introducido
                    validaSiVacio("apellido","registro");
                ?>">

                <?php
                    // En caso de que esté vacío o mal formado, se muestra un error
                    imprimeError($_SESSION["erroresRegistro"],"idApellido",'apellido');
                ?>
        </section>

        <!-- Contraseña - Input de Password -->
        <section>
            <label for="idPass">Contraseña:</label>

            <input type="password" name="contraseña" id="idPass" placeholder="Contraseña" value="<?php

                // Si no está vacío, se guarda el texto introducido
                validaSiVacio('contraseña',"registro");
            ?>">

            <?php
                // En caso de que esté vacío o mal formado, se muestra un error
                imprimeError($_SESSION["erroresRegistro"],"idPass",'contraseña');
            ?>
        </section>

        <!-- Contraseña (Confirmacion) - Input de Password -->
        <section>
            <label for="idPass">Confirmación de Contraseña:</label>
            <input type="password" name="contraseñaConf" id="idPassConf" placeholder="Confirme su Contraseña" value="<?php
                // Si no está vacío, se guarda el texto introducido
                validaSiVacio('contraseñaConf','registro');
            
            ?>">

            <?php
                // En caso de que esté vacío o mal formado, se muestra un error
                imprimeError($_SESSION["erroresRegistro"],'idPassConf','contraseñaConf');
            ?>
        </section>

        <!-- E-mail  -->
        <section>
            <label for="idEmail">E-mail:</label>
            <input type="email" name="email" id="idEmail" size="40" placeholder="E-mail" value="<?php
                // Si no está vacío, se guarda el texto introducido
                validaSiVacio('email','registro');
            ?>">

            <?php
                // En caso de que esté vacío o mal formado, se muestra un error
                imprimeError($_SESSION["erroresRegistro"],'idEmail','email');
            ?>
        </section>

        <!-- Fecha de Nacimiento -->
        <section>
            <label for="idFecha">Fecha de Nacimiento:</label>
            <input type="date" name="fechaNacimiento" id="idfecha" size="40" value="<?php
                // Si no está vacío, se guarda el texto introducido
                validaSiVacio('fechaNacimiento','registro');
            ?>">

            <?php
                // En caso de que esté vacío o mal formado, se muestra un error
                imprimeError($_SESSION["erroresRegistro"],'idfecha','fechaNacimiento');
            ?>
        </section>

        <!-- Nº de Teléfono -->
        <section>
            <label for="idNumTelf">Nº de teléfono</label>
            <input type="number" name="numTelefono" id="idfecha" size="9" placeholder="Nº de teléfono" value="<?php
                // Si no está vacío, se guarda el texto introducido
                validaSiVacio('numTelefono','registro');
            ?>">

            <?php
                // En caso de que esté vacío o mal formado, se muestra un error
                imprimeError($_SESSION["erroresRegistro"],'idNumTelf','numTelefono');
            ?>
        </section>

        <!-- Activo -->
        <section>
            <input type="hidden" name="activo" id="idActivo" value="<?php
                // Por defecto, los nuevos usuarios registrados no estarán activos
                echo "false";
            ?>">
        </section>
        <br>
        <hr>

        <input type="submit" value="Registrar" name="registro">
        <input type="submit" value="Volver" name="volver">
        
    </form>
</div>