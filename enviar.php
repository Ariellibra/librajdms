<?php

if($_SERVER['REQUEST_METHOD'] != 'POST' ){
    header("Location: index.html" );
}

/*
if( ! isset( $_POST['nombre'] ) ){
    header("Location: index.html" );
}
*/


$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

if( empty(trim($nombre)) ) $nombre = 'anonimo';
if( empty(trim($apellido)) ) $apellido = '';

$body = <<<HTML
    <h1>Contacto desde la web</h1>
    <p>De: $nombre $apellido / $email</p>
    <h2>Mensaje</h2>
    $mensaje
HTML;

//sintaxis de los emails email@algo.com || 
// nombre <email@algo.com>

$headers = "MIME-Version: 1.0 \r\n";
$headers.= "Content-type: text/html; charset=utf-8 \r\n";
$headers.= "From: $nombre $apellido <$email> \r\n";
$headers.= "To: Sitio web <ejemplo@germanrodriguez.com.ar> \r\n";
// $headers.= "Cc: copia@email.com \r\n";
// $headers.= "Bcc: copia-oculta@email.com \r\n";


//REMITENTE (NOMBRE/APELLIDO - EMAIL)
//ASUNTO 
//CUERPO 
mail('ejemplo@germanrodriguez.com.ar', "Mensaje web: $asunto", $body, $headers );
//var_dump($rta);

header("Location: gracias.html" );





// if (isset($_POST["enviar"])) {
//     $nombre = $_POST["nombre"];
//     $correo = $_POST["correo"];
//     $comentario = $_POST["comentario"];
    
//     $to = "arielpaz46@gmail.com"; // Cambia esto por tu dirección de correo electrónico

//     $subject="Consulta de $nombre ";

//     $message = "Nombre: $nombre \n";
//     $message .= "Correo Electrónico: $correo \\n";
//     $message .= "Consulta:\n $comentario";

//     //$header = "From: librasjdms@noreply.com";

// $mail = mail($to, $subject, $message, /*$header*/);

//     if($mail){
//         echo "<script>alert('El correo se envio correctamente :)');</script>";
//     }else{
//         echo "<script>alert('El correo no se envio :(');</script>";
//     }
    
//     // Envía el correo
//     //mail($to, $subject, $message);
    
//     // Redirige a una página de confirmación
//     //header("Location: confirmacion.html");
// }
?>