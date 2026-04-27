<?php include("../auth.php"); ?>
<?php include("../menu.php"); ?>
<?php include("../conexion.php"); ?>
<?php include("../config.php"); ?>

<?php
$platillos=$conn->query("SELECT * FROM platillos");

if($_POST){
$cliente=$_POST['cliente'];

$conn->query("INSERT INTO pedidos(cliente_nombre,estado)
VALUES('$cliente','pendiente')");
$id=$conn->insert_id;

foreach($_POST['cantidad'] as $pid=>$c){
if($c>0){
$p=$conn->query("SELECT precio FROM platillos WHERE id=$pid")->fetch_assoc();
$conn->query("INSERT INTO pedido_detalle(pedido_id,platillo_id,cantidad,precio)
VALUES($id,$pid,$c,".$p['precio'].")");
}
}

header("Location: ".$base."pedidos/listar.php");
}
?>

<link rel="stylesheet" href="<?php echo $base; ?>assets/css/styles.css">

<div class="main">

<div class="nav">
<h2>Nuevo Pedido</h2>
<a href="<?php echo $base; ?>pedidos/listar.php" class="btn-back">← Volver</a>
</div>

<form method="POST">

<div class="card">
<input name="cliente" placeholder="Cliente">
</div>

<div class="card">
<h3>Menú</h3>

<?php while($p=$platillos->fetch_assoc()){ ?>
<p>
<?php echo $p['nombre']; ?> ($<?php echo $p['precio']; ?>)
<input type="number" name="cantidad[<?php echo $p['id']; ?>]" value="0">
</p>
<?php } ?>

</div>

<button class="btn">Guardar</button>
</form>

</div>