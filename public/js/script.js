
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
/* ---------------------------------------------------------- */
/* ---------------------------------------------------------- */

  $(document).ready(function() {
    $('.acciones-usuario').on('click', 'a', function(e) {
      e.preventDefault();
      var $heartIcon = $(this).find('i.fa-heart');
      var $likesCount = $(this).find('span');
      var postId = $(this).attr('href').split('/').pop();
      var userId = '<?php echo $_SESSION["logueado"]; ?>';
  
      if ($heartIcon.hasClass('like-active')) {
        // Usuario ya dio "Me gusta" - Disminuir el contador y cambiar el color
        $heartIcon.removeClass('like-active');
        $likesCount.text(parseInt($likesCount.text()) - 1);
  
        // Aquí puedes llamar a una función AJAX para restar el "Me gusta" en el backend
        // $.post('url_del_backend', { postId: postId, userId: userId, action: 'unlike' });
      } else {
        // Usuario aún no ha dado "Me gusta" - Aumentar el contador y cambiar el color
        $heartIcon.addClass('like-active');
        $likesCount.text(parseInt($likesCount.text()) + 1);
  
        // Aquí puedes llamar a una función AJAX para sumar el "Me gusta" en el backend
        // $.post('url_del_backend', { postId: postId, userId: userId, action: 'like' });
      }
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
$(document).ready(function () {
  let chart = bb.generate({
      data: {
          columns: [
              ["Blue", 2],
              ["orange", 4],
              ["green", 3],
          ],
          type: "donut",
          
      },
      donut: {
          title: "Egresados por carrera",
      },
      bindto: "#donut-chart",
  });
}); 

// Luego, utilizar los datos en el código JavaScript
/* $(document).ready(function () {
    // Generar la gráfica donut con los datos obtenidos de PHP
    let chart = bb.generate({
        data: {
            columns: chartData,
            type: "donut",
            onclick: function (d, i) {
                console.log("onclick", d, i);
            },
            onover: function (d, i) {
                console.log("onover", d, i);
            },
            onout: function (d, i) {
                console.log("onout", d, i);
            },
        },
        donut: {
            title: "Egresados por carrera",
        },
        bindto: "#donut-chart",
    });
}); */