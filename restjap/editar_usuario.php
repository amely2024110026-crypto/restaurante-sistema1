<?php
require 'includes/database.php';
require 'includes/funciones.php';

$db = conectarDB();

$id = $_GET['id'] ?? null;
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) { header('Location: usuarios.php'); exit; }

// Traer datos actuales
$res = mysqli_query($db, "SELECT * FROM usuarios WHERE id = ${id}");
$usuario = mysqli_fetch_assoc($res);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $rol = $_POST['rol']; // admin o mesero
    $pass = $_POST['password'];

    if (!empty($pass)) {
        $hash = password_hash($pass, PASSWORD_BCRYPT);
        $sql = "UPDATE usuarios SET username='${username}', rol='${rol}', password='${hash}' WHERE id=${id}";
    } else {
        $sql = "UPDATE usuarios SET username='${username}', rol='${rol}' WHERE id=${id}";
    }

    if (mysqli_query($db, $sql)) {
        header('Location: usuarios.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/app.css">
    <title>Sakura | Editar</title>
</head>
<body class="admin-body">
    <div class="admin-container">
        <main class="main-content">
            <h1>Editar: <?php echo $usuario['username']; ?></h1>
            <div class="table-container" style="max-width: 450px; background: #1a1a1a; padding: 25px;">
                <form method="POST">
                    <label style="color: #ff4d6d; display: block; margin-bottom: 5px;">Nombre de Usuario</label>
                    <input type="text" name="username" value="<?php echo $usuario['username']; ?>" required style="width: 100%; margin-bottom: 15px; padding: 10px; background: #222; border: 1px solid #444; color: white;">

                    <label style="color: #ff4d6d; display: block; margin-bottom: 5px;">Rol en el sistema</label>
                    <select name="rol" style="width: 100%; margin-bottom: 15px; padding: 10px; background: #222; border: 1px solid #444; color: white;">
                        <option value="admin" <?php echo $usuario['rol'] === 'admin' ? 'selected' : ''; ?>>Administrador</option>
                        <option value="mesero" <?php echo $usuario['rol'] === 'mesero' ? 'selected' : ''; ?>>Mesero</option>
                    </select>

                    <label style="color: #ff4d6d; display: block; margin-bottom: 5px;">Nueva Contraseña</label>
                    <input type="password" name="password" placeholder="Solo si deseas cambiarla..." style="width: 100%; margin-bottom: 20px; padding: 10px; background: #222; border: 1px solid #444; color: white;">

                    <button type="submit" class="btn-editar" style="width: 100%; padding: 12px; border: none; font-weight: bold;">GUARDAR CAMBIOS</button>
                    <a href="usuarios.php" style="display: block; text-align: center; margin-top: 15px; color: #888; text-decoration: none;">← Cancelar y volver</a>
                </form>
            </div>
        </main>
    </div>
</body>
</html>