<?php

    include 'config.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    $unique_id = $_SESSION['unique_id'];
    $query = "SELECT * FROM chats WHERE (incoming_id = '$user_id' AND outgoing_id = '$unique_id') OR (incoming_id = '$unique_id' AND outgoing_id = '$user_id')";


    $result = mysqli_query($mySqlConnect, $query);
    $messages = "";
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $incoming_id = $row['incoming_id'];
            $outgoing_id = $row['outgoing_id'];
            $msg = $row['msg'];
            if($incoming_id == $user_id){
                $messages .= '
                    <div class="chat sentChat">
                        <div class="chat-container">
                            <div class="chat-header">
                                <div class="time">12:00</div>
                            </div>
                            <div class="message">'.$msg.'</div>
                        </div>
                    </div>
                ';
                
            }else{
               
                $messages .= '
                <div class="chat recievedChat">
                <div class="chat-container">
                  <div class="chat-header">
                    <div class="senderName">Alex</div>
                    <div class="time">12:00</div>
                  </div>
                  <div class="message">
                    '.$msg.'
                  </div>
                </div>
              </div>
                ';
            }
        }

        echo $messages;
    }
    else{
        echo "Error";
    }

?>