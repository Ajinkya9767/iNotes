<?php
  echo '
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand">iNotes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="http://localhost/iNotes/home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="http://localhost/iNotes/about.php">About</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categories
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
  ';
?>

<?php
  include '_dbConnect.php';
  $sql = "select * from subjects order by (subject_name)";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
    echo '
            <li><a class="dropdown-item" href="threads.php?subid=' . $row['subject_id'] . '&subcat='.$row['sub_category'].'"><b>' . $row['subject_name'] . '</b></a></li>
    ';
  }
?>

<style>
  .abc{
    cursor: pointer;
  }
</style>

<?php
  echo '
                <!-- <li><a class="dropdown-item" href="#">Another action</a></li> -->
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="http://localhost/iNotes/contact.php">Contact</a>
            </li>
          </ul>
  ';
          
        if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
          echo '
            <form class="d-flex my-lg-0" action="#">
              <input class="form-control me-1" name="search" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-success" type="submit">Search</button>
              <img class="abc mx-2" src="images/user4.png" width="40px" alt="...">
              <p class="text-light my-2 mx-0">'.$_SESSION['firstname'].'</p>
              <div class="mx-2">
                <a href="http://localhost/iNotes/partial/_logout.php" class="btn btn-outline-success">Logout</a>
              </div>
            </form>
          ';
        }
        else{
          echo '
            <form class="d-flex" action="search.php" method="GET">
              <input class="form-control me-1" name="search" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-success" type="submit">Search</button>
            </form>
          ';
        }

  echo '
        </div>
      </div>
    </nav>
  ';

  $userid = null;
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
  if(isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "true"){
    $userid = $_SESSION['userid'];
    echo '
      <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Success!</strong> You have successfully logged In!
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