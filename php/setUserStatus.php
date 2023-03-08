<?php

    include 'config.php';
    session_start();
    if($_GET['status'] === 'online'){
        $status = 'Active Now';
    }else{
        $status = 'Inactive';
    }

    $query = "UPDATE users SET status = '$status' WHERE unique_id = '".$_SESSION['unique_id']."'";
    $result = mysqli_query($mySqlConnect, $query);
    if($result){
        echo 'Status Updated';
    }else{
        echo 'Status Not Updated';
    }

?>