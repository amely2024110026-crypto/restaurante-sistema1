<?php
$db = mysqli_connect('localhost', 'root', '', 'restaurante_japones');
if (!$db) { die("Error de conexión"); }
mysqli_set_charset($db, 'utf8');

function conectarDB() : mysqli {
    $db = mysqli_connect('localhost', 'root', '', 'restaurante_db'); // Asegúrate que el nombre de tu BD sea correcto

    if(!$db) {
        echo "Error: No se pudo conectar a MySQL.";
        exit;
    }
    return $db;
}