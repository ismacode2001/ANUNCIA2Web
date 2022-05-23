// Función que recoge el id del Anuncio a Comentar //
function recogeIdAnuncio(idAnuncio)
{
  document.cookie = "idAnuncioComentar=" + idAnuncio + ";max-age=60*60*24*1000";
}