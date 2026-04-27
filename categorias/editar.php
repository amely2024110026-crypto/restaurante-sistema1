<?php include("../auth.php"); ?>
<?php include("../menu.php"); ?>
<?php include("../conexion.php"); ?>
<?php include("../config.php"); ?>

<?php
$id = $_GET['id'];

$res = $conn->query("SELECT * FROM categorias WHERE id=$id");
$cat = $res->fetch_assoc();

if($_POST){
$nombre = $_POST['nombre'];

$conn->query("UPDATE categorias SET nombre='$nombre' WHERE id=$id");

header("Location: ".$base."categorias/listar.php");
}
?>

<link rel="stylesheet" href="<?php echo $base; ?>assets/css/styles.css">

<div class="main">

<div class="nav">
<h2>✏️ Editar Categoría</h2>
<a href="<?php echo $base; ?>categorias/listar.php" class="btn-back">← Volver</a>
</div>

<div class="card">

<form method="POST">

<label>Nombre</label>
<input name="nombre" value="<?php echo $cat['nombre']; ?>" required>

<button class="btn">Actualizar</button>

</form>

</div>

</div>