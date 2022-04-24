<div class="formulario">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    
    <!-- Imagen de Perfil -->
    <section>
        <img src="./webroot/img/usuario.png" height="70px" alt="Imagen de Perfil"/>
    </section>

    <!-- User -->
    <section>
        <label  class="form-group"  for="user">User:</label> 
        <input type="text" name="user" id="user" readonly value="<?php 
            echo $usuario->idUsuario;
        ?>"> <!-- Lo muestra -->
        <input type="hidden" name="user" id="user" value="<?php 
            echo $usuario->idUsuario;    
        ?>"> <!-- Lo envía -->
        <br><br>
    </section>

    <!-- Contraseña -->
    <section>
        <label class="form-group" for="pass">Contraseña:</label> 
        <input  type="password" name="pass" id="idPass" size="20" placeholder="Contraseña" value="<?php        
            //echo $usuario->contraseña;

            // Si no está vacío, se guarda el texto introducido
            validaSiVacio("pass","modificar");
        ?>">

        <?php
            // En caso de que esté vacío o mal formado, se muestra un error
            imprimeError($_SESSION["erroresPerfil"],"idPass",'pass');
        ?>
        <br><br>
    </section>

    <!-- Repetir contraseña -->
    <section>
        <label class="form-group" for="pass">Repetir contraseña:</label> 
        <input type="password" name="pass2" id="pass2" size="20" placeholder="Confirma contraseña" value="<?php 
            
            //echo $usuario->contraseña;
            
            // Si no está vacío, se guarda el texto introducido
            validaSiVacio("pass2","modificar");
        ?>">
        <?php
            // En caso de que esté vacío o mal formado, se muestra un error
            imprimeError($_SESSION["erroresPerfil"],"pass2",'pass2');
        ?>
        <br><br>
    </section>

    <!-- E-mail  -->
    <section>
        <label for="idEmail">E-mail:</label>
        <input type="email" name="email" id="idEmail" size="30" placeholder="E-mail" value="<?php

            echo $usuario->email;

            // Si no está vacío, se guarda el texto introducido
           // validaSiVacio('email','modificar');
        ?>">

        <?php
            // En caso de que esté vacío o mal formado, se muestra un error
            imprimeError($_SESSION["erroresPerfil"],'idEmail','email');
        ?>
    </section>

    <!-- Fecha de Nacimiento -->
    <section>
        <label for="idFecha">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" id="idfecha" value="<?php

            echo $usuario->fechaNacimiento;
            // Si no está vacío, se guarda el texto introducido
            //validaSiVacio('fecha_nacimiento','modificar');
        ?>">

        <?php
            // En caso de que esté vacío o mal formado, se muestra un error
            imprimeError($_SESSION["erroresPerfil"],'idfecha','fecha_nacimiento');
        ?>
    </section>

    <!-- Nº de teléfono -->
    <section>
        <label for="idNumTelf">Nº de telf:</label>
        <input type="number" name="numTelf" id="idNumTelf" size="9" placeholder="Nº de telf" value="<?php

            echo $usuario->numTelefono;
            // Si no está vacío, se guarda el texto introducido
            //validaSiVacio('fecha_nacimiento','modificar');
        ?>">

        <?php
            // En caso de que esté vacío o mal formado, se muestra un error
            imprimeError($_SESSION["erroresPerfil"],'idfecha','fecha_nacimiento');
        ?>
    </section>

    <!-- Perfil -->
    <section>
        <label class="form-group" for="perfil">Perfil:</label> 
        <input type="text" name="perfil" id="perfil" placeholder="Perfil" readonly value="<?php 
            
            echo $usuario->perfil;    
        ?>">
    </section>

    <!-- Activo -->
    <section>
        <label class="form-group" for="perfil">Activo:</label> 
        <input type="text" name="perfil" id="perfil" placeholder="Activo" readonly value="<?php 

            if($usuario->activo)
                echo "Activo";   
            else
                echo "Inactivo";
        ?>">
    </section>
    <br><br>


    
    <input type="submit" value="Modificar" name="modificar">
    <input type="submit" value="Volver" name="volver">
    
</form>
</div>