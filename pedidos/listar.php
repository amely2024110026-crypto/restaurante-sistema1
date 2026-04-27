<?php include("../auth.php"); ?>
<?php include("../menu.php"); ?>
<?php include("../conexion.php"); ?>
<?php include("../config.php"); ?>

<link rel="stylesheet" href="<?php echo $base; ?>assets/css/styles.css">

<div class="main">

<div class="nav">
<h2>Pedidos</h2>
<a href="<?php echo $base; ?>pedidos/crear.php" class="btn">+ Nuevo</a>
</div>

<div class="card">

<table>
<tr><th>ID</th><th>Cliente</th><th>Estado</th><th>Acciones</th></tr>

<?php
$res=$conn->query("SELECT * FROM pedidos ORDER BY id DESC");

while($r=$res->fetch_assoc()){
?>
<tr>
<td>#<?php echo $r['id']; ?></td>
<td><?php echo $r['cliente_nombre']; ?></td>

<td>
<span class="estado <?php echo $r['estado']; ?>">
<?php echo $r['estado']; ?>
</span>
</td>

<td>

<?php if($r['estado']=='pendiente'){ ?>
<a class="btn" href="<?php echo $base; ?>pedidos/cambiar_estado.php?id=<?php echo $r['id']; ?>&e=preparacion">🍳</a>
<?php } ?>

<?php if($r['estado']=='preparacion'){ ?>
<a class="btn" href="<?php echo $base; ?>pedidos/cambiar_estado.php?id=<?php echo $r['id']; ?>&e=servido">✅</a>
<?php } ?>

<a class="btn" href="<?php echo $base; ?>pedidos/ver.php?id=<?php echo $r['id']; ?>">👁</a>
<a class="btn" href="<?php echo $base; ?>pedidos/ticket.php?id=<?php echo $r['id']; ?>">🧾</a>

</td>
</tr>
<?php } ?>

</table>

</div>
</div>