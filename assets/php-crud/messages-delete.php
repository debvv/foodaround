<?php

if (isset($_GET["msg_id"])) {
    $msg_id = $_GET["msg_id"];

    include_once "../php/config.php";
    
    $sql = "DELETE FROM messages WHERE msg_id=$msg_id";
    
    $conn->query($sql);
}
header("location: messages-index.php");
exit;
?>