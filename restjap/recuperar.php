<?php
require_once __DIR__ . '/includes/database.php';
$mensaje = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = mysqli_real_escape_string($db, trim($_POST['username']));
    
    // Verificamos si el usuario existe
    $query = "SELECT * FROM usuarios WHERE username = '$user'";
    $res = mysqli_query($db, $query);

    if ($res && $res->num_rows > 0) {
        // Generamos el hash para 'admin123'
        $nuevoHash = password_hash('admin123', PASSWORD_BCRYPT);
        
        $update = "UPDATE usuarios SET password = '$nuevoHash' WHERE username = '$user'";
        if (mysqli_query($db, $update)) {
            $mensaje = "✅ ¡Éxito! La contraseña de '$user' se ha reseteado a: admin123";
        }
    } else {
        $mensaje = "❌ El usuario no existe en la base de datos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="css/app.css">
    <title>Recuperar Acceso</title>
</head>
<body style="background: #1a1a1a; display: flex; justify-content: center; align-items: center; height: 100vh; font-family: sans-serif;">
    <div style="background: white; padding: 2rem; border-radius: 8px; width: 350px; text-align: center;">
        <h2 style="color: #bc002d;">Recuperar Contraseña</h2>
        
        <?php if ($mensaje): ?>
            <p style="padding: 10px; margin-bottom: 20px; border: 1px solid #ddd; font-size: 0.9rem;">
                <?php echo $mensaje; ?>
            </p>
        <?php endif; ?>

        <p style="font-size: 0.9rem; color: #666;">Ingresa tu usuario para resetear la contraseña a la de fábrica (<b>admin123</b>)</p>
        
        <form method="POST">
            <input type="text" name="username" placeholder="Tu nombre de usuario (ej: jefe)" required 
                   style="width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd;">
            <button type="submit" style="width: 100%; background: #333; color: white; border: none; padding: 10px; cursor: pointer;">RESETEAR CONTRASEÑA</button>
        </form>
        
        <br>
        <a href="login.php" style="color: #bc002d; text-decoration: none; font-size: 0.9rem;">← Volver al Login</a>
    </div>
</body>
</html>
