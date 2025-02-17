$(function () {

  // Detecta el evento hover
  $('ul.hover_block li').hover(
      function () {
          // Desliza la imagen hacia la derecha (al pasar el ratón)
          $(this).find('img').animate({ left: '100px' }, { queue: false, duration: 500 });
      },
      function () {
          // Vuelve a la posición original (cuando se quita el ratón)
          $(this).find('img').animate({ left: '0px' }, { queue: false, duration: 500 });
      }
  );

});
