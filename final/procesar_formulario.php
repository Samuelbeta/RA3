<?php
// Datos de conexión a la base de datos
$host = 'localhost';  // Cambia esto al host de tu base de datos
$usuario = 'root';  // Cambia esto a tu nombre de usuario de MySQL
$contrasena = '';  // Cambia esto a tu contraseña de MySQL
$base_de_datos = 'consultoria';  // Cambia esto a tu nombre de base de datos

// Conectar a la base de datos
$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener los datos del formulario
$first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $fecha = $_POST['fecha'];
    $horario = $_POST['horario'];


// Crear la consulta SQL para insertar los datos en la base de datos
$sql = "INSERT INTO cita (first_name, last_name, phone, fecha, horario) 
            VALUES ('$first_name', '$last_name', '$phone', '$fecha', '$horario')";

// Ejecutar la consulta SQL
if ($conexion->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error al insertar datos: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Consultoria Ayala</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css -->
    <link rel="stylesheet" href="assets/css/main1.css" />
    <link rel="stylesheet" href="assets/css/utilities.css" />
    <!-- normalize.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="page-wrapper">
        <!-- header -->
        <header class="header">
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-content d-flex justify-content-between align-items-center">
                        <div class="brand-and-toggler d-flex align-items-center justify-content-between">
                            <a href="index.html" class="navbar-brand d-flex align-items-center">
                                <span class="brand-shape d-inline-block text-white">CA</span>
                                <span class="brand-text fw-7">Consultoria Ayala </span>
                            </a>
                            <button type="button" class="d-none navbar-show-btn">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>

                        <div class="navbar-box">
                            <button type="button" class="navbar-hide-btn">
                                <i class="fas fa-times"></i>
                            </button>

                            <ul class="navbar-nav d-flex align-items-center">
                                <li class="nav-item">
                                    <a href="index.html" class="nav-link text-white nav-active text-nowrap">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a href="doctores.html" class="nav-link text-white text-nowrap">Doctores</a>
                                </li>
                                <li class="nav-item">
                                    <a href="Citas.html" class="nav-link text-white text-nowrap">Citas</a>
                                </li>
                                <li class="nav-item">
                                    <a href="aviso.html" class="nav-link text-white text-nowrap">Aviso de privacidad</a>
                                </li>
                                <li class="nav-item">
                                    <a href="nosostros.html" class="nav-link text-white text-nowrap">Nosotros</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="element-one">
                <img src="assets/images/element-img-1.png" alt="">
            </div>

            <div class="banner">
                <div class="container">
                    <div class="banner-content">
                        <div class="banner-left">
                            <div class="content-wrapper">
                                <h1 class="banner-title">Muchas Gracias <br>Por su cita</h1>
                                <p class="text text-white">Su cita ha sido registrada espera para ser atendido con algunos de nuestros medicos</p>
                                <a href="index.html" class="btn btn-secondary">Regresar al Inicio</a>
                                <a href="Citas.html" class="btn btn-secondary">Hacer otra cita</a>
                            </div>
                        </div>

                        <div class="banner-right d-flex align-items-center justify-content-end">
                            <img src="assets/images/banner-image.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- end of header -->
        <footer class="footer">
            <div class="container">
                <div class="footer-content">
                    <div class="footer-list d-grid text-white">
                        <div class="footer-item">
                            <a href="#" class="navbar-brand d-flex align-items-center">
                                <span class="brand-shape d-inline-block text-white">CA</span>
                                <span class="brand-text fw-7">Consultoria Ayala</span>
                            </a>
                            <p class="text-white">Consultoria Ayala proporciona asistencia sanitaria progresiva y
                                accesible
                                en línea para todos.</p>
                            <p class="text-white copyright-text">&copy; Consultoria Ayala 2023. All rights reserved.</p>
                        </div>

                        <div class="footer-item">
                            <h3 class="footer-item-title">Sevicios</h3>
                            <ul class="footer-links">
                                <li><a href="nosostros.html">Acerca de </a></li>
                                <li><a href="doctores.html">Encuentra un doctor</a></li>
                                <li><a href="Citas.html">Citas</a></li>
                                <li><a href="aviso.html">Aviso de privasidad</a></li>
                            </ul>
                        </div>




                    </div>
                </div>
            </div>

            <div class="footer-element-1">
                <img src="assets/images/element-img-4.png" alt="">
            </div>
            <div class="footer-element-2">
                <img src="assets/images/element-img-5.png" alt="">
            </div>
        </footer>
    </div>

    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <!-- owl carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- custom js -->
    <script src="assets/js/script.js"></script>
</body>

</html>


