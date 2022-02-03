<?php
    $showAlert = false;
    $showError = "false";
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'POST'){
        include '_dbConnect.php';
        $username = $_POST['loginEmail'];
        $password = $_POST['loginPassword'];

        $sql = "select * from users where username = '$username' ";
        $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);

        if($numRows == 1){
            $row = mysqli_fetch_assoc($result);
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $userid = $row['id'];
            if(password_verify($password, $row['password'])){
                session_start();
                $_SESSION['loggedIn'] = true;
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['userid'] = $userid;
                header("location: http://localhost/php_tutorial/Forum/index.php?loginsuccess=true");
                exit();
            }
            else{
                $showError = "Password is Invalid! Please enter valid password.";
                header("location: http://localhost/php_tutorial/Forum/index.php?loginsuccess=false&error=$showError");
                exit();
            }
        }
        else{
            $showError = "Username is Invalid! Please enter valid username.";
            header("location: http://localhost/php_tutorial/Forum/index.php?loginsuccess=false&error=$showError");
        }
    }
?>