
/* ---------------------------------------------------------- */
/* --------------------CAMERA ICON-------------------------- */
/* ---------------------------------------------------------- */
$(document).ready(function() {
    $(".camera-icon").click(function() {
      $("#imagen").click();
    });
  });

/* ---------------------------------------------------------- */
/* ---------------------------------------------------------- */
/* ---------------------------------------------------------- */
// Código de subir archivos con jQuery
$(document).ready(function() {
  $('#btnSubirFoto').click(function() {
    $('#imagen').click();
  });
});


/* ---------------------------------------------------------- */
/* ------------------------LIKE------------------------------ */
/* ---------------------------------------------------------- */

jQuery(function($) {
  $('#swapHeart').on('click', function() {
    var $el = $(this),
      iconNode = this.firstChild;
    $(iconNode).toggleClass('bi-heart bi-heart-fill');
    $el.toggleClass('swap');
  });
});

/* -------------------------------------------- ------------------*/
/* --------------------COMENTARIOS-------------------------- ------*/
/* -------------------------------------------- ------------------*/
  
  $(document).ready(function() {
    $('#ver-mas-btn').on('click', function() {
      $('.comentarios-ocultos').toggle();
      var buttonText = $(this).text();
      $(this).text(buttonText === 'Ver más comentarios' ? 'Ver menos comentarios' : 'Ver más comentarios');
    });
  });


  $(document).ready(function() {
    $('.ver-mas-btn').on('click', function() {
      var container = $(this).closest('.comentarios-publicacion');
      container.find('.comentario-reciente').hide();
      container.find('.comentarios-ocultos').show();
      $(this).hide();
    });
  });
  
/* -------------------------------------------- ------------------*/
/* --------------------SCROLLDABLE-------------------------- ------*/
/* -------------------------------------------- ------------------*/
  $(document).ready(function() {
    $('.scrollable-column').on('mouseenter', function() {
      $('.scrollable-column').not(this).css('overflow-y', 'hidden');
    });
  });

/* -------------------------------------------- ------------------*/
/* --------------------NOTIFICATIONS-------------------------- ------*/
/* -------------------------------------------- ------------------*/
$(document).ready(function() {
  // Cuando se hace clic en la campana de notificaciones
  $('.campana-notificaciones').on('click', function() {
    // Cargar las notificaciones del usuario mediante AJAX o mediante una variable PHP en el archivo
    // y asignar los datos a la variable `$datos['notificaciones']`

    // Abrir el modal de las notificaciones
    $('#myModal').modal('show');
  });
});

$(document).ready(function() {
  $(".dropdown-item").click(function() {
      var tipoUsuario = $(this).data("tipo");
      /* Graduados */
      if (tipoUsuario === 1) {
          $("#registroFormGraduado").show();
          $('#registroFormEstudiante').hide();
      /* No graduados (Estudiante) */
      } else if (tipoUsuario === 2){
        $("#registroFormGraduado").hide();
        $('#registroFormEstudiante').show();
      }else{
        $("#registroFormGraduado").hide();
        $('#registroFormEstudiante').hide();
      }
  });
});

/* -------------------------------------------- ------------------*/
/* --------------------PRIVILEGIOS-------------------------- ------*/
/* -------------------------------------------- ------------------*/

$(document).ready(function() {
  $("#obtenerIdBtn").click(function() {
    // Obtener el valor seleccionado del dropdown
    var valorSeleccionado = $("#tipoUsuario").val();

    // Mostrar el valor seleccionado en la consola
    console.log("Valor seleccionado: " + valorSeleccionado);

    // Aquí puedes hacer lo que necesites con el valor seleccionado
    // Por ejemplo, almacenar en una variable global:
    // window.valorSeleccionado = valorSeleccionado;
  });
});

/* -------------------------------------------- ------------------*/
/* --------------------GRAFICOS------------------------- ------*/
/* -------------------------------------------- ------------------*/

