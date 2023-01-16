<?php

if (isset($_GET["unique_id"])) {
    $unique_id = $_GET["unique_id"];

    include_once "../php/config.php";
    
    $sql = "DELETE FROM users WHERE unique_id=$unique_id";
    
    $conn->query($sql);
}
header("location: users-index.php");
exit;
?>