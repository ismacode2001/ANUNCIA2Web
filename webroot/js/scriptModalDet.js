// Función que recoge el id del Anuncio a Comentar //
function recogeIdAnuncio(idAnuncio)
{
  document.cookie = "idAnuncioComentar=" + idAnuncio + ";max-age=60*60*24*1000";
  let varModal = document.getElementById("pruebaModal");
  //varModal.setAttribute("class","jquery-modal blocker current");
}