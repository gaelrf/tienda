<?php

if(isset($_POST["telefono"])){
    include 'conexion.php';
    $id = $_POST["id"];
    $numero = $_POST["telefono"];
    $sql = "INSERT INTO telefonos (numero, idproveedores) VALUES (:numero, :idproveedor)";
    $stm = $conexion->prepare($sql);
    $stm->bindParam(":idproveedor", $id);
    $stm->bindParam(":numero", $numero);
    $stm->execute();
    header("Location: proveedores?id=".$id);
} else {
    header("Location: proveedores?id=".$_POST["id"]);
}

?>