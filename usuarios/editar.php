<?php 
include("../auth.php"); 
include("../menu.php"); 
include("../conexion.php"); 

// 1. Obtener los datos actuales del usuario
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sentencia = $conn->query("SELECT * FROM usuarios WHERE id = '$id'");
    $usuario = $sentencia->fetch_assoc();
}

// 2. Procesar la actualización cuando se envíe el formulario
if ($_POST) {
    $id_user = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol'];

    $sql = "UPDATE usuarios SET nombre='$nombre', correo='$correo', rol='$rol' WHERE id='$id_user'";
    
    if ($conn->query($sql)) {
        header("Location: listar.php"); // Redirige a la tabla si todo sale bien
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
}
?>

<link rel="stylesheet" href="../assets/css/styles.css">

<div class="main">
    <div class="nav">
        <h2>Editar Usuario</h2>
        <a href="listar.php" class="btn" style="background: #666;">Volver</a>
    </div>

    <div class="card" style="padding: 20px;">
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

            <div class="form-group">
                <label>Nombre Completo:</label>
                <input type="text" name="nombre" value="<?php echo $usuario['nombre']; ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label>Correo Electrónico:</label>
                <input type="email" name="correo" value="<?php echo $usuario['correo']; ?>" required class="form-control">
            </div>

            <div class="form-group">
                <label>Rol de Usuario:</label>
                <select name="rol" class="form-control">
                    <option value="gerente" <?php echo ($usuario['rol'] == 'gerente') ? 'selected' : ''; ?>>Gerente</option>
                    <option value="mesero" <?php echo ($usuario['rol'] == 'mesero') ? 'selected' : ''; ?>>Mesero</option>
                    <option value="cocinero" <?php echo ($usuario['rol'] == 'cocinero') ? 'selected' : ''; ?>>Cocinero</option>
                </select>
            </div>

            <br>
            <button type="submit" class="btn" style="background-color: #2196F3; border: none; cursor: pointer;">
                Guardar Cambios
            </button>
        </form>
    </div>
</div>

<style>
    .form-group { margin-bottom: 15px; }
    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-top: 5px;
    }
    label { font-weight: bold; }
</style>