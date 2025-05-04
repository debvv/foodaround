<?php
   if (!headers_sent() && session_id() === '') {
    session_start();
}
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $id_order = mysqli_real_escape_string($conn, $_GET['id_order']);
        $user_id = $_SESSION['unique_id'];
        $sql = mysqli_query($conn, "UPDATE orders SET accepted = '{$user_id}' WHERE id_order={$id_order}");
        
        if($sql)
        {
            header("location: ../../history_order_culinary.php");
        }
        
        echo $user_id;
    }
    else{  
        header("location: ../../index.php");
    }
?>