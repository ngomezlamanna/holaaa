<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars(trim($_POST["nombre"]));
    $asunto = htmlspecialchars(trim($_POST["asunto"]));
    $mensaje = htmlspecialchars(trim($_POST["mensaje"]));

    $destinatario = "dinena1721@grassdev.com";
    $asunto_email = "Nuevo mensaje de contacto" . $asunto;

    $contenido = "Nombre: " . $nombre . "\r\n";
    $contenido .= "Asunto: " . $asunto . "\r\n";
    $contenido .= "Mensaje: " . $mensaje;

    $headers = "From: dinena1721@grassdev.com" . "\r\n";
    $headers .= "Reply-To: " . $nombre . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    if (@mail($destinatario, $asunto_email, $contenido, $headers)) {
        echo "Mensaje enviado con exito.";
    } else {
        echo "Error al enviar el mensaje. Intente nuevamente.";
    }
} else {
    header("Location: index.html");
    exit();
}

?>