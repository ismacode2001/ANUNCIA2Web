<?php
  // Funcion que invoca al resto de funciones que van validando el formulario
  function validaFormularioLogin($nombre)
  {
    // Si se ha enviado el formulario...
    if (validaEnviado($nombre)) 
    {
      $correcto = true;

      // Contraseña //
      if(empty($_REQUEST['pass']))
      {
          $correcto = false;
          $_SESSION["erroresLogin"]["pass"] = "El campo contraseña no puede estar vacío";
      }
      
      // Email
      if (empty($_REQUEST['email']))
      {
          $correcto = false;
          $_SESSION["erroresLogin"]["email"] = "El campo email no puede estar vacío";
      }
    }
    // Si no...
    else 
        $correcto = false;
    
    return $correcto;
  }
?>