<?php
require 'includes/database.php';
$db = conectarDB();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $rol = $_POST['rol'];
    $password = $_POST['password'];

    // Hashear la contraseña por seguridad
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO usuarios (usuario, password, rol) VALUES ('$usuario', '$passwordHash', '$rol')";
    
    if(mysqli_query($db, $query)) {
        header('Location: usuarios.php?msg=1'); // Redirige al éxito
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="css/app.css">
    <title>Nuevo Staff - Sakura</title>
</head>
<body style="background:#f4f4f4; font-family:sans-serif; padding:20px;">
    <div style="max-width:400px; margin:auto; background:white; padding:20px; border-radius:8px; box-shadow:0 2px 10px rgba(0,0,0,0.1);">
        <h2 style="color:#bc002d;">Registrar Nuevo Staff</h2>
        <form method="POST">
            <label>Nombre de Usuario:</label>
            <input type="text" name="username" required style="width:100%; padding:8px; margin:10px 0;">
            
            <label>Contraseña Temporal:</label>
            <input type="password" name="password" required style="width:100%; padding:8px; margin:10px 0;">
            
            <label>Rol del Usuario:</label>
            <select name="rol" style="width:100%; padding:8px; margin:10px 0;">
                <option value="empleado">Empleado (Mesero)</option>
                <option value="empleado">Empleado (Cocina)</option>
                <option value="empleado">Empleado (Caja)</option>
                <option value="jefe">Jefe (Administrador)</option>
            </select>
            
            <button type="submit" style="background:#bc002d; color:white; border:none; padding:10px; width:100%; cursor:pointer; margin-top:10px;">
                CREAR CUENTA
            </button>
        </form>
        <br>
        <a href="admin.php" style="color:#666; text-decoration:none;">← Volver</a>
    </div>
</body>
</html>