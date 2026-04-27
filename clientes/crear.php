<?php include("../conexion.php");
if($_POST){
$conn->query("INSERT INTO categorias(nombre) VALUES('$_POST[nombre]')");
header("Location: listar.php");
}
?>

<form method="POST">
<input name="nombre">
<button>Guardar</button>
</form>