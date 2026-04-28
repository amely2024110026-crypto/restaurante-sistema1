<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function obtener_menu($db) {
    // Si 'categoriaId' te da error, intenta cambiarlo por el nombre exacto de tu columna
    // Por ahora, usemos una consulta más simple para que tu index.php cargue sin errores
    $sql = "SELECT * FROM platillos"; 
    
    // Si quieres el nombre de la categoría, asegúrate de que los nombres coincidan:
    // $sql = "SELECT p.*, c.nombre as cat FROM platillos p LEFT JOIN categorias c ON p.id_categoria = c.id";

    $resultado = mysqli_query($db, $sql);
    return $resultado;
}