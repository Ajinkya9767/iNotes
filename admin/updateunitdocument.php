<?php
session_start();
include("../partial/_dbConnect.php");

if(isset($_GET['unitid']) && isset($_GET['subid'])){
  $unit_id = $_GET['unitid'];
  $unit_sub_id = $_GET['subid'];

  $sql1 = "select unit_name from units where unit_id='$unit_id'";
  $result1 = mysqli_query($conn, $sql1);

  $row1 = mysqli_fetch_assoc($result1);
  $unit_name = $row1['unit_name'];
  
  $sql = "select subject_name,sub_category from subjects where subject_id='$unit_sub_id'";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_assoc($result);
  $subject_name = $row['subject_name'];
  $subject_category = $row['sub_category'];
  if($subject_category == 'Theory'){
    $sub_category = 'Unit';
  }
  else{
    $sub_category = 'Assignment';
  }
}

if(isset($_POST['btn_save']))
{
    $filename = $_FILES['file']['name'];
    $fileTempName = $_FILES['file']['tmp_name'];
    $path = "files/".$filename;

    $sql = "insert into files (file_name, file_category, file_cat_name, file_sub) values ('$filename', '$sub_category', '$unit_name', '$subject_name')";
    $result = mysqli_query($conn, $sql);
    
    if($result){
      move_uploaded_file($fileTempName,$path);
        echo '
            <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Success!</strong> You uploaded file successfully!.
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
        if(isset($_GET['fileid'])){
            $file_id = $_GET['fileid'];

            $sql = "select * from files where file_id='$file_id'";
            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($result);
            $file_name = $row['file_name'];
            $file
        }
    ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          
                
         <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Update Document</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    <div class="col-md-4">
                      <div class="">
                        <label for="">Choose File</label>
                        <input type="file" name="file" disabled value="" class="btn btn-fill btn-success" id="file" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <label>File Category</label>
                          <input type="text" id="category" name="category" value="<?php echo $sub_category; ?>" disabled class="form-control" >
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>File Category Name</label>
                        <input type="text" id="categoryName" name="categoryName" value="<?php echo $unit_name; ?>" disabled class="form-control" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Subject</label>
                        <input type="text" id="subject" name="subject" value="<?php echo $subject_name; ?>" disabled class="form-control" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="card-footer">
                        <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Upload file</button>
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