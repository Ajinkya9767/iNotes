<?php
    $showAlert = false;
    $showError = "false";
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'POST'){
        include '_dbConnect.php';
        $username = $_POST['loginEmail'];
        $password = $_POST['loginPassword'];

        if($username == 'admin@gmail.com' && $password == 'Admin@123'){
            session_start();
            $_SESSION['loggedIn'] = true;
            header("location: http://localhost/iNotes/admin/index.php?loginsuccess=true");
            exit();
        }

        $sql = "select * from users where username = '$username' ";
        $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);

        if($numRows == 1){
            $row = mysqli_fetch_assoc($result);
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $userid = $row['id'];
            $pass = $row['password'];
            if(password_verify($password,$pass)){
                session_start();
                $_SESSION['loggedIn'] = true;
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['userid'] = $userid;
                header("location: http://localhost/iNotes/home.php?loginsuccess=true");
                exit();
            }
            else{
                $showError = "Password is Invalid! Please enter valid password.";
                header("location: http://localhost/iNotes/index.php?loginsuccess=false&error=$showError");
                exit();
            }
        }
        else{
            $showError = "Username is Invalid! Please enter valid username.";
            header("location: http://localhost/iNotes/index.php?loginsuccess=false&error=$showError");
        }
    }
?>