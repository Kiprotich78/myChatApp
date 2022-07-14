<?php

    include 'config.php';
    session_start();
    $text = $_POST['text'];
    $time = $_POST['time'];
    $user_id = $_SESSION['user_id'];
    $unique_id = $_SESSION['unique_id'];


    if(!empty($text) && !empty($user_id) && !empty($unique_id)){
        $sql = "SELECT * FROM chats WHERE incoming_id = '$user_id' AND outgoing_id = '$unique_id' AND msg = 'typing'";
        $result = mysqli_query($mySqlConnect, $sql);
        if(mysqli_num_rows($result) == 0){
            $sql = "INSERT INTO chats (incoming_id, outgoing_id, msg, time) VALUES ('$user_id', '$unique_id', '$text', '$time')";
            $result = mysqli_query($mySqlConnect, $sql);
        }
        else{
            $sql = "UPDATE chats SET msg = '$text', time = '$time' WHERE incoming_id = '$user_id' AND outgoing_id = '$unique_id'";
            $result = mysqli_query($mySqlConnect, $sql);
        }
    }else{
        echo "Message not sent";
    }




?>