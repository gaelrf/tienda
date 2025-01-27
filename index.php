<?php
    if(isset($_POST['submit'])){
        include 'conexion.php';
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $sql = 'SELECT * FROM usuarios WHERE usuario = :usuario';
        $prpstm = $conexion->prepare($sql);
        $prpstm->bindParam(':usuario', $usuario);
        $prpstm->execute();
        if($prpstm->rowCount()> 0){
            $row= $prpstm->fetch(PDO::FETCH_ASSOC);
            if(password_verify($password, $row['password'])){
                session_start();
                $_SESSION['usuario'] = $usuario;
                $_SESSION['usuario_id'] = $row['usuario_id'];
                header('Location: tienda');
            }else{
                $error = 'Usuario o Contraseña incorrecta';
            }
        }else{
            $error = 'Usuario o Contraseña incorrecta';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <form action="" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" placeholder="Introduzca su usuario" required>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" placeholder="Introduzca su contraseña" required>
        <input type="submit" name="submit" value="Submit">
        <?php if(isset($error)) echo "<p>".$error."</p>"; ?>
    </form>
</body>
</html>