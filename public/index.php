<?php

require_once __DIR__ . '/../app/controllers/ProductoController.php';
require_once __DIR__ . '/../app/controllers/CategoriaController.php';

// Obtener el controlador y la acción de la URL
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'producto';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Crear la instancia del controlador correspondiente
switch ($controller) {
    case 'producto':
        $controller = new ProductoController();
        break;
    case 'categoria':
        $controller = new CategoriaController();
        break;
    default:
        die('Controlador no encontrado');
}

// Llamar al método correspondiente
if (method_exists($controller, $action)) {
    if ($id !== null) {
        $controller->$action($id);
    } else {
        $controller->$action();
    }
} else {
    die('Acción no encontrada');
} 