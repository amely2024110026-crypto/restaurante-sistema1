<?php
session_start();

// Si ya inició sesión → dashboard
if(isset($_SESSION['usuario'])){
    header("refresh:2;url=dashboard.php");
} else {
    header("refresh:3;url=login.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Sistema Restaurante</title>

<link rel="stylesheet" href="assets/css/styles.css">

<style>
body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(135deg, #2c3e50, #3498db);
    color: white;
}

.splash {
    text-align: center;
    animation: fadeIn 1.5s ease-in-out;
}

h1 {
    font-size: 40px;
    margin-bottom: 10px;
}

p {
    font-size: 18px;
    opacity: 0.8;
}

.loader {
    margin: 20px auto;
    border: 5px solid rgba(255,255,255,0.3);
    border-top: 5px solid white;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

@keyframes fadeIn {
    from {opacity:0; transform: translateY(20px);}
    to {opacity:1; transform: translateY(0);}
}
</style>

</head>

<body>

<div class="splash">
    <h1>🍽️ Sistema Restaurante</h1>
    <p>Cargando sistema...</p>
    <div class="loader"></div>

    <?php if(isset($_SESSION['usuario'])){ ?>
        <p>Redirigiendo al panel...</p>
    <?php } else { ?>
        <p>Redirigiendo al login...</p>
    <?php } ?>
</div>

</body>
</html>