<?php

    include 'config.php';
    session_start();
    $email = mysqli_real_escape_string($mySqlConnect, $_POST['email']);
    $password =  mysqli_real_escape_string($mySqlConnect, $_POST['password']);

    if(!empty($email) && !empty($password)){
        $query = "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'";
        $sql = mysqli_query($mySqlConnect, $query);
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $_SESSION['unique_id'] = $row['unique_id'];
            $query = "UPDATE users SET status = 'Active Now' WHERE unique_id = '$_SESSION[unique_id]'";
            mysqli_query($mySqlConnect, $query);
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