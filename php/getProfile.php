<?php
    include 'config.php';
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("Location: /myChatApp/html-php/index.php");
    }
    $query = "SELECT * FROM users WHERE unique_id = '".$_SESSION['unique_id']."'";
    $sql = mysqli_query($mySqlConnect, $query);
    $row = mysqli_fetch_assoc($sql);
    echo '
            <div class="image">
                <img id="image" src="/myChatApp/php/images/'.$row['image'].'">
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