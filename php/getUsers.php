<?php
    include 'config.php';
    session_start();
    $query = "SELECT * FROM users WHERE unique_id != '".$_SESSION['unique_id']."'";
    $sql = mysqli_query($mySqlConnect, $query);
    $output = "";
    for($i = 0; $i < mysqli_num_rows($sql); $i++){
        $row = mysqli_fetch_assoc($sql);
        if($row['status'] == "Active Now"){
            $id = "online";
        }
        else{
            $id = "offline";
        }
        $output .= '
            <a href="/myChatApp/html-php/chatPage.php?user_id='.$row['unique_id'].'">
            <div class="singleUser">
                <div class="image">
                    <img src="/myChatApp/php/images/'.$row['image'].'">
                </div>
                <div>
                    <div class="userName3">'.$row['fname'].'</div>
                    <p class="lastMessage">some text hear...</p>
                </div>
                <div class="userstatus" id="'.$id.'">'.$id.'</div>
            </div>
            </a>'
            ;
        $_SESSION['reciever_id'] = $row['unique_id'];

    }
    echo $output;


?>