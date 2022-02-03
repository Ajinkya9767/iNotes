<?php
    $showAlert = false;
    $showError = "false";
    $method = $_SERVER['REQUEST_METHOD'];
    $recaptcha = $_POST['g-recaptcha-response'];
    // $res = reCaptcha($recaptcha);
    // if($res['success']){
    // // Send email
    // }else{
    // // Error
    // }
    if($method == 'POST'){
        include '_dbConnect.php';
        $firstname = $_POST['signupFirstname'];
        $lastname = $_POST['signupLastname'];
        $username = $_POST['signupEmail'];
        $password = $_POST['signupPassword'];
        $cpassword = $_POST['signupCPassword'];

        //check whether this username exists
        $existSql = "select * from users where username = '$username'";
        $result = mysqli_query($conn, $existSql);
        $numRows = mysqli_num_rows($result);

        if($numRows > 0){
            $showError = "Email already exists!";
        }
        else{
            if($password == $cpassword){
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "insert into users (firstname, lastname, username, password) values ('$firstname', '$lastname', '$username', '$hash')";
                $result = mysqli_query($conn, $sql);
                if($result){
                    $showAlert = true;
                    header("location: http://localhost/php_tutorial/Forum/index.php?signupsuccess=true");
                    exit();
                }
            }
            else{
                $showError = "Password do not match!";
            }
        }
        header("location: http://localhost/php_tutorial/Forum/index.php?signupsuccess=false&error=$showError");
    }
?>

