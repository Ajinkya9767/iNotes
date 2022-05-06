<?php
session_start();
include("../partial/_dbConnect.php");

if(isset($_POST['btn_update'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];	
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if($password == $cpassword){
        $user_id = $_GET['userid'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "update users set firstname='$firstname', lastname='$lastname',password='$hash' where id='$user_id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo '
                <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                <strong>Success!</strong> You updated user successfully!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
        }
    }
    else{
        $showError = "Password do not match!";
        echo '
            <div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
            <strong>Success!</strong> '.$showError.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
}    

include "sidenav.php";
include "topheader.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .abc{
            text-decoration: none;
        }
        #desc{
            min-height: 233px;
        }
        .form-control{
            background-color: transparent;
        }
        .main-panel>.content{
            margin-top: 50px;
            padding-top: 40px;
            padding-left: 320px;
        }
    </style>
    <title>Welcome to iNotes</title>
  </head>
  <body>
    
    <?php
        $user_id = NULL;
        if(isset($_GET['userid'])){
            $user_id = $_GET['userid'];

            $sql = "select * from users where id='$user_id'";
            $result = mysqli_query($conn, $sql);

            if($result){
                $row = mysqli_fetch_assoc($result);
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $username = $row['username'];
            }
        }
    ?>

    <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            <form action="" method="post" type="form" name="form">
                <div class="row">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h5 class="title">Update User Profile</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Firstname</label>
                                            <input type="text" id="firstname" required name="firstname" placeholder="<?php echo $firstname; ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Lastname</label>
                                            <input type="text" id="lastname" required name="lastname" placeholder="<?php echo $lastname; ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" id="email" disabled name="email" value="<?php echo $username; ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" id="password" required name="password" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" id="cpassword" required name="cpassword" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card-footer">
                                        <button type="submit" id="btn_update" name="btn_update" required class="btn btn-fill btn-primary">Update User</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>         
                </div>
            </form>
          
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>