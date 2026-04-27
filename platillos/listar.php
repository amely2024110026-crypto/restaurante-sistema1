<?php include("../auth.php"); ?>
<?php include("../menu.php"); ?>
<?php include("../conexion.php"); ?>

<link rel="stylesheet" href="../assets/css/styles.css">

<div class="main">

<div class="nav">
<h2>Platillos</h2>
<a href="crear.php" class="btn">+ Nuevo</a>
</div>

<div class="card">

<table>
<tr>
<th>Nombre</th>
<th>Precio</th>
</tr>

<?php
$res=$conn->query("SELECT * FROM platillos");

while($r=$res->fetch_assoc()){
?>
<tr>
<td><?php echo $r['nombre']; ?></td>
<td>$<?php echo $r['precio']; ?></td>
</tr>
<?php } ?>

</table>

</div>
</div>