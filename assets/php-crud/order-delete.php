<?php

if (isset($_GET["id_order"])) {
    $id_order = $_GET["id_order"];

    include_once "../php/config.php";
    
    $sql = "DELETE FROM orders WHERE id_order=$id_order";
    
    $conn->query($sql);
}
header("location: order-index.php");
exit;
?>