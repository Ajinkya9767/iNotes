<?php
  if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true"){
    echo '
      <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Success!</strong> You have successfully signed Up! Now, you can login.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    ';
  }
  if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false"){
    $Error = $_GET['error'];
    echo '
      <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Error!</strong> '.$Error.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    ';
  }
  if(isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false"){
    $Error = $_GET['error'];
    echo '
      <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Error!</strong> '.$Error.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    ';
  }
?>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
      .container1{
        margin-top: 100px;
        padding-top: 20px;
        margin-left: 320px;
      }
      body{
        display: block;
        background-color: #7d2ae8;
      }
    </style>
  </head>
<body>
  <div class="container1">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="images/anvay6.jpg" alt="">
        <div class="text">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="images/backImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>

    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <div class="title">Login</div>
            <form name="myform" action="/iNotes/partial/_handlelogin.php" method="POST" onsubmit="return validateform()">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input type="email" name="loginEmail" placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" name="loginPassword" placeholder="Enter your password" required>
                </div>
                <div class="text"><a href="reset.html"><b>Forgot password?</b></a></div>
                <div class="button input-box">
                  <input type="submit" value="Sumbit">
                </div>
                <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div>
              </div>
            </form>
          </div>
        
        <div class="signup-form">
          <div class="title">Signup</div>
            <form name="myform1" action="/iNotes/partial/_handleSignup.php" method="POST" onsubmit ="return verifyPassword()">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-user"></i>
                  <input type="text" name="signupName" placeholder="Enter your name" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input type="email" name="signupEmail" placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" name="signupPassword" id="pswd" placeholder="Enter your password" required>
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" name="signupCPassword" placeholder="Confirm password" required>
                </div>
                <div class="button input-box">
                  <input type="submit" value="Sumbit">
                </div>
                <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
              </div>
          </div>
        </div>
      </form>
      </div>
  </div>
</body>
</html>

<script>  
  function verifyPassword() {  
    var pw = document.getElementsByName("signupPassword").value;  
    //check empty password field  
    if(pw == "") {  
      document.getElementById("message").innerHTML = "**Fill the password please!";  
      return false;  
    }  
   
    //minimum password length validation  
    if(pw.length < 8) {  
      document.getElementById("message").innerHTML = "**Password length must be atleast 8 characters";  
      return false;  
    }  
  
  //maximum length of password validation  
    if(pw.length > 15) {  
      document.getElementById("message").innerHTML = "**Password length must not exceed 15 characters";  
      return false;  
    } 
    else {  
      alert("Password is correct");  
    }    
  }  
</script>