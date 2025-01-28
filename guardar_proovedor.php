<?php

if(isset($_POST["nombre"])){
    include"conexion.php";
    $nombre = $_POST["nombre"];
    $web = $_POST["web"];
    $sql = "INSERT INTO proveedores (nombre, web) VALUES (:nombre, :web)";
    $stm = $conexion->prepare($sql);
    $stm->bindParam(":nombre", $nombre);
    $stm->bindParam(":web", $web);
    $stm->execute();
    $id=$conexion->lastInsertId();
    header("Location: proovedores?id=".$id);
}else{

header("Location: proovedores");
}
?>