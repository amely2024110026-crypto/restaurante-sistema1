<?php include("../auth.php"); ?>
<?php include("../menu.php"); ?>
<?php include("../conexion.php"); ?>
<?php include("../config.php"); ?>

<?php
if($_POST){
$nombre = $_POST['nombre'];

$conn->query("INSERT INTO categorias(nombre) VALUES('$nombre')");

header("Location: ".$base."categorias/listar.php");
}
?>

<link rel="stylesheet" href="<?php echo $base; ?>assets/css/styles.css">

<div class="main">

<div class="nav">
<h2>➕ Nueva Categoría</h2>
<a href="<?php echo $base; ?>categorias/listar.php" class="btn-back">← Volver</a>
</div>

<div class="card">

<form method="POST">

<label>Nombre de la categoría</label>
<input name="nombre" placeholder="Ej: Sushi, Bebidas..." required>

<button class="btn">Guardar</button>

</form>

</div>

</div>