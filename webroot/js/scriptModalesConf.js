// Añado los listeners a los enlaces de activación y desactivación de Usuarios
//document.getElementById("idActivarUsuario").addEventListener("click", recogeEmailActivar);
//document.getElementById("idDesactivarUsuario").addEventListener("click", recogeEmailDesactivar);


function recogeIdActivar(idUsuario) 
{
  let id = idUsuario.id;
  console.log(id);

  document.cookie = "idUsuarioActivar=" + id + ";max-age=60*60*24*1000";
}

function recogeIdDesactivar(idUsuario)
{
  let id = idUsuario.id;
  console.log(id);

  document.cookie = "idUsuarioDesactivar=" + id + ";max-age=60*60*24*1000";

}