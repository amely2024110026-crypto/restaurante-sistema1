<?php include("../auth.php"); ?>
<?php include("../menu.php"); ?>
<?php include("../conexion.php"); ?>
<?php include("../config.php"); ?>

<link rel="stylesheet" href="<?php echo $base; ?>assets/css/styles.css">

<div class="main">

    <!-- NAV -->
    <div class="nav">
        <h2>📂 Categorías</h2>

        <div>
            <a href="<?php echo $base; ?>dashboard.php" class="btn-back">← Dashboard</a>
            <a href="crear.php" class="btn">+ Nueva</a>
        </div>
    </div>

    <!-- CARD -->
    <div class="card">

        <table>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Acciones</th>
</tr>

<?php
$res = $conn->query("SELECT * FROM categorias ORDER BY id DESC");

while($r = $res->fetch_assoc()){
?>
<tr>
<td>#<?php echo $r['id']; ?></td>
<td><?php echo $r['nombre']; ?></td>

<td>
<a class="btn" href="<?php echo $base; ?>categorias/editar.php?id=<?php echo $r['id']; ?>">✏️</a>

<a class="btn" style="background:red"
onclick="return confirm('¿Eliminar categoría?')"
href="<?php echo $base; ?>categorias/eliminar.php?id=<?php echo $r['id']; ?>">🗑</a>
</td>

</tr>
<?php } ?>
</table>

    </div>

</div>