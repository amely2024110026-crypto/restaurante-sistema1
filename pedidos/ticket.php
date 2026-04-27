<?php include("../conexion.php");

$id=$_GET['id'];

$res=$conn->query("
SELECT d.*,p.nombre 
FROM pedido_detalle d
JOIN platillos p ON d.platillo_id=p.id
WHERE pedido_id=$id
");

$total=0;
?>

<h2>🍣 Sushi Kai</h2>
<h3>Pedido #<?php echo $id; ?></h3>

<?php while($r=$res->fetch_assoc()){
$sub=$r['cantidad']*$r['precio'];
$total+=$sub;
?>
<p><?php echo $r['nombre']; ?> x<?php echo $r['cantidad']; ?> = $<?php echo $sub; ?></p>
<?php } ?>

<h2>Total: $<?php echo $total; ?></h2>

<button onclick="window.print()">🖨 Imprimir</button>