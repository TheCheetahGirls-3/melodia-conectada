const movilBoton = document.getElementById('movilBoton');
const divMapa = document.getElementByClassName('mapa');
const divListado = document.getElementByClassName('listado');

movilBoton.addEventListener('click', () => {
    const updateStyleBasedOnScreenSize = () => {
        const mediaQuery = window.matchMedia("(max-width: 767px)"); // Define el punto de corte para móvil

        if (mediaQuery.matches) {
          // Si la pantalla es más pequeña que 768px (móvil)
          divMapa.style.display = "none";
          divListado.style.display = "block";


        } else {
          // Si la pantalla es mayor a 768px (pantalla grande)

        }
    };

      // Llamar a la función de actualización cuando cambie el tamaño de la pantalla
      window.addEventListener('resize', updateStyleBasedOnScreenSize);

      // Llamar a la función de inmediato para establecer el estilo al cargar la página
      updateStyleBasedOnScreenSize();
});
