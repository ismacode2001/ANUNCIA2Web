// Función que determina la longitud de un input y la imprime //
function compruebaLongitud(idInput,idCampo,longitudMaxima)
{
    // Recojo la longitud actual del Input
    let longitudActual = document.getElementById(idInput).value.length;

    // Establezco el valor del contador en el campo correspondiente
    document.getElementById(idCampo).innerHTML = longitudActual + "/" + longitudMaxima;
}