<?php include("../auth.php"); ?>
<?php include("../menu.php"); ?>
<?php include("../conexion.php"); ?>

<link rel="stylesheet" href="../assets/css/styles.css">

<div class="main">

<div class="nav">
<h2>Usuarios</h2>
<a href="crear.php" class="btn">+ Nuevo</a>
</div>

<div class="card">

<table>
<tr>
<th>Nombre</th>
<th>Correo</th>
<th>Rol</th>
</tr>

<?php
$res=$conn->query("SELECT * FROM usuarios");

while($r=$res->fetch_assoc()){
?>
<tr>
<td><?php echo $r['nombre']; ?></td>
<td><?php echo $r['correo']; ?></td>
<td><?php echo $r['rol']; ?></td>
</tr>
<?php } ?>

</table>

</div>
</div>