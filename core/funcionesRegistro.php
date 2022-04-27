<?php

  // Constantes //
  define("TXT_CAMPO_OBLIGATORIO","¡Campo obligatorio!");


  // Funcion que invoca al resto de funciones que van validando el formulario
  function validaFormularioRegistro($nombre)
  {
      // Si se ha enviado el formulario...
      if (validaEnviado($nombre)) 
      {
          $correcto = true;

          // ID //

          // Nombre //
          if (empty($_REQUEST['nombre']))
          {
              $correcto = false;
              $_SESSION["erroresRegistro"]["nombre"] = TXT_CAMPO_OBLIGATORIO;
          }
        
          // Apellido //
          if (empty($_REQUEST['apellido']))
          {
              $correcto = false;
              $_SESSION["erroresRegistro"]["apellido"] = TXT_CAMPO_OBLIGATORIO;
          }

          // Contraseña //
          if(empty($_REQUEST['contraseña']))
          {
              $correcto = false;
              $_SESSION["erroresRegistro"]["contraseña"] = TXT_CAMPO_OBLIGATORIO;
          }

          // Contraseña (confirmacion) //
          if (empty($_REQUEST['contraseñaConf']))
          {
              $correcto = false;
              $_SESSION["erroresRegistro"]["contraseñaConf"] = TXT_CAMPO_OBLIGATORIO;
          }
          else if(!coincidenContraseñas($nombre))
          {
              $correcto = false;
              $_SESSION["erroresRegistro"]["contraseñaConf"] = "Las contraseñas no coinciden";
          }
          
          // Email //
          if (empty($_REQUEST['email']))
          {
              $correcto = false;
              $_SESSION["erroresRegistro"]["email"] = TXT_CAMPO_OBLIGATORIO;
          }
          
          // Fecha de Nacimiento //
          if (empty($_REQUEST['fechaNacimiento']))
          {
              $correcto = false;
              $_SESSION["erroresRegistro"]["fechaNacimiento"] = TXT_CAMPO_OBLIGATORIO;
          }

          // Nº de teléfono //
          if (empty($_REQUEST['numTelefono']))
          {
              $correcto = false;
              $_SESSION["erroresRegistro"]["numTelefono"] = TXT_CAMPO_OBLIGATORIO;
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
          if($_REQUEST["contraseña"] == $_REQUEST["contraseñaConf"])
              $coincidentes = true;
          else
          {
              $coincidentes = false;

              ?>
              <label for="<?php echo "idPassConf" ?>" style="color:red;"><?php echo "Las contraseñas no coinciden" ?></label>
              <?php
          }
              
          return $coincidentes;
      }
  }

  // Funcion que formatea la fecha a String
  function fechaToString($fechaDate)
  {
    $date = explode("/",$fechaDate);
    list($day,$month,$year) = $date;

    $nuevaFecha = $day . "/" . $month . "/" . $year;

    return $nuevaFecha;
  }

?>