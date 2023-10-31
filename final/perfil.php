<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['id'])) {
    // Conexión a la base de datos (asegúrate de que esta parte sea igual que en iniciosesion.php)
    $host = "localhost";
    $usuario = "root";
    $contrasena = "";
    $bd = "consultoria";
    $conexion = new mysqli($host, $usuario, $contrasena, $bd);

    if ($conexion->connect_error) {
        die("Error en la conexión a la base de datos: " . $conexion->connect_error);
    }

    // Agrega la función "limpiar" si aún no la has definido
    function limpiar($dato, $conexion) {
        return $conexion->real_escape_string($dato);
    }

    // Verificar si se ha enviado el formulario de actualización
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['guardar'])) {
        // Actualizar la información del usuario
        $nuevoNombre = limpiar($_POST['nuevo_nombre'], $conexion);
        $nuevoEmail = limpiar($_POST['nuevo_email'], $conexion);

        // Preparar la consulta SQL para actualizar la información del usuario
        $query = $conexion->prepare("UPDATE usuarios SET nombre = ?, email = ? WHERE id = ?");
        $query->bind_param("ssi", $nuevoNombre, $nuevoEmail, $_SESSION['id']);

        if ($query->execute()) {
            echo "Información actualizada con éxito.";
            // Actualizar la variable de sesión si el email cambió
            if ($_SESSION['email'] !== $nuevoEmail) {
                $_SESSION['email'] = $nuevoEmail;
            }
        } else {
            echo "Error al actualizar la información: " . $conexion->error;
        }
    }

    // Comprobar si se ha enviado el formulario para eliminar la cuenta
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminar'])) {
        // Agrega el código necesario para eliminar la cuenta del usuario
        $id = $_SESSION['id'];

        // Primero, elimina los registros relacionados (pueden variar según la estructura de tu base de datos)
        // Supongamos que tienes una tabla llamada "publicaciones" relacionada con el usuario, puedes eliminarlas
        $conexion->query("DELETE FROM usuarios WHERE id = $id");

        // Ahora, elimina al usuario
        $eliminarUsuario = $conexion->prepare("DELETE FROM usuarios WHERE id = ?");
        $eliminarUsuario->bind_param("i", $id);

        if ($eliminarUsuario->execute()) {
            // Destruir la sesión actual
            session_destroy();

            // Redirigir a la página de inicio de sesión
            header('Location: iniciosesion.php');
        } else {
            echo "Error al eliminar la cuenta: " . $conexion->error;
        }
    }

    // Obtener información del usuario desde la base de datos
    $id = $_SESSION['id'];
    $query = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = $conexion->query($query);

    if ($resultado->num_rows == 1) {
        $usuario = $resultado->fetch_assoc();
    }
} else {
    echo "Debes iniciar sesión para ver tu perfil.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Tu sección de encabezado, metadatos y enlaces a estilos -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mi Perfil</title>
    <!-- Agrega aquí tus enlaces a estilos CSS -->
</head>
<body>
    <div class="page-wrapper">
        <!-- Sección de encabezado o banner de perfil -->
        <h1>Mi Perfil</h1>

        <!-- Formulario de actualización y eliminación de cuenta (como se proporcionó en la respuesta anterior) -->
        <form method="POST" action="">
            <input type="text" name="nuevo_nombre" placeholder="Nuevo Nombre" required value="<?php echo $usuario['nombre']; ?>">
            <input type="email" name="nuevo_email" placeholder="Nuevo Correo electrónico" required value="<?php echo $usuario['email']; ?>">
            <button type="submit" name="guardar">Guardar Cambios</button>
            <button type="submit" name="eliminar">Eliminar Cuenta</button>
        </form>

        <!-- Información adicional del usuario -->
        <div>
            <h2>Detalles del usuario:</h2>
            <p><strong>Nombre:</strong> <?php echo $usuario['nombre']; ?></p>
            <p><strong>Correo electrónico:</strong> <?php echo $usuario['email']; ?></p>
        </div>

        <!-- Otro contenido relacionado con el perfil -->
        <!-- Puedes mostrar la información específica que desees aquí -->

        <!-- Enlaces a otras secciones o acciones -->
        <a href="index.html">Menu Principal</a>
    </div>

    <!-- Tu sección de pie de página y enlaces a scripts -->
</body>
</html>
