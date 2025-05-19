<?php

require_once __DIR__ . '/../models/Producto.php';
require_once __DIR__ . '/../models/Categoria.php';

class ProductoController {
    private $productoModel;
    private $categoriaModel;

    public function __construct() {
        $this->productoModel = new Producto();
        $this->categoriaModel = new Categoria();
    }

    public function index() {
        $productos = $this->productoModel->getAll();
        require_once __DIR__ . '/../views/productos/index.php';
    }

    public function create() {
        $categorias = $this->categoriaModel->getAll();
        require_once __DIR__ . '/../views/productos/create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imagen = '';
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
                $imagen = $this->handleImageUpload($_FILES['imagen']);
            }

            $data = [
                'codigo' => $_POST['codigo'],
                'nombre' => $_POST['nombre'],
                'tallas' => $_POST['tallas'],
                'precio_mayor' => $_POST['precio_mayor'],
                'precio_detal' => $_POST['precio_detal'],
                'imagen' => $imagen,
                'categoria_id' => $_POST['categoria_id']
            ];

            if ($this->productoModel->create($data)) {
                header('Location: index.php?controller=producto&action=index');
                exit;
            }
        }
    }

    public function edit($id) {
        $producto = $this->productoModel->getById($id);
        $categorias = $this->categoriaModel->getAll();
        require_once __DIR__ . '/../views/productos/edit.php';
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'codigo' => $_POST['codigo'],
                'nombre' => $_POST['nombre'],
                'tallas' => $_POST['tallas'],
                'precio_mayor' => $_POST['precio_mayor'],
                'precio_detal' => $_POST['precio_detal'],
                'imagen' => $_POST['imagen_actual'],
                'categoria_id' => $_POST['categoria_id']
            ];

            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
                $data['imagen'] = $this->handleImageUpload($_FILES['imagen']);
            }

            if ($this->productoModel->update($id, $data)) {
                header('Location: index.php?controller=producto&action=index');
                exit;
            }
        }
    }

    public function delete($id) {
        if ($this->productoModel->delete($id)) {
            header('Location: index.php?controller=producto&action=index');
            exit;
        }
    }

    private function handleImageUpload($file) {
        $target_dir = "uploads/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        $imageFileType = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
        $target_file = $target_dir . uniqid() . '.' . $imageFileType;
        
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $target_file;
        }
        return '';
    }
} 