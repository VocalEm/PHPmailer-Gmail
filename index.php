<?php
require "mail.php";

$alerta = "";
function validar($nombre, $correo, $asunto, $mensaje, $form)
{
  return !empty($nombre) && !empty($correo) && !empty($mensaje) && !empty($asunto);
}

if (isset($_POST['form'])) {
  if (validar(...$_POST)) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    $body = "$nombre te ha enviado un mensaje: $mensaje";

    sendmail($correo, $nombre, $body, $asunto, false);

    $alerta = "exito";
  } else {
    $alerta = "error";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="css.css" />
</head>

<body>
  <main class="contenedor">
    <div class="contenedor formulario-fondo">
      <form action="" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" />
        <label for="correo">Correo</label>
        <input type="text" name="correo" id="" />
        <label for="asunto">Subject</label>
        <input type="text" name="asunto" id="" />
        <label for="mensaje">Mensaje:</label>
        <textarea name="mensaje" id=""></textarea>
        <button name="form" class="boton">Enviar</button>
      </form>
      <div class="alerta <?php echo $alerta; ?>">
        <?php
        echo $alerta;
        ?>
      </div>
    </div>
  </main>
</body>

</html>