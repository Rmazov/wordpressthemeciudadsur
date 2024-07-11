<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $celular = $_POST['celular'];
  
  // Configuramos los datos del correo electrónico
  $para = 'ricamazo0725@gmail.com';
  $titulo = 'Nueva reserva de '.$nombre;
  $mensaje = 'Nombre: '.$nombre."\r\n";
  $mensaje .= 'Correo electrónico: '.$email."\r\n";
  $mensaje .= 'Número de celular: '.$celular."\r\n";
  $cabeceras = 'From: '.$nombre.' <'.$email.'>'."\r\n";
  

  wp_mail( $para, $titulo, $mensaje, $cabeceras ," ");
  // Enviamos el correo electrónico
  if (mail($para, $titulo, $mensaje, $cabeceras)) {
    echo '<div class="alert alert-success">¡Gracias por tu reserva! Nos pondremos en contacto contigo pronto.</div>';
  } else {
    echo '<div class="alert alert-danger">Lo sentimos, ha ocurrido un error al enviar tu reserva. Por favor, inténtalo de nuevo más tarde.</div>';
  }
}
?>
