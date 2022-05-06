<?php
    // $showAlert = false;
    // $showError = "false";
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'POST'){
        include '_dbConnect.php';
        $name = $_POST['signupName'];
        $username = $_POST['signupEmail'];
        $password = $_POST['signupPassword'];
        $cpassword = $_POST['signupCPassword'];

        $delimiter = ' ';
        $names = explode($delimiter,$name);
        $firstname = $names[0];
        $lastname = $names[1];

        //check whether this username exists
        $existSql = "select * from users where username = '$username'";
        $result = mysqli_query($conn, $existSql);
        $numRows = mysqli_num_rows($result);

        if($numRows > 0){
            $showError = "Username already exists!";
        }
        else{
            if($password == $cpassword){
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "insert into users (firstname, lastname, username, password) values ('$firstname', '$lastname', '$username', '$hash')";
                $result = mysqli_query($conn, $sql);
                if($result){
                    $showAlert = true;
                    header("location: http://localhost/iNotes/index.php?signupsuccess=true");
                    exit();
                }
            }
            else{
                $showError = "Password do not match!";
            }
        }
        header("location: http://localhost/iNotes/index.php?signupsuccess=false&error='$showError'");
    }
?>

