<?php
include("partials/header.php");
?>
<?php
$sql = "SELECT * FROM proveedores ORDER BY id DESC";
$result = $conexion->query($sql);
?>
<main>
    <?php
    include("partials/aside.php");
    ?>
    <section>
        <h2>Proveedores</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Web</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($result as $row) {
                    echo ("<tr>
                    <td>" . $row['nombre'] . "</td>
                    <td>" . $row['web'] . "</td>
                    <td>
                        <a href='editar_proveedor?id=" . $row['id'] . "'>Editar</a>
                        <a href='eliminar_proveedor?id=" . $row['id'] . "'>Eliminar</a>
                        </td>
                        </tr>");
                }
                ?>
            </tbody>
        </table>
        <br>
        <h3>Nuevo Proovedor</h3>
        <form action="guardar_proovedor" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required placeholder="Nombre del proovedor">
            <br>
            <label for="web">Web:</label>
            <input type="text" name="web" id="web" required placeholder="Web del proovedor">
            <br>
            <input type="submit" value="Guardar">
        </form>
        <div class="contacto">
            <?php if (isset($_GET["id"])) { ?>
                <div>
                    <h4>Nuevo Telefono</h4>
                </div>
                <div>
                    <h4>Nueva Direccion</h4>
                </div>
            <?php } ?>
        </div>
    </section>
</main>
<?php
include("partials/footer.php");
?>