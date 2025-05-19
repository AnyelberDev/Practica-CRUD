<?php
// Verificar si existe el autoload de Composer
if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
} else {
    die('CODE 001: No se encontró el archivo vendor/autoload.php');
}

// Verificar si existe el index.php en public
if (file_exists('public/index.php')) {
    // Obtener la URL actual
    $current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . 
                "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    
    // Si estamos en el index.php raíz, redirigir a public/
    if (basename($_SERVER['PHP_SELF']) === 'index.php' && dirname($_SERVER['PHP_SELF']) === dirname($_SERVER['REQUEST_URI'])) {
        $public_url = dirname($current_url) . '/public/';
        header("Location: $public_url");
        exit;
    }
    
    // Si no estamos en el index.php raíz, incluir el archivo de public
    require 'public/index.php';
} else {
    die('CODE 002: No se encontró el archivo public/index.php');
}
?> 