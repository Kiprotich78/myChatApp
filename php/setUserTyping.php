<?php
        
        include 'config.php';
        session_start();
        $text = $_POST['status'];
        $user_id = $_SESSION['user_id'];
        $unique_id = $_SESSION['unique_id'];
        $time = date('H:i');


        if(!empty($text) && !empty($user_id) && !empty($unique_id)){
            $query = "SELECT * FROM chats WHERE incoming_id = '$user_id' AND outgoing_id = '$unique_id' AND msg='$text' OR outgoing_id = '$user_id' AND incoming_id = '$unique_id' AND msg = '$text'";
            $result = mysqli_query($mySqlConnect, $query);
            if(mysqli_num_rows($result) == 0){
                $sql = "INSERT INTO chats (incoming_id, outgoing_id, msg, time) VALUES ('$user_id', '$unique_id', '$text', '$time')";
                $result = mysqli_query($mySqlConnect, $sql);
                if($result){
                    echo "success";
                }else{
                    echo "Error3";
                }
            }else{
                $sql = "UPDATE chats SET msg = '$text' WHERE incoming_id = '$user_id' AND outgoing_id = '$unique_id' AND msg = '$text'  OR outgoing_id = '$user_id' AND incoming_id = '$unique_id' AND msg = '$text'";
                $result = mysqli_query($mySqlConnect, $sql);
                if($result){
                    echo "success";
                }else{
                    echo "Error4";
                }
            }
        }else{
            echo "Error1";
        }
    
    
?>