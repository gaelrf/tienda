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
        <form action="guardar_proveedor" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required placeholder="Nombre del proveedor">
            <br>
            <label for="web">Web:</label>
            <input type="text" name="web" id="web" required placeholder="Web del proveedor">
            <br>
            <input type="submit" value="Guardar">
        </form>
        <div class="contacto">
            <?php if (isset($_GET["id"])) { ?>
                <form action="nueva_direccion" method="POST">
                    <h4>Nueva Direccion</h4>
                    <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                    <label for="calle">Calle</label>
                    <input type="text" name="calle" id="calle" required placeholder="Calle">
                    <br>
                    <label for="numero">Numero</label>
                    <input type="text" name="numero" id="numero" required placeholder="Numero">
                    <br>
                    <label for="comuna">Comuna</label>
                    <input type="text" name="comuna" id="comuna" required placeholder="Comuna">
                    <br>
                    <label for="ciudad">Ciudad</label>
                    <input type="text" name="ciudad" id="ciudad" required placeholder="Ciudad">
                    <br>
                    <input type="reset" value="Limpiar">
                    <input type="submit" value="Guardar">
                </form>
                <form action="numero_telefono" method="POST">
                    <h4>Nuevo Telefono</h4>
                    <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                    <label for="telefono">Telefono:</label>
                    <input type="text" name="telefono" id="telefono" required placeholder="Telefono del proveedor">
                </form> <?php } ?>
        </div>
    </section>
</main>
<?php
include("partials/footer.php");
?>