<?php
  echo "vista vMenu";
  echo "<br>";
/*
  // Si el usuario es Administrador...
  // Se le permite la visualización del resto de Usuarios
  if($_SESSION["perfil"] == "P_ADMIN")
  {
    // Prueba de mostrar todos los usuarios de la BBDD //
    echo "<h2>Todos los usuarios</h2>";


    $arrayUsuarios = UsuarioDAO::findAll();

    echo "<table>";
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
    echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
  }
  else
  {
      echo "Publicaciones...";
  }
  */

  // Prueba de actualizar un Usuario
  $usuario = new Usuario("fyNGUDiv9mbNg4ttvO0Z","Update","updateeee","update","email","","numtelf","Perfil",true,"");
  UsuarioDAO::update($usuario);

?>