<?php

session_start();
if (!isset($_SESSION["usuario_id"])) {
    header("Location: index");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/tienda.css">
</head>

<body>
    <header>
        <i class="fa-solid fa-store"></i>
        <p>
            Bienvenido <?php echo $_SESSION['usuario']; ?>
            <a href="logout">Cerrar Sesión</a>
        </p>
    </header>
    <main>
        <aside>
        </aside>
        <section>
        </section>
    </main>
    <footer>
    </footer>
</body>

</html>