<?php

    include 'config.php';
    session_start();

    $user_id = $_SESSION['user_id'];
    $unique_id = $_SESSION['unique_id'];

    $query = "DELETE FROM chats WHERE incoming_id = '$user_id' AND outgoing_id = '$unique_id' AND msg = 'typing...' OR outgoing_id = '$user_id' AND incoming_id = '$unique_id' AND msg = 'typing...'";
    $result = mysqli_query($mySqlConnect, $query);
    if($result){
        echo "Msg Deleted successfully";
    }else{
        echo "Error";
    }

?>