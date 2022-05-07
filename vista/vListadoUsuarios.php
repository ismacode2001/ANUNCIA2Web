<?php
//  echo "vista vUsuarios";
  echo "<h2>Listado de Usuarios</h2>";

  // Si el usuario es Administrador...
  // Se le permite la visualización del resto de Usuarios
  if($_SESSION["perfil"] == "P_ADMIN")
  {
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
    echo "<th>Estado</th>";
    echo "<th>Eliminar</th>";
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

      // Estado
      if($usuario->activo)
      {
        echo
        "<td>".
        "<form action='". $_SERVER['PHP_SELF']."' method='post'>".
        "<input type='submit' title='Desactivar usuario' value='Desactivar' name='desactivar'>".
        "<input type='hidden' name='emailUsuario' value='$usuario->email'>".
        "</form>" .
        "</td>";
      }
      else
      {
        echo
        "<td>".
        "<form action='". $_SERVER['PHP_SELF']."' method='post'>".
        "<input type='submit' title='Activar usuario' value='Activar' name='activar'>".
        "<input type='hidden' name='emailUsuario' value='$usuario->email'>".
        "</form>" .
        "</td>";
      }

      // Eliminar
      echo
        "<td>".
        "<form action='". $_SERVER['PHP_SELF']."' method='post'>".
        "<input type='submit' title='Eliminar usuario' value='Eliminar' name='eliminarUsuario'>".
        "<input type='hidden' name='idUsuario' value='$usuario->idUsuario'>".
        "</form>" .
        "</td>";
      
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