<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Productos</title>
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
            <h1>Listado de Productos</h1>
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Tallas</th>
                        <th>Categoría</th>
                        <th>P. Mayor</th>
                        <th>P. Detal</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto): ?>
                    <tr>            
                        <td><?php echo htmlspecialchars($producto['codigo']); ?></td>
                        <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($producto['tallas']); ?></td>
                        <td><?php echo htmlspecialchars($producto['categoria_nombre'] ?? 'Sin categoría'); ?></td>
                        <td><?php echo htmlspecialchars($producto['precio_mayor']); ?></td>
                        <td><?php echo htmlspecialchars($producto['precio_detal']); ?></td>
                        <td>
                            <?php if (!empty($producto['imagen'])): ?>
                                <img src="<?php echo htmlspecialchars($producto['imagen']); ?>" alt="Producto" width="50">
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="index.php?controller=producto&action=edit&id=<?php echo $producto['id']; ?>" class="btn-editar">Editar</a>
                            <a href="index.php?controller=producto&action=delete&id=<?php echo $producto['id']; ?>" class="btn-eliminar" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html> 