<?php
include("../auth.php"); // Siempre incluye la protección de sesión
include("../menu.php"); 
include("../conexion.php");

if($_POST){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $rol = $_POST['rol'];

    // Usar una consulta preparada es mejor, pero mantenemos tu lógica actual:
    $conn->query("INSERT INTO usuarios(nombre,correo,password,rol) 
                  VALUES('$nombre','$correo','$password','$rol')");

    header("Location: listar.php");
}
?>

<link rel="stylesheet" href="../assets/css/styles.css">

<div class="main">
    <div class="nav">
        <h2>Crear Nuevo Usuario</h2>
        <a href="listar.php" class="btn-secondary">Volver al Listado</a>
    </div>

    <div class="card shadow-lg">
        <form method="POST" class="form-container">
            <div class="form-group">
                <label><i class="icon">👤</i> Nombre Completo</label>
                <input type="text" name="nombre" placeholder="Ej. Juan Pérez" required>
            </div>

            <div class="form-group">
                <label><i class="icon">📧</i> Correo Electrónico</label>
                <input type="email" name="correo" placeholder="correo@ejemplo.com" required>
            </div>

            <div class="form-group">
                <label><i class="icon">🔑</i> Contraseña</label>
                <input type="password" name="password" placeholder="Mínimo 8 caracteres" required>
            </div>

            <div class="form-group">
                <label><i class="icon">🛡️</i> Rol del Usuario</label>
                <select name="rol">
                    <option value="gerente">Jefe (Gerente)</option>
                    <option value="mesero">Mesero</option>
                    <option value="cocinero">Cocinero</option>
                </select>
            </div>

            <div class="actions">
                <button type="submit" class="btn-save">Registrar Usuario</button>
            </div>
        </form>
    </div>
</div>

<style>
    /* Estilos específicos para que se vea genial */
    .form-container {
        padding: 20px;
        max-width: 500px;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        font-weight: 600;
        margin-bottom: 8px;
        color: #333;
        font-size: 14px;
    }

    .form-group input, .form-group select {
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 15px;
        transition: border-color 0.3s;
    }

    .form-group input:focus {
        border-color: #ff4757; /* Color tipo Sakura */
        outline: none;
    }

    .btn-save {
        background-color: #ff4757; /* Rojo vibrante como tu botón +Nuevo */
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        width: 100%;
        transition: background 0.3s;
    }

    .btn-save:hover {
        background-color: #e84118;
    }

    .btn-secondary {
        background-color: #7f8c8d;
        color: white;
        padding: 8px 15px;
        text-decoration: none;
        border-radius: 6px;
        font-size: 14px;
    }

    .shadow-lg {
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
    }
</style>