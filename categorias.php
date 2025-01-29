<?php
include("partials/header.php");
$sql="SELECT * FROM categoria";
$result=$conexion->query($sql);
?>
<main>
    <?php
    include("partials/aside.php");
    ?>
    <section>
        <h1>Categorías</h1>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row=$result->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr>
                    <td>{$row["nombre"]}</td>
                    <td>{$row["descripcion"]}</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        <form action="nueva_categoria" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" required>
            <br>
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" required>
            <br>
            <input type="submit" value="Agregar">
    </section>
</main>
<?php
include("partials/footer.php");
?>