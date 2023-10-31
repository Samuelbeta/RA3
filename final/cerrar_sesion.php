<?php
session_start();

// Destruye la sesión
session_destroy();

// Redirige al usuario a la página de inicio o a donde desees
header('Location: index.html'); // Cambia "index.html" por la página a la que desees redirigir
