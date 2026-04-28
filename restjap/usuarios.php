<?php
require 'includes/database.php'; 
require 'includes/funciones.php'; 

$db = conectarDB();

// Validar que el usuario sea admin
// IMPORTANTE: Verifica que en tu base de datos el rol diga 'admin'
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    // Si quieres saber qué rol tiene tu sesión actual antes de que te mande al index, 
    // puedes comentar la línea de abajo temporalmente para debuguear:
    header('Location: index.php');
    exit;
}

$query = "SELECT id, username, rol FROM usuarios";
$resultado = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/app.css">
    <title>Sakura | Staff</title>
</head>
<body class="admin-body">
    <div class="admin-container">
        <aside class="sidebar">
            <div class="sidebar-logo">🌸 SAKURA</div>
            <nav class="sidebar-nav">
                <a href="admin.php">Dashboard</a>
                <a href="usuarios.php" class="active">👥 Usuarios</a>
                <a href="crear_usuario.php">➕ Nuevo</a>
                <a href="logout.php">Cerrar Sesión</a>
            </nav>
        </aside>

        <main class="main-content">
            <h1 style="color: white;">Gestión de Staff</h1>
            <div class="table-container" style="max-width: 800px;">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($resultado && mysqli_num_rows($resultado) > 0): ?>
                            <?php while($row = mysqli_fetch_assoc($resultado)): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['username']); ?></td>
                                <td style="text-transform: capitalize;"><?php echo htmlspecialchars($row['rol']); ?></td>
                                <td>
                                    <div style="display: flex; gap: 8px;">
                                        <a href="editar_usuario.php?id=<?php echo $row['id']; ?>" class="btn-editar">Editar</a>
                                        <a href="eliminar_usuario.php?id=<?php echo $row['id']; ?>" class="btn-eliminar" onclick="return confirm('¿Borrar usuario?')">Eliminar</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" style="text-align: center; padding: 20px; color: white;">No hay usuarios.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>