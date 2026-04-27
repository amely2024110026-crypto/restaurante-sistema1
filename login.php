<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("conexion.php");


if($_POST){
$correo=$_POST['correo'];
$pass=$_POST['password'];

$res=$conn->query("SELECT * FROM usuarios WHERE correo='$correo'");
$u=$res->fetch_assoc();

if($u && password_verify($pass,$u['password'])){
$_SESSION['usuario']=$u['nombre'];
$_SESSION['rol']=$u['rol'];
header("Location: dashboard.php");
}else{
$error="Datos incorrectos";
}
}
?>
<style>
body{display:flex;justify-content:center;align-items:center;height:100vh;background:linear-gradient(135deg,#1e1e2f,#ff4d4d);}
.box{background:white;padding:50px;border-radius:12px;width:300px;text-align:center;}
</style>

<div class="box">
<h2>💮桜 Sakura_Sushi💮</h2>
<?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>

<form method="POST">
<input name="correo" placeholder="Correo">
<input type="password" name="password" placeholder="Contraseña">
<br>
<br><button class="btn">Entrar</button>
</form>

<a href="recuperar.php">¿Olvidaste tu contraseña?</a>
</div>