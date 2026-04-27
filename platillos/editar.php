<?php
include("../conexion.php");

$id = $_GET['id'];

// Obtener categorías
$categorias = $conn->query("SELECT * FROM categorias");

if($_POST){
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];

    $conn->query("UPDATE platillos 
    SET nombre='$nombre', precio='$precio', categoria_id='$categoria'
    WHERE id=$id");

    header("Location: listar.php");
}

// Obtener datos actuales
$res = $conn->query("SELECT * FROM platillos WHERE id=$id");
$platillo = $res->fetch_assoc();
?>

<link rel="stylesheet" href="../assets/css/styles.css">

<div class="container">
<div class="card">

<h2>Editar Platillo</h2>

<form method="POST">
<input name="nombre" value="<?php echo $platillo['nombre']; ?>">
<input name="precio" type="number" step="0.01" value="<?php echo $platillo['precio']; ?>">

<select name="categoria">
<?php while($c = $categorias->fetch_assoc()){ ?>
<option value="<?php echo $c['id']; ?>"
<?php if($c['id'] == $platillo['categoria_id']) echo "selected"; ?>>
<?php echo $c['nombre']; ?>
</option>
<?php } ?>
</select>

<button>Actualizar</button>
</form>

</div>
</div>