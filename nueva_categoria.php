<?php
if (isset($_POST["nombre"])) {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    include("conexion.php");
    $sql = "INSERT INTO categoria (nombre, descripcion) VALUES (:nombre, :descripcion)";
    $stm = $conexion->prepare($sql);
    $stm->bindParam(":nombre", $nombre, );
    $stm->bindParam(":descripcion", $descripcion, );
    $stm->execute();
}
header("Location: categorias");
?>