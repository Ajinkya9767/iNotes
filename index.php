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
    </style>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <title>Welcome to iDiscuss - Coding forum</title>
  </head>
  <body>
    <?php include 'partial/header.php' ?>

    <!-- slider -->
    <?php include 'partial/carousel.php'; ?>

    <!-- Connected to Database -->
    <?php include 'partial/_dbConnect.php'; ?>

    <!-- category contain starts here -->
    <div class="container my-3" id="desc">
      <h2 class="text-center my-3">iDiscuss - Browse Categories</h2>
      <div class="row">

      <!-- Fetch all the categories -->
      <?php
        $sql = "select * from categories";
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
                  <h5 class="card-title"><a class="abc" href="threads.php?catid='.$row['category_id'].'"> '.$row['category_name'].'</a></h5>
                  <p class="card-text">'.substr($row['category_description'],0,90).'...</p>
                  <a href="threads.php?catid='.$row['category_id'].'" class="btn btn-primary">View Threads</a>
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