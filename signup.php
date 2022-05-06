<?php
  $showAlert = false;
  $showError = false;
  $exists = false;
  if($_SERVER["REQUEST_METHOD"]== "POST"){
    include 'partial/_dbConnect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['password2'];
    
    //Check whether this username exists
    $existssql = "select * from user where username = '$username'";
    $result = mysqli_query($conn, $existssql);
    $numsExitRows = mysqli_num_rows($result);
    if($numsExitRows > 0){
      $exists = true;
      $Error = "Username already exists!";
    }
    else{
      $exists = false;
      
      if($password == $cpassword && $exists == false){
        $hash = password_hash($password , PASSWORD_DEFAULT);
        $sql = "insert into user (username,password) values ('$username','$hash')";
        $result = mysqli_query($conn, $sql);

        if($result){
          $showAlert = true;
        }
      }
      else{
        $showError = true;
        $Error = "Password does not match!";
      }
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>SignUp</title>
  </head>

  <body>
    <?php require 'partial/header.php' ?>
    
    <?php
      if($showAlert){
        echo '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your account is now created and you can login.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        ';
      }
      if($showError){
        echo '
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '.$Error.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        ';
      }
      if($exists){
        echo '
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '.$Error.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        ';
      }
    ?>

    <div class="container col-md-6 my-4">
        <h1 class="text-center">SignUp to our website</h1>
        <form action="/iNotes/signup.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-labe">Username</label>
                <input type="text" maxlength="11" class="form-control" name="username" id="username" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" minlength="8" maxlength="15" class="form-control" name="password" id="password" required>
            </div>
            <div class="mb-3">
                <label for="password2" class="form-label">Confirm Password</label>
                <input type="password" minlength="8" maxlength="15" class="form-control" name="password2" id="password2" required>
                <div id="emailHelp" class="form-text">Make sure to type same password.</div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">SignUp</button>
        </form>
    </div>

    <?php require 'partial/footer.php' ?>
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