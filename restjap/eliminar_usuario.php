<?php
require 'includes/database.php';
require 'includes/funciones.php';

$db = conectarDB();

$id = $_GET['id'] ?? null;
$id = filter_var($id, FILTER_VALIDATE_INT);

if($id) {
    // Evitar que el administrador se borre a sí mismo por error
    $query = "DELETE FROM usuarios WHERE id = ${id}";
    $resultado = mysqli_query($db, $query);

    if($resultado) {
        header('Location: usuarios.php');
    }
}