<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Categorías</title>
    <link rel="stylesheet" href="/assets/css/estilo.css">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <h2>Menú</h2>
            <nav>
                <ul>
                    <li><a href="index.php?controller=producto&action=index">Ver Productos</a></li>
                    <li><a href="index.php?controller=producto&action=create">Agregar Producto</a></li>
                    <li><a href="index.php?controller=categoria&action=index">Ver Categorías</a></li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <h1>Listado de Categorías</h1>
            
            <div class="agregar-categoria">
                <h2>Agregar Nueva Categoría</h2>
                <form action="index.php?controller=categoria&action=store" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                    <button type="submit" class="btn-guardar">Guardar Categoría</button>
                </form>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha Creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categorias as $categoria): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($categoria['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($categoria['fecha_creacion']); ?></td>
                        <td>
                            <a href="index.php?controller=categoria&action=edit&id=<?php echo $categoria['id']; ?>" class="btn-editar">Editar</a>
                            <a href="index.php?controller=categoria&action=delete&id=<?php echo $categoria['id']; ?>" class="btn-eliminar" onclick="return confirm('¿Estás seguro? Esta acción no se puede deshacer')">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html> 