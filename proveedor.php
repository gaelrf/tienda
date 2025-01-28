<?php
if(!isset($_GET["id"])){
    header("Location: proveedores");
}
include("partials/header.php");
$id = $_GET["id"];
$sql = "select * from proveedores where id = :id";
?>
<main>
    <?php
    include("partials/aside.php");
    ?>
    <section>
    </section>
</main>
<?php
include("partials/footer.php");
?>