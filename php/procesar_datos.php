<?PHP

echo "<h1>Procesando los datos del Formulario</h1>";

$datos = $_POST;

$nombre = ucfirst($datos['nombre']);
$apellido = ucfirst($datos['apellido']);
$email = $datos['email'];
$mensaje = $datos['mensaje'];

$mensajeGracias = "¡Gracias, $nombre $apellido! Recibimos tu mensaje: \"$mensaje\". Nos pondremos en contacto contigo pronto a través de tu correo: $email";

echo "<pre>";
print_r($mensajeGracias);
echo "</pre>";