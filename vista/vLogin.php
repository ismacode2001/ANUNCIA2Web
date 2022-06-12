<!-- Formulario de Login del Usuario -->
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" id="formulario">
  <!-- Logo -->
  <img class="mb-4" src="<?php echo IMAGENES . "logoAnuncia2.png"; ?>" alt="" width="72" height="72">
  <h1 class="h3 mb-3 fw-normal">Inicie Sesión</h1>
  <!-- Email -->
  <div class="row mb-3 mt-3">
    <label for="email" class="col-sm-2 col-form-label mt-3">Email</label>
    <div class="col-sm-5 mt-3">
      <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php 
          if(!validaSiVacio("email","iniciar"))
          {
            // Si se quiere recordar el usuario...
            if(isset($_COOKIE["recordarUsuario"]))
                echo $_COOKIE["recordarUsuario"];
          }
          
      ?>">
      <?php
          // En caso de que esté vacío o mal formado, se muestra un error
          imprimeError($_SESSION["erroresLogin"],"email",'email');
            ?>
    </div>
  </div>
  <!-- Contraseña -->
  <div class="row mb-3">
    <label for="pass" class="col-sm-2 col-form-label">Contraseña</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" id="pass" name="pass" value="<?php
          
          validaSiVacio("pass","iniciar")
      ?>">
      <?php
          // En caso de que esté vacío o mal formado, se muestra un error
          imprimeError($_SESSION["erroresLogin"],'pass','pass');
      ?>
    </div>
  </div>
  <!-- Recordar Usuario -->
  <div class="row mb-3">
    <div class="col-sm-10 offset-sm-2">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="check" name="check"" <?php 
          // Si esxiste la cookie... recuerdo el check
          if(isset($_COOKIE["recordarUsuario"]))
              echo "checked";
        ?>>
        <label class="form-check-label" for="check">
          Recuérdame
        </label>
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary mb-3 m-1" name="iniciar">Iniciar sesión</button>
  <button type="submit" class="btn btn-primary mb-3 m-1" name="registro">Registrarse</button>
  <button type="submit" class="btn btn-primary mb-3 m-1" name="volver">Volver</button>
</form>