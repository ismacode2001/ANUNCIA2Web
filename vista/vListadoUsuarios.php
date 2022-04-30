<?php
//  echo "vista vUsuarios";
  echo "<h2>Listado de Usuarios</h2>";

  // Si el usuario es Administrador...
  // Se le permite la visualización del resto de Usuarios
  if($_SESSION["perfil"] == "P_ADMIN")
  {
    $arrayUsuarios = UsuarioDAO::findAll();

    echo "<table class='table table-striped'>";
    echo "<thead>";
    echo "<th>Id Usuario</th>";
    echo "<th>Nombre</th>";
    echo "<th>Apellido</th>";
    //echo "<th>Contraseña</th>";
    echo "<th>Email</th>";
    echo "<th>Fecha de Nacimiento</th>";
    echo "<th>Nº de teléfono</th>";
    echo "<th>Perfil</th>";
    echo "<th>Activo</th>";
    echo "<th>Imagen de Perfil</th>";
    echo "<th>Modificar</th>";
    echo "<thead>";
    echo "<tbody>";
    
    foreach ($arrayUsuarios as $usuario) 
    {
      echo "<tr>";
      echo "<td>" . $usuario->idUsuario . "</td>";
      echo "<td>" . $usuario->nombre . "</td>";
      echo "<td>" . $usuario->apellido . "</td>";
      //echo "<td>" . $usuario->contraseña . "</td>";
      echo "<td>" . $usuario->email . "</td>";
      echo "<td>" . $usuario->fechaNacimiento . "</td>";
      echo "<td>" . $usuario->numTelefono . "</td>";
      echo "<td>" . $usuario->perfil . "</td>";
      echo "<td>" . $usuario->activo . "</td>";
      echo "<td>" . $usuario->imagenPerfil . "</td>";
      echo
        "<td>".
        "<form action='". $_SERVER['PHP_SELF']."' method='post'>".
        "<input type='submit' title='Modificar' value='Modificar' name='modificarUsuario'>".
        "<input type='hidden' name='emailUsuario' value='$usuario->email'>".
        "</form>"
        . "</td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
  }
  else
  {
      echo "Publicaciones...";
  }
  

?>