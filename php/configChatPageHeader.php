<?php

    include 'config.php';
    session_start();

    $query = "SELECT * FROM users WHERE unique_id = '".$_SESSION['user_id']."'";
    $sql = mysqli_query($mySqlConnect, $query);
    $row = mysqli_fetch_assoc($sql);
    echo '
            <div class="left_icon">
                <i class="fa-solid fa-angle-left"></i>
            </div>
            <div class="image">
                <img src="/myChatApp/php/images/'.$row['image'].'"/>
            </div>
            <div>
                <div class="userName">'.$row['fname'].'</div>
                <div class="status">'.$row['status'].'</div>
            </div>
            <div class="logOut">
                <p>Log Out</p>
                <i class="fas fa-sign-out-alt"></i>
            </div>    
    '


?>