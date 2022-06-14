<?php

    include 'config.php';
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header('Location: /myChatApp/html-php/signUpLogin.php');
    }
    $query = "SELECT * FROM users WHERE unique_id = '".$_SESSION['unique_id']."'";
    $result = mysqli_query($mySqlConnect, $query);
    $row = mysqli_fetch_assoc($result);

?>