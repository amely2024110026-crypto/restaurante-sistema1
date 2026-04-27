<?php
include("../conexion.php");

// Obtener categorías
$categorias = $conn->query("SELECT * FROM categorias");

if($_POST){
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];

    if(empty($nombre) || empty($precio)){
        echo "Campos obligatorios";
        exit();
    }

    $conn->query("INSERT INTO platillos(nombre,precio,categoria_id)
    VALUES('$nombre','$precio','$categoria')");

    header("Location: listar.php");
}
?>

<link rel="stylesheet" href="../assets/css/styles.css">

<div class="container">
<div class="card">

<h2>Nuevo Platillo</h2>

<form method="POST" onsubmit="return validarFormulario()">
<input name="nombre" placeholder="Nombre" required>
<input name="precio" type="number" step="0.01" placeholder="Precio" required>

<select name="categoria" required>
<option value="">Selecciona categoría</option>
<?php while($c = $categorias->fetch_assoc()){ ?>
<option value="<?php echo $c['id']; ?>"><?php echo $c['nombre']; ?></option>
<?php } ?>
</select>

<button>Guardar</button>
</form>

</div>
</div>

<script src="../assets/js/app.js"></script>