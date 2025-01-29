<?php
if (!isset($_GET["id"])) {
    header("Location: proveedores");
}
include("partials/header.php");
$id = $_GET["id"];
$sql = "SELECT P.*, D.id AS id_direccion, D.calle, D.numero, D.comuna, D.ciudad, T.id AS id_telefono, T.numero AS telefono FROM PROVEEDORES AS P 
LEFT JOIN DIRECCIONES AS D ON P.ID=D.IDPROVEEDORES 
LEFT JOIN TELEFONOS AS T ON P.ID=T.IDPROVEEDORES 
WhERE P.ID=:id;";
$stm = $conexion->prepare($sql);
$stm->bindParam(":id", $id);
$stm->execute();
?>
<main>
    <?php
    include("partials/aside.php");
    ?>
    <section>
        <h1>Proveedor</h1>
        <?php
        $direcciones = [];
        $telefonos = [];
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            echo "<div class='proveedor'>
            <h2>{$row["nombre"]}</h2>
            <p>Web: {$row["web"]}</p>
            </div>";
            do {
                if ($row["id_direccion"]) {
                    $direccion = ["id_direccion" => $row["id_direccion"], "calle" => $row["calle"], "numero" => $row["numero"], "comuna" => $row["comuna"], "ciudad" => $row["ciudad"]];
                    if (count($direcciones) > 0) {
                        $encontrado=false;
                        foreach ($direcciones as $direccion_guardada) {
                            if ($direccion_guardada["id_direccion"] == $row["id_direccion"]) {
                                $encontrado=true;
                            }
                        }
                        if (!$encontrado) {
                            $direcciones[] = $direccion;
                        }
                    } else {
                        $direcciones[] = $direccion;
                    }
                } 
    
                if ($row["id_telefono"]) {
                    $telefono = ["id_telefono" => $row["id_telefono"], "telefono" => $row["telefono"]];
                    if (count($telefonos) > 0) {
                        $encontrado=false;
                        foreach ($telefonos as $telefono_guardado) {
                            if ($telefono_guardado["id_telefono"] == $row["id_telefono"]) {
                                $encontrado=true;
                            }
                        }
                        if (!$encontrado) {
                            $telefonos[] = $telefono;
                        }
                    } else {
                        $telefonos[] = $telefono;
                    }
                }
            } while ($row = $stm->fetch(PDO::FETCH_ASSOC));
            echo "<div class='proveedor'>
                <h2>Direcciones</h2>";
            foreach ($direcciones as $direccion) {
                echo "<p>{$direccion["calle"]} {$direccion["numero"]}, {$direccion["comuna"]}, {$direccion["ciudad"]}</p>";
            }
            echo "</div>";
            echo "<div class='proveedor'>
                <h2>Telefonos</h2>";
            foreach ($telefonos as $telefono) {
                echo "<p>{$telefono["telefono"]}</p>";
            }
            echo "</div>";


        }
        ?>
    </section>
</main>
<?php
include("partials/footer.php");
?>