<?php
include("../conexion.php");
include("../config.php");

$conn->query("UPDATE pedidos SET estado='".$_GET['e']."' WHERE id=".$_GET['id']);

header("Location: ".$base."pedidos/listar.php");
?>