<?php
  session_start();
  if($_SESSION['loggedIn'] != true){
    header("location : http://localhost/iNotes/index.php");
    exit();
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
    <style>
      .abc{
          text-decoration: none;
      }
      #desc{
          min-height: 233px;
      }
      body{
        background-color: #1a2035;
        color: white;
      }
      .card-text{
        color: black;
      }
      .row{
        padding-left: 90px;
      }
    </style>
    <title>Welcome to iNotes</title>
  </head>
  <body class="dark-edition">
    <?php include 'partial/header.php' ?>

    <!-- slider -->
    <?php include 'partial/carousel.php'; ?>

    <!-- Connected to Database -->
    <?php include 'partial/_dbConnect.php'; ?>

    <!-- category contain starts here -->
    <div class="container my-3" id="desc">
      <h2 class="text-center my-3">iNotes - Browse Subjects</h2>
      <hr>
      <div class="row">

      <!-- Fetch all the categories -->
      <?php
        $sql = "select * from subjects order by (subject_name)";
        $result = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_assoc($result)){
          // echo $row['category_id'];
          // echo $row['category_name'];
          // echo '<br>';
          echo'
            <!-- use a for loop to iterate through categories -->
            <div class="col-md-4">
              <div class="card my-2" style="width: 18rem;">
              <img src="https://media.istockphoto.com/photos/code-programming-for-website-editors-view-picture-id1290492381?b=1&k=20&m=1290492381&s=170667a&w=0&h=NQSXJKhncCP1GLzDkD8KPZsCOh1wldDj5RZbPVJztxQ=" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><a class="abc" href="threads.php?subid='.$row['subject_id'].'&subcat='.$row['sub_category'].'"> '.$row['subject_name'].'</a></h5>
                  <p class="card-text">'.substr($row['subject_desc'],0,90).'...</p>
                  <a href="threads.php?subid='.$row['subject_id'].'&subcat='.$row['sub_category'].'" class="btn btn-primary">View Subject/Lab</a>
                </div>
              </div>
            </div>
          ';
        }
      ?>

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