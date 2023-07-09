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