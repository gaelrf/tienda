<?php

if (isset($_POST["calle"])) {
    include 'conexion.php';
    $id = $_POST["id"];
    $calle = $_POST["calle"];
    $numero = $_POST["numero"];
    $comuna = $_POST["comuna"];
    $ciudad = $_POST["ciudad"];

    $sql = "INSERT INTO direcciones (calle, numero, comuna, ciudad, idproveedores) VALUES (:calle, :numero, :comuna, :ciudad, :id)";
    $stm = $conexion->prepare($sql);
    $stm->bindParam(":id", $id);
    $stm->bindParam(":calle", $calle);
    $stm->bindParam(":numero", $numero);
    $stm->bindParam(":comuna", $comuna);
    $stm->bindParam(":ciudad", $ciudad);
    $stm->execute();
    header("Location: proveedores?&id=$id");
}
?>