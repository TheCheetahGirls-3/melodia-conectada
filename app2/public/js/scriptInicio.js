const movilBoton = document.getElementById('movilBoton');
const divMapa = document.getElementById('mapa');
const divListado = document.getElementById('listado');

movilBoton.addEventListener('click', () => {
    console.log('CLICADO')

    divMapa.classList.toggle("activo");
    divListado.classList.toggle("activo");

    // divMapa.style.display = "none";
    // divListado.style.display = "block";

});
