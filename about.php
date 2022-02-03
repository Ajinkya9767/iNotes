<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
    <style>
      #maincontainer{
          min-height: 633px;
      }
    </style>
    <title>Welcome to iDiscuss - Coding forum</title>
  </head>
  <body>
    <?php include 'partial/header.php' ?>
    
    <!-- Connected to Database -->
    <?php include 'partial/_dbConnect.php'; ?>

    <div class="container my-3" id="maincontainer">
      <div class="about-section">
        <h1>About Us Page</h1>
        <p>Some text about who we are and what we do.</p>
        <p>Resize the browser window to see that this page is responsive by the way.</p>
      </div>

      <h2 style="text-align:center">Our Team</h2>
      <div class="row">
      
      <?php
        $sql = "select * from team";
        $result = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_assoc($result)){
          $name = $row['name'];
          $email = $row['email'];
          $destinction = $row['destinction'];
          $dest_desc = $row['dest_desc'];
          $image = $row['image'];

          echo'
            <div class="column">
              <div class="card">
                <img src="images/'.$image.'" alt="Jane" style="width:100%">
                <div class="container">
                  <h2>'.$name.'</h2>
                  <p class="title">'.$destinction.'</p>
                  <p>'.substr($dest_desc,0,111).'...</p>
                  <p>'.$email.'</p>
                  <p><a class="button btn-outline-success" href="contact.php">Contact</a></p>
                </div>
              </div>
            </div>
          ';
        }
      ?>
        <!-- <div class="column">
          <div class="card">
            <img src="images/team1.jpg" alt="Jane" style="width:100%">
            <div class="container">
              <h2>Jane Doe</h2>
              <p class="title">CEO & Founder</p>
              <p>Some text that describes me lorem ipsum ipsum lorem.</p>
              <p>jane@example.com</p>
              <p><a class="button btn-outline-success" href="contact.php">Contact</a></p>
            </div>
          </div>
        </div>

        <div class="column">
          <div class="card">
            <img src="images/team2.jpg" alt="Mike" style="width:100%">
            <div class="container">
              <h2>Mike Ross</h2>
              <p class="title">Art Director</p>
              <p>Some text that describes me lorem ipsum ipsum lorem.</p>
              <p>mike@example.com</p>
              <p><a class="button btn-outline-success" href="contact.php">Contact</a></p>
            </div>
          </div>
        </div>

        <div class="column">
          <div class="card">
            <img src="images/team3.jpg" alt="John" style="width:100%">
            <div class="container">
              <h2>John Doe</h2>
              <p class="title">Designer</p>
              <p>Some text that describes me lorem ipsum ipsum lorem.</p>
              <p>john@example.com</p>
              <p><a class="button btn-outline-success" href="contact.php">Contact</a></p>
            </div>
          </div>
        </div>-->

      </div>
    </div> 

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