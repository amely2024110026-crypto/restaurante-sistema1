<?php include("../auth.php"); ?>
<?php include("../menu.php"); ?>
<?php include("../conexion.php"); ?>

<link rel="stylesheet" href="../assets/css/styles.css">

<div class="main">

    <div class="nav">
        <h2>Usuarios</h2>
        <a href="crear.php" class="btn">+ Nuevo</a>
    </div>

    <div class="card">
        <table>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Acciones</th> </tr>

            <?php
            $res = $conn->query("SELECT * FROM usuarios");

            while($r = $res->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $r['nombre']; ?></td>
                <td><?php echo $r['correo']; ?></td>
                <td><?php echo $r['rol']; ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $r['id']; ?>" class="btn-edit">Editar</a>
                    
                    <a href="eliminar.php?id=<?php echo $r['id']; ?>" 
                       class="btn-delete" 
                       onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
                       Eliminar
                    </a>
                </td>
            </tr>
            <?php } ?>

        </table>
    </div>
</div>

<style>
    /* Estilos rápidos para los botones si no los tienes en tu CSS */
    .btn-edit {
        background-color: #2196F3;
        color: white;
        padding: 5px 10px;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
    }

    .btn-delete {
        background-color: #f44336;
        color: white;
        padding: 5px 10px;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
        margin-left: 5px;
    }

    .btn-edit:hover, .btn-delete:hover {
        opacity: 0.8;
    }
    
    table td {
        padding: 10px;
    }
</style>