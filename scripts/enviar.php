<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $apellido = htmlspecialchars($_POST['apellido']);
    $email = htmlspecialchars($_POST['email']);
    $comentario = htmlspecialchars($_POST['comentario']);
    
    $to = "juanpanero00@gmail.com"; // Tu dirección de correo electrónico
    $subject = "Nuevo mensaje de contacto";
    $message = "Nombre: $nombre\nApellido: $apellido\nEmail: $email\nComentario: $comentario";
    $headers = "From: $email";
    
    $messageSent = false;
    if (mail($to, $subject, $message, $headers)) {
        $messageSent = true;
    }
    
    // Guardar el estado del mensaje en una sesión
    session_start();
    $_SESSION['messageSent'] = $messageSent;
    
    // Redirigir de nuevo a la página de contacto
    header("Location: contacto.html");
    exit();
}
?>
