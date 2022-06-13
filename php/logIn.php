<?php

    include 'config.php';

    $email = $_POST['email'];
    $password = $_POST['email'];

    if(!empty($email) && !empty($password)){
        $sql = mysqli_query($mySqlConnect, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $_SESSION['unique_id'] = $row['unique_id'];
            echo "success";
        }
        else{
            echo "Email or Password is incorrect";
        }
    }
    else{
        echo "Empty Fields";
    }
 
?>