<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
    <title>Welcome to iDiscuss - Coding forum</title>
    <style>
      body{
        background-color: #1a2035;
        color: white;
      }
    </style>
  </head>
  <body>
    <?php include 'partial/header.php' ?>
      
    <!-- Connected to Database -->
    <?php include 'partial/_dbConnect.php'; ?>

    <?php
      if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
        $userid = $_SESSION['userid'];
      }
      $method = $_SERVER['REQUEST_METHOD'];
      if($method == 'POST'){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $country = $_POST['country'];
        $subject = $_POST['subject'];

        $firstname = str_replace("<" , "&lt" , $firstname);
        $firstname = str_replace(">" , "&gt" , $firstname);
        $lastname = str_replace("<" , "&lt" , $lastname);
        $lastname = str_replace(">" , "&gt" , $lastname);
        $email = str_replace("<" , "&lt" , $email);
        $email = str_replace(">" , "&gt" , $email);
        $mobile = str_replace("<" , "&lt" , $mobile);
        $mobile = str_replace(">" , "&gt" , $mobile);
        $subject = str_replace("<" , "&lt" , $subject);
        $subject = str_replace(">" , "&gt" , $subject);
            
        $sql = "INSERT INTO `contactus` (`firstname`, `lastname`, `email`, `mobile`, `country`, `subject`, `user_id`) VALUES ('$firstname', '$lastname', '$email', '$mobile', '$country', '$subject', '$userid')";
        $result = mysqli_query($conn,$sql);
        $showAlert = true;

        if($showAlert){
            echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your contact has been accomplished! Please wait for community to respond.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
        }
      }
    ?>

    <?php
      if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
        $userid = $_SESSION['userid'];
        $sql = "select * from users where id=$userid";
        $result = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_assoc($result)){
          $firstname = $row['firstname'];
          $lastname = $row['lastname'];
          $email = $row['username'];
        }
      }
      else{
        $firstname = 'Your name is..';
        $lastname = 'Your lastname is..';
        $email = 'Your email is..';
      }
    ?>

      <!--  
      </div>-->

    <?php

    echo'
        <div class="container alert alert-warning my-4">
          <div style="text-align:center">
            <h2>Contact Us</h2>
            <p>Swing by adding a question or comment, or leave us a message:</p>
          </div>
          <div class="row">
            <div class="column">
              <img class="my-4" src="images/map.jpg" style="width:100%">
              <img src="images/map.jpg" style="width:100%">
            </div> 
            <div class="column">
              <form action="http://localhost/iNotes/contact.php" method="POST">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="firstname" value="'.$firstname.'">
                
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lastname" value="'.$lastname.'">
              
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="'.$email.'">
                
                <label for="mobile">Mobile No.</label>
                <input type="text" id="mobile" name="mobile" placeholder="Your mobile no.." required>

                <label for="country">Country</label>
                <select id="country" name="country">
                  <option value="india">India</option>
                  <option value="australia">Australia</option>
                  <option value="usa">USA</option>
                  <option value="srilanka">Sri Lanka</option>
                </select>
                
                <label for="subject">Subject</label>
                <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px" required></textarea>
    ';
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
      echo '            
                <input class="btn btn-outline-success" type="submit" value="Submit">
      ';
    }
    else{
      echo '
                <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#loginModal" >You have to Login</button>
      ';
    }
    echo '
              </form>
            </div>
          </div>
        </div>
      ';
    ?>
    <?php include 'partial/footer.php'; ?>

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