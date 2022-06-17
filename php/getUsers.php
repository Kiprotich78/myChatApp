<?php
    include 'config.php';
    session_start();
    $query = "SELECT * FROM users LEFT JOIN chats ON users.unique_id = chats.incoming_id WHERE users.unique_id != '".$_SESSION['unique_id']."' ORDER BY chats.chat_id DESC ";

    $query3 = "SELECT *, MAX(chats.chat_id) FROM users LEFT JOIN chats ON users.unique_id = chats.incoming_id or users.unique_id = chats.outgoing_id WHERE users.unique_id != '".$_SESSION['unique_id']."' GROUP BY users.fname ORDER BY MAX(chats.chat_id) DESC";
    $sql = mysqli_query($mySqlConnect, $query3);

    $output = "";
    for($i = 0; $i < mysqli_num_rows($sql); $i++){
        $row = mysqli_fetch_assoc($sql);
        if($row['status'] == "Active Now"){
            $id = "online";
        }
        else{
            $id = "offline";
        }
        $query2 = "SELECT * FROM chats WHERE (incoming_id = '".$_SESSION['unique_id']."' AND outgoing_id = '".$row['unique_id']."') OR (incoming_id = '".$row['unique_id']."' AND outgoing_id = '".$_SESSION['unique_id']."') AND msg != 'typing...' ORDER BY chat_id DESC LIMIT 1";
        $sql2 = mysqli_query($mySqlConnect, $query2);
        if(mysqli_num_rows($sql2) > 0){
            $row2 = mysqli_fetch_assoc($sql2);
            $msg = $row2['msg'];
            if($row2['incoming_id'] != $_SESSION['unique_id']){
                $msg = 'You: '.$msg;
            }
            if(strlen($msg) > 15){
                $msg = substr($msg, 0, 20)."...";
            }
        }
        else{
            $msg = "";
        }
        $output .= '
            <a href="/myChatApp/html-php/chatPage.php?user_id='.$row['unique_id'].'">
            <div class="singleUser">
                <div class="image">
                    <img src="/myChatApp/php/images/'.$row['image'].'">
                </div>
                <div>
                    <div class="userName3">'.$row['fname'].'</div>
                    <p class="lastMessage">'.$msg.'</p>
                </div>
                <div class="userstatus" id="'.$id.'">'.$id.'</div>
            </div>
            </a>'
            ;

    }
    echo $output;


?>