<?php
include("../conexion.php");
include("../config.php");

$id = $_GET['id'];

$conn->query("DELETE FROM categorias WHERE id=$id");

header("Location: ".$base."categorias/listar.php");
?>