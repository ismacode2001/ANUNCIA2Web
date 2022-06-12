// Estableco el lienzo donde se mostrará el gráfico
const ctx = document.getElementById('lienzo').getContext('2d');

// Dimensiones del contenedor
let canvas = document.getElementById("idCanvas");
canvas.style.width = "75%";
canvas.style.height = "75%";

// Recojo el nº de Anuncios por categoria //
let todasCookies = document.cookie;

let cAnunciosInmobiliaria = getCookie("cAnunciosInmobiliaria");
let cAnunciosMotor = getCookie("cAnunciosMotor");
let cAnunciosInformatica = getCookie("cAnunciosInformatica");
let cAnunciosDeportes = getCookie("cAnunciosDeportes");

// Muestro el gráfico
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Inmobiliaria', 'Motor', 'Informática', 'Deportes'],
      datasets: [{
        label: 'Nº de Anuncios',
        data: [cAnunciosInmobiliaria, cAnunciosMotor, cAnunciosInformatica, cAnunciosDeportes],
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        },
      }
    }
});

// Funcion que recoje una cookie en función de su nombre (Fuente: https://www.w3schools.com/js/js_cookies.asp)
function getCookie(cname) 
{
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
}