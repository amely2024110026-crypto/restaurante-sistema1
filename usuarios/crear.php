<?php
include("../conexion.php");

if($_POST){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $rol = $_POST['rol'];

    $conn->query("INSERT INTO usuarios(nombre,correo,password,rol)
    VALUES('$nombre','$correo','$password','$rol')");

    header("Location: listar.php");
}
?>

<form method="POST">
<input type="text" name="nombre" placeholder="Nombre" required>
<input type="email" name="correo" placeholder="Correo" required>
<input type="password" name="password" placeholder="Contraseña" required>

<select name="rol">
<option value="gerente">Jefe (Gerente)</option>
<option value="mesero">Mesero</option>
<option value="cocinero">Cocinero</option>
</select>

<button>Crear Usuario</button>
</form>