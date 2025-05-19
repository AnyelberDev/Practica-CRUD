<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoría</title>
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
            <h1>Editar Categoría</h1>
            
            <form action="index.php?controller=categoria&action=update&id=<?php echo $categoria['id']; ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $categoria['id']; ?>">
                
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($categoria['nombre']); ?>" required>
                </div>
                
                <button type="submit" class="btn-guardar">Actualizar Categoría</button>
                <a href="index.php?controller=categoria&action=index" class="btn-cancelar">Cancelar</a>
            </form>
        </main>
    </div>
</body>
</html> 