<?php include("../auth.php"); ?>
<?php include("../conexion.php"); ?>
<?php include("../auth.php"); ?>
<?php include("../menu.php"); ?>

<?php
$id = $_GET['id'];

$res = $conn->query("
SELECT d.*, p.nombre 
FROM pedido_detalle d
JOIN platillos p ON d.platillo_id = p.id
WHERE d.pedido_id = $id
");
?>

<link rel="stylesheet" href="../assets/css/styles.css">

<div class="main">

<h2>Detalle del Pedido</h2>

<?php while($r = $res->fetch_assoc()){ ?>
<p>
<?php echo $r['nombre']; ?> x<?php echo $r['cantidad']; ?>
= $<?php echo $r['cantidad'] * $r['precio']; ?>
</p>
<?php } ?>

</div>