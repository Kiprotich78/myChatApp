<?php

    include 'config.php';
    session_start();
    $text = $_POST['text'];
    $time = $_POST['time'];
    $user_id = $_SESSION['user_id'];
    $unique_id = $_SESSION['unique_id'];


    if(!empty($text) && !empty($user_id) && !empty($unique_id)){
        $sql = "INSERT INTO chats (incoming_id, outgoing_id, msg, time) VALUES ('$user_id', '$unique_id', '$text', '$time')";
        $result = mysqli_query($mySqlConnect, $sql);
        if($result){
            echo "Message sent";
        }else{
            echo "Message not sent";
        }
    }else{
        echo "Message not sent";
    }


?>