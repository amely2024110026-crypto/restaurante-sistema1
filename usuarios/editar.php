<?php include("../conexion.php");
$id=$_GET['id'];

if($_POST){
$conn->query("UPDATE usuarios SET nombre='$_POST[nombre]' WHERE id=$id");
header("Location: listar.php");
}

$res=$conn->query("SELECT * FROM usuarios WHERE id=$id");
$u=$res->fetch_assoc();
?>

<link rel="stylesheet" href="../assets/css/styles.css">

<div class="container"><div class="card">
<h2>Editar</h2>

<form method="POST">
<input name="nombre" value="<?php echo $u['nombre']; ?>">
<button>Actualizar</button>
</form>

</div></div>