<?php

require_once __DIR__ . '/../../config/database.php';

class Producto {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT p.*, c.nombre as categoria_nombre 
                                 FROM productos p 
                                 LEFT JOIN categorias c ON p.categoria_id = c.id");
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM productos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO productos (codigo, nombre, tallas, precio_mayor, precio_detal, imagen, categoria_id) 
                                   VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['codigo'],
            $data['nombre'],
            $data['tallas'],
            $data['precio_mayor'],
            $data['precio_detal'],
            $data['imagen'],
            $data['categoria_id']
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE productos 
                                   SET codigo = ?, nombre = ?, tallas = ?, 
                                       precio_mayor = ?, precio_detal = ?, 
                                       imagen = ?, categoria_id = ? 
                                   WHERE id = ?");
        return $stmt->execute([
            $data['codigo'],
            $data['nombre'],
            $data['tallas'],
            $data['precio_mayor'],
            $data['precio_detal'],
            $data['imagen'],
            $data['categoria_id'],
            $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM productos WHERE id = ?");
        return $stmt->execute([$id]);
    }
} 