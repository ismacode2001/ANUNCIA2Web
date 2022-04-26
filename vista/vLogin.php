
<!-- Formulario de Login del Usuario -->
<div class="formulario">
  <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
  
  <!-- Email -->
  <section>
      <label for="email">Email:</label> 
      <input type="text" name="email" id="email" placeholder="Email" value="<?php 
          
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
    </section>

    <!-- Contraseña -->
    <section>
      <label for="pass">Contraseña:</label> 
      <input type="password" name="pass" id="pass" placeholder="Contraseña" value="<?php
          
          validaSiVacio("pass","iniciar")
      ?>">
      <?php
          // En caso de que esté vacío o mal formado, se muestra un error
          imprimeError($_SESSION["erroresLogin"],'pass','pass');
      ?>
    </section>

    <!-- Recordar usuario -->
    <section>
      <label for="check">Recordar Usuario</label>
      <input type="checkbox" name="check" id="check" <?php 
          // Si esxiste la cookie... recuerdo el check
          if(isset($_COOKIE["recordarUsuario"]))
              echo "checked";
        ?>>
    </section><br>

    <input type="submit" value="Iniciar Sesión" name="iniciar">
    <input type="submit" value="Registro" name="registro">
    <input type="submit" value="Volver" name="volver">
  </form>
</div>