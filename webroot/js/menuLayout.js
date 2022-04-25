/*
    Script que se encarga de mostrar y ocultar la barra de menú que contiene
    las diferentes páginas a las que puede acceder un usuario
*/
let mostrando = false;

document.getElementById("menu").addEventListener("click",function()
{
    if(mostrando == false)
    {
        document.getElementById("navega").style.overflow = "inherit";
        mostrando = true;
    }
    else
    {
        document.getElementById("navega").style.overflow = "hidden";
        mostrando = false;
    }
});