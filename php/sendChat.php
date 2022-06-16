<?php

    include 'config.php';
    session_start();
    $text = $_POST['text'];
    $time = $_POST['time'];
    $user_id = $_SESSION['user_id'];
    $unique_id = $_SESSION['unique_id'];


    if(!empty($text) && !empty($user_id) && !empty($unique_id)){
        $sql = "UPDATE chats SET msg = '$text' WHERE incoming_id = '$user_id' AND outgoing_id = '$unique_id' AND msg = 'typing...'  OR outgoing_id = '$user_id' AND incoming_id = '$unique_id' AND msg = 'typing...'";
        $result = mysqli_query($mySqlConnect, $sql);
        if($result){
            echo "success";
        }else{
            echo "Error";
        }
    }else{
        echo "Message not sent";
    }




?>