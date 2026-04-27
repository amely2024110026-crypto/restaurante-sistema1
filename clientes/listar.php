<?php include("../auth.php"); ?>
<?php include("../menu.php"); ?>

<?php include("../conexion.php");
$res=$conn->query("SELECT * FROM categorias"); ?>

<link rel="stylesheet" href="../assets/css/styles.css">
<div class="container"><div class="card">

<h2>Categorías</h2>
<a href="crear.php">Nueva</a>

<table>
<?php while($r=$res->fetch_assoc()){ ?>
<tr>
<td><?php echo $r['nombre']; ?></td>
<td>
<a href="editar.php?id=<?php echo $r['id']; ?>">Editar</a>
<a href="eliminar.php?id=<?php echo $r['id']; ?>">Eliminar</a>
</td>
</tr>
<?php } ?>
</table>

</div></div>