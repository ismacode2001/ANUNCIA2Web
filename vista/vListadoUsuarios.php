<?php
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
      echo "<tr id='" . $usuario->idUsuario . "'>";
      echo "<td>" . $usuario->idUsuario . "</td>";
      echo "<td>" . $usuario->nombre . "</td>";
      echo "<td>" . $usuario->apellido . "</td>";
      //echo "<td>" . $usuario->contraseña . "</td>";
      echo "<td>" . $usuario->email . "</td>";
      echo "<td>" . $usuario->fechaNacimiento . "</td>";
      echo "<td>" . $usuario->numTelefono . "</td>";
      echo "<td>" . $usuario->perfil . "</td>";

      if($usuario->activo)
        echo "<td id='idUsuarioActivo'>" . "Activo" . "</td>";
      else
        echo "<td id='idUsuarioInactivo'>" . "Inactivo" . "</td>";

      // Estado
      if($usuario->activo)
      {
        // Desactivar Usuario
        echo "<td>";
        echo "<a href='#idModalDesactivarUsuario' rel='modal:open' class='modales' title='Desactivar Usuario' onclick='recogeIdDesactivar(" . $usuario->idUsuario . ")'>Desactivar</a>";
        echo "</td>";
      }
      else
      {
        // Activar Usuario
        echo "<td>";
        echo "<a href='#idModalActivarUsuario' rel='modal:open' class='modales' title='Activar Usuario' onclick='recogeIdActivar(" . $usuario->idUsuario . ")'>Activar</a>";
        echo "</td>";
      }

      // Eliminar
      echo "<td>";
      echo "<a href='#idModalEliminarUsuario' rel='modal:open' class='modales' title='Eliminar Usuario' onclick='recogeIdEliminar(" . $usuario->idUsuario . ")'>Eliminar</a>";
      echo "</td>";
      /*
      echo
        "<td>".
        "<form action='". $_SERVER['PHP_SELF']."' method='post'>".
        "<input type='submit' title='Eliminar usuario' value='Eliminar' name='eliminarUsuario'>".
        "<input type='hidden' name='idUsuario' value='$usuario->idUsuario'>".
        "</form>" .
        "</td>";
      */
      
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

<!-- Modal confirmación de Activación de Usuarios -->
<div class="registro" tabindex="-1" role="dialog" id="idModalActivarUsuario" style="padding: 0 12px; height: auto;">
  <div class="modal-dialog" role="document" style="margin: 0.75rem auto">
      <div class="modal-content rounded-5 shadow">
          <div class="modal-header p-4 pb-4 border-bottom-0">
              <h3 class="fw-bold mb-0">¿Desea activar el usuario?</h3>
          </div>
          <div class="modal-body p-5 pt-0">
              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" id="idFormularioActivarUsuario">
                  <input type='submit' rel="modal:open"  class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" title='Activar usuario' value='Activar' name='activar'>
                  <small class="text-muted">Si activa el usuario, este podrá iniciar sesión en ANUNCIA2 WEB</small>
                  <hr class="my-4">
              </form>
          </div>
      </div>
  </div>
</div>

<!-- Modal confirmación de Desactivación de Usuarios -->
<div class="registro" tabindex="-1" role="dialog" id="idModalDesactivarUsuario" style="padding: 0 12px; height: auto;">
  <div class="modal-dialog" role="document" style="margin: 0.75rem auto">
      <div class="modal-content rounded-5 shadow">
          <div class="modal-header p-4 pb-4 border-bottom-0">
              <h3 class="fw-bold mb-0">¿Desea desactivar el usuario?</h3>
          </div>
          <div class="modal-body p-5 pt-0">
              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" id="idFormularioDesactivarUsuario">
                  <input type='submit' rel="modal:open"  class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" title='Desactivar usuario' value='Desactivar' name='desactivar'>
                  <small class="text-muted">Si desactiva el usuario, este no podrá iniciar sesión en ANUNCIA2 WEB</small>
                  <hr class="my-4">
              </form>
          </div>
      </div>
  </div>
</div>

<!-- Modal confirmación de Eliminación de Usuarios -->
<div class="registro" tabindex="-1" role="dialog" id="idModalEliminarUsuario" style="padding: 0 12px; height: auto;">
  <div class="modal-dialog" role="document" style="margin: 0.75rem auto">
      <div class="modal-content rounded-5 shadow">
          <div class="modal-header p-4 pb-4 border-bottom-0">
              <h3 class="fw-bold mb-0">¿Desea eliminar el usuario?</h3>
          </div>
          <div class="modal-body p-5 pt-0">
              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" id="idFormularioActivarUsuario">
                  <input type='submit' rel="modal:open" class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" title='Eliminar usuario' value='Eliminar' name='eliminarUsuario'>
                  <small class="text-muted">Una vez eliminado, la cuenta de Usuario no podrá ser restaurada</small>
                  <hr class="my-4">
              </form>
          </div>
      </div>
  </div>
</div>

<!-- Script para la activación/desactivación de Usuarios -->
<script src="./webroot/js/scriptModalesConf.js"></script>
