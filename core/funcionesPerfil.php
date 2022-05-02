<?php
    // Constantes //
  define("TXT_CAMPO_OBLIGATORIO","¡Campo obligatorio!");

  // Funcion que invoca al resto de funciones que van validando el formulario
  function validaFormularioPerfil($nombre)
  {
      // Si se ha enviado el formulario...
      if (validaEnviado($nombre)) 
      {
          $correcto = true;

          // Nombre //
          if (empty($_REQUEST['nombre']))
          {
              $correcto = false;
              $_SESSION["erroresModPerfil"]["nombre"] = TXT_CAMPO_OBLIGATORIO;
          }
        
          // Apellidos //
          if (empty($_REQUEST['apellido']))
          {
              $correcto = false;
              $_SESSION["erroresModPerfil"]["apellido"] = TXT_CAMPO_OBLIGATORIO;
          }

          // Contraseña Actual //
          if(empty($_REQUEST['contraseñaActual']))
          {
              $correcto = false;
              $_SESSION["erroresModPerfil"]["contraseñaActual"] = TXT_CAMPO_OBLIGATORIO;
          }
          else
          {
            $usuario = UsuarioDAO::findByEmail($_SESSION["email"]);

            if($usuario->contraseña != hash('sha256', $_REQUEST["contraseñaActual"]))
            {
                $correcto = false;
                $_SESSION["erroresModPerfil"]["contraseñaActual"] = "La contraseña actual es incorrecta";
            }
          }

          // Contraseña Nueva //
          if(empty($_REQUEST['contraseñaNueva']))
          {
              $correcto = false;
              $_SESSION["erroresModPerfil"]["contraseñaNueva"] = TXT_CAMPO_OBLIGATORIO;
          }

          // Contraseña (confirmacion) //
          if (empty($_REQUEST['contraseñaConf']))
          {
              $correcto = false;
              $_SESSION["erroresModPerfil"]["contraseñaConf"] = TXT_CAMPO_OBLIGATORIO;
          }
          else if(!coincidenContraseñas($nombre))
          {
              $correcto = false;
              $_SESSION["erroresModPerfil"]["contraseñaConf"] = "Las contraseñas no coinciden";
          }
          
          // Email //
          if (empty($_REQUEST['email']))
          {
              $correcto = false;
              $_SESSION["erroresModPerfil"]["email"] = TXT_CAMPO_OBLIGATORIO;
          }
          
          // Fecha de Nacimiento //
          if (empty($_REQUEST['fechaNacimiento']))
          {
              $correcto = false;
              $_SESSION["erroresModPerfil"]["fechaNacimiento"] = TXT_CAMPO_OBLIGATORIO;
          }

          // Nº de teléfono //
          if (empty($_REQUEST['numTelefono']))
          {
              $correcto = false;
              $_SESSION["erroresModPerfil"]["numTelefono"] = TXT_CAMPO_OBLIGATORIO;
          }
  
      }
      // Si no...
      else 
          $correcto = false;
      
      return $correcto;
  }

  // Funcion que valida la contraseña del usuario con un patrón
  function validaContraseña($validando,$campo)
  {
      /* // Patrón que valida la contraseña
          - Mínimo 8 carácteres, máximo 20
          -Al final: una mayúscula, una minúscula y un número 
      */
      $patron = "/^[A-Za-z0-9]{5,}([A-Z]{1}[a-z]{1}[0-9]{1})$/";
      $correcto = false;

      if((isset($_REQUEST[$campo])&&(!empty($_REQUEST[$campo]))))
      {
          $contraseña = $_REQUEST[$campo];

          // Si cumple el patrón...
          if(preg_match($patron, $contraseña) == true)
          {
              $correcto = true;
          }
          // Si no...
          else
          {
              $correcto = false;

              // En el caso de que esté validando...
              if($validando)
              {
                  ?>
                  <label for="<?php  ?>" style="color:red;"><?php echo "Debe introducir una contraseña válida" ?></label>
                  <?php
              }
              
          }
      }

      return $correcto;
  }

  // Funcion que comprueba si ambas contraseñas coinciden //
  function coincidenContraseñas($nombre)
  {
      $coincidentes = false;

      if(validaEnviado($nombre))
      {
          if($_REQUEST["contraseñaNueva"] == $_REQUEST["contraseñaConf"])
              $coincidentes = true;
          else
          {
              $coincidentes = false;

              ?>
              <label for="<?php echo "idContraseñaConf" ?>" style="color:red;"><?php echo "Las contraseñas no coinciden" ?></label>
              <?php
          }
              
          return $coincidentes;
      }
  }
?>