<?php

require_once __DIR__ . '/../models/Categoria.php';

class CategoriaController {
    private $categoriaModel;

    public function __construct() {
        $this->categoriaModel = new Categoria();
    }

    public function index() {
        $categorias = $this->categoriaModel->getAll();
        require_once __DIR__ . '/../views/categorias/index.php';
    }

    public function create() {
        require_once __DIR__ . '/../views/categorias/create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->categoriaModel->create($_POST['nombre'])) {
                header('Location: index.php?controller=categoria&action=index');
                exit;
            }
        }
    }

    public function edit($id) {
        $categoria = $this->categoriaModel->getById($id);
        require_once __DIR__ . '/../views/categorias/edit.php';
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->categoriaModel->update($id, $_POST['nombre'])) {
                header('Location: index.php?controller=categoria&action=index');
                exit;
            }
        }
    }

    public function delete($id) {
        if ($this->categoriaModel->delete($id)) {
            header('Location: index.php?controller=categoria&action=index');
            exit;
        }
    }
} 