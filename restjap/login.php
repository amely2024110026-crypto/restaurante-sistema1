<?php
session_start();
require_once __DIR__ . '/includes/database.php';

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($db, trim($_POST['username']));
    $password = trim($_POST['password']);

    $query = "SELECT * FROM usuarios WHERE username = '$username'";
    $resultado = mysqli_query($db, $query);

    if ($resultado && $resultado->num_rows > 0) {
        $usuario = mysqli_fetch_assoc($resultado);
        
        if (password_verify($password, $usuario['password'])) {
            // Dentro de tu login.php, cuando la contraseña es correcta:
            session_start();
            $_SESSION['usuario'] = $datos_usuario['username'];
            $_SESSION['rol'] = $datos_usuario['rol']; // <--- ESTA LÍNEA ES VITAL
            $_SESSION['login'] = true;
            header('Location: admin.php');
            exit;
        } else {
            $error = "Contraseña incorrecta";
        }
    } else {
        $error = "El usuario no existe";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/app.css">

    <title>Acceso Staff</title>
</head>
<body style="background: #1a1a1a; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; font-family: sans-serif;">
    <div style="background: white; padding: 2rem; border-radius: 8px; width: 300px; text-align: center;">
        <h1 style="color: #bc002d; margin-bottom: 1rem;">桜 Acceso empleados</h1>
        
        <?php if ($error): ?>
            <p style="color: red; background: #ffdfdf; padding: 10px; border: 1px solid red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="username" placeholder="Usuario" required style="width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box;">
            <input type="password" name="password" placeholder="Password" required style="width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box;">
            <button type="submit" style="width: 100%; background: #bc002d; color: white; border: none; padding: 12px; cursor: pointer; font-weight: bold;">ENTRAR</button>
            <div style="margin-top: 15px;">
                <a href="recuperar.php" style="color: #666; font-size: 0.8rem; text-decoration: none;">
                    ¿Olvidaste tu contraseña? Haz clic aquí
                </a>
            </div>
        </form>
    </div>
</body>
</html>