<?php
require_once __DIR__ . '/includes/funciones.php';

// Seguridad: Si no hay sesión, al login
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header('Location: login.php');
    exit;
}

$usuario = $_SESSION['usuario'];
$rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : 'Staff';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/app.css?v=<?php echo time(); ?>">
    <title>Sakura | Panel Ejecutivo</title>
</head>
<body class="admin-body">

    <div class="admin-container">
    <aside class="sidebar">
        <div class="sidebar-logo">🌸 SAKURA</div>
        <nav class="sidebar-nav">
            <a href="admin.php">🏠 Dashboard</a>
            <a href="#">🍱 Gestionar Menú</a>
            <?php if($_SESSION['rol'] === 'jefe'): ?>
                <a href="usuarios.php">👥 Ver Usuarios</a>
                <a href="crear_usuario.php">➕ Nuevo Usuario</a>
            <?php endif; ?>
            <a href="index.php">🌐 Ver Sitio Web</a>
            <a href="logout.php" class="logout-link">🚪 Cerrar Sesión</a>
        </nav>
    </aside>

        <main class="main-content">
    <h1>Panel Ejecutivo</h1>

    <div class="dashboard-grid">
        <div class="card">
            <h3>🍱 Platillos</h3>
            <p>Gestionar la carta actual del restaurante.</p>
            <a href="configurar_platillos.php">Configurar →</a>
        </div>

        <div class="card">
            <h3>👥 Staff</h3>
            <p>Control de accesos y permisos de usuario.</p>
            <a href="usuarios.php">Ver Usuarios →</a>
        </div>

        <div class="card">
            <h3>📈 Ventas</h3>
            <p>Reportes del día (Próximamente).</p>
            <a href="#" style="color: #ccc;">Bloqueado</a>
        </div>
    </div>

    <h2>Actividad Reciente</h2>
    <div class="table-container">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Acción</th>
                    <th>Módulo</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Inicio de Sesión</td>
                    <td>Seguridad</td>
                    <td>26/04/2026</td>
                </tr>
                </tbody>
        </table>
    </div>
</main>
    </div>

</body>
</html>