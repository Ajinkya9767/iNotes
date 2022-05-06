<?php
session_start();
  include("../partial/_dbConnect.php");  

  if(isset($_GET['subid'])) {
      $subject_id = $_GET['subid'];	

      $sql = "delete from subjects where Subject_id='$subject_id'";
      $result = mysqli_query($conn, $sql);
      
      if($result)
          echo '
              <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
              <strong>Success!</strong> You deleted subject successfully!.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          ';
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
    .abc {
      text-decoration: none;
    }
    #desc {
      min-height: 233px;
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
  <!-- End Navbar -->
  <div class="content">
    <div class="container-fluid">
      <div class="col-md-14">
        <div class="card ">
          <div class="card-header card-header-primary">
            <h4 class="card-title"> Subject List</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive ps">
              <table class="table table-hover tablesorter " id="">
                <thead class=" text-primary">
                  <tr>
                    <th>Subject ID</th>
                    <th>Subject Name</th>
                    <th>Subject Description</th>
                    <th>Subject Category</th>
                    <th>Activity</th>
                    <th>Activity</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    $sql = "select * from subjects";
                    $result = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_assoc($result)){
                        $subject_id = $row['subject_id'];
                        $subject_name = $row['subject_name'];
                        $subject_desc = $row['subject_desc'];
                        $sub_category = $row['sub_category'];
                        
                      echo'
                        <tr>
                          <td>
                            '.$no.'
                          </td>
                          <td>
                            '.$subject_name.'
                          </td>
                          <td>
                            '.$subject_desc.'
                          </td>
                          <td>
                            '.$sub_category.'
                          </td>
                          <td>
                          <a id="btn_update" name="btn_update" href="http://localhost/iNotes/admin/updatesubject.php?subid='.$subject_id.'" class="btn btn-primary">Update Subject</a>
                          </td>
                          <td>
                            <a id="btn_delete" name="btn_delete" href="http://localhost/iNotes/admin/managesubject.php?subid='.$subject_id.'" class="btn btn-primary">Delete Subject</a>
                          </td>
                        </tr>
                      ';
                      $no++;
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
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