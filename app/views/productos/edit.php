<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
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
            <h1>Editar Producto</h1>
            <form action="index.php?controller=producto&action=update&id=<?php echo $producto['id']; ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                
                <div class="form-group">
                    <label for="codigo">Código:</label>
                    <input type="text" id="codigo" name="codigo" value="<?php echo htmlspecialchars($producto['codigo']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($producto['nombre']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="tallas">Tallas (separadas por comas):</label>
                    <input type="text" id="tallas" name="tallas" value="<?php echo htmlspecialchars($producto['tallas']); ?>" placeholder="Ej: S,M,L,XL" required>
                </div>
                
                <div class="form-group">
                    <label for="categoria_id">Categoría:</label>
                    <select id="categoria_id" name="categoria_id" required>
                        <option value="">Seleccione...</option>
                        <?php foreach ($categorias as $categoria): ?>
                        <option value="<?php echo $categoria['id']; ?>" <?php echo ($categoria['id'] == $producto['categoria_id']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($categoria['nombre']); ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="precio_mayor">Precio al Mayor:</label>
                    <input type="number" id="precio_mayor" name="precio_mayor" step="0.01" value="<?php echo htmlspecialchars($producto['precio_mayor']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="precio_detal">Precio al Detal:</label>
                    <input type="number" id="precio_detal" name="precio_detal" step="0.01" value="<?php echo htmlspecialchars($producto['precio_detal']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="imagen">Imagen:</label>
                    <input type="file" id="imagen" name="imagen" accept="image/*">
                    <?php if ($producto['imagen']): ?>
                        <p>Imagen actual: <img src="<?php echo htmlspecialchars($producto['imagen']); ?>" alt="Producto" width="50"></p>
                        <input type="hidden" name="imagen_actual" value="<?php echo htmlspecialchars($producto['imagen']); ?>">
                    <?php endif; ?>
                </div>
                
                <button type="submit" class="btn-guardar">Actualizar Producto</button>
            </form>
        </main>
    </div>
</body>
</html> 