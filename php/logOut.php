<?php

    include 'config.php';
    session_start();
    $query = "UPDATE users SET status = 'Inactive' WHERE unique_id = '$_SESSION[unique_id]'";
    $result = mysqli_query($mySqlConnect, $query);
    if($result){
        session_destroy();
    }
    else{
        echo "Error";
    }

?>