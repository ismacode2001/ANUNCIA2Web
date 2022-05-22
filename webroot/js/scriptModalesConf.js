
// Función que recoge el id del Usuario a Activar //
function recogeIdActivar(idUsuario) 
{
  let id = idUsuario.id;

  document.cookie = "idUsuarioActivar=" + id + ";max-age=60*60*24*1000";
}

// Función que recoge el id del Usuario a Desactivar //
function recogeIdDesactivar(idUsuario)
{
  let id = idUsuario.id;

  document.cookie = "idUsuarioDesactivar=" + id + ";max-age=60*60*24*1000";

}