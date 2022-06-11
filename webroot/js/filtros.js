// Función que actualiza en tiempo real el precio mínimo del filtro //
function actualizaPrecio() 
{
  // Establezo el mínimo para el precio máximo
  document.getElementById("pMax").min = document.getElementById("pMin").value; 

  // Actualizo en timepo real el marcador de precios //
  inputPrecioMinimo = document.getElementById("pMin");
  labelPrecioMinimo = document.getElementById("idPrecioMinimo");
  labelPrecioMinimo.innerHTML = inputPrecioMinimo.value + " €"; 
  
  inputPrecioMaximo = document.getElementById("pMax");
  inputPrecioMaximo.min = inputPrecioMinimo.value;
  labelPrecioMaximo = document.getElementById("idPrecioMaximo");
  labelPrecioMaximo.innerHTML = inputPrecioMaximo.value + " €"; 
}