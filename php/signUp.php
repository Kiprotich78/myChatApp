<?php
    session_start();
    include_once 'config.php';
    $fname = mysqli_real_escape_string($mySqlConnect, $_POST['fname']);
    $lname = mysqli_real_escape_string($mySqlConnect, $_POST['lname']);
    $email = mysqli_real_escape_string($mySqlConnect, $_POST['email']);
    $password = mysqli_real_escape_string($mySqlConnect, $_POST['password']);

   if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $sql = mysqli_query($mySqlConnect, "SELECT * FROM users WHERE email = '$email'");
        $num = mysqli_num_rows($sql);
        if($num == 0){
            if(isset($_FILES['image'])){
                $file_name = $_FILES['image']['name'];
                $file_tmp = $_FILES['image']['tmp_name'];
                $file_type = $_FILES['image']['type'];

                $image_explode = explode('.', $file_name);
                $image_ext = strtolower(end($image_explode));
                $extensions= array("jpeg","jpg","png");
                if(in_array($image_ext, $extensions)=== TRUE){
                    $time = time();
                    $file_name = $time.'.'.$image_ext;
                    $file_path = "images/".$file_name;
                    if(move_uploaded_file($file_tmp, $file_path)){
                        $status = "Active Now";
                        $random_id = rand(time(), 1000000);
                        $sql = mysqli_query($mySqlConnect, 
                                "INSERT INTO users (unique_id, fname, lname, email, password, image, status) 
                                VALUES ('$random_id','$fname', '$lname', '$email', '$password', '$file_name', '$status')");
                        if($sql){
                            $sql2 = mysqli_query($mySqlConnect, "SELECT * FROM users WHERE email = '$email'");
                            if($sql2){
                                $row2 = mysqli_fetch_assoc($sql2);
                                $_SESSION['unique_id'] = $row2['unique_id'];
                                echo "success";
                            }
                        }else{
                            echo "Error";
                        }
                    }else{
                        echo "Error";
                    }
                    
                } 
                else{
                    echo "extension not allowed, please choose a JPEG or PNG file.";
                }
            }
            else{
                echo "upload an image";
            }
            
        }
        else{
            echo "Email already exists";
        }
      
    }
    else{
      echo "Invalid Email";
    }
}
else{
    echo "all fields are required";
}


?>