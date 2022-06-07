// Función que lanza el enlace para abrir el modal de Cerrar Sesión //
function compruebaCambioSelect()
{   
    var selectBox = document.getElementById("idDesplegableOpciones");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    
    console.log("Valor seleccionado:" + selectedValue);

    if(selectedValue == "Cerrar Sesión")
    {
        console.log("Lanzando cerrar Sesion");
        window.location.href = "#idModalCerrarSesion";
        document.getElementById('idModalCerrarSesion').style.display = 'inline-block';
    }
}