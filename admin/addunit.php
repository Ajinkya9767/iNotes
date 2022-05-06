<?php
session_start();
include("../partial/_dbConnect.php");


if(isset($_POST['btn_save'])) {
    $unit_name = $_POST['unitName'];
    $unit_desc = $_POST['unitDesc'];
    $unit_sub = $_POST['subject'];	

    $sql0 = "select subject_id from subjects where subject_name='$unit_sub'";
    $result0 = mysqli_query($conn, $sql0);
    $row = mysqli_fetch_assoc($result0);
    $unit_sub_id = $row['subject_id'];

    $sql = "insert into units (unit_name, unit_desc, unit_sub_id) values ('$unit_name', '$unit_desc', '$unit_sub_id')";
    $result = mysqli_query($conn, $sql);
    
    if($result)
        echo '
            <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Success!</strong> You added unit successfully!.
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

      <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            <form action="" method="post" type="form" name="form">
                <div class="row">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h5 class="title">Add Unit</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Unit Title</label>
                                            <input type="text" id="unitName" required name="unitName" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Unit Description</label>
                                            <textarea rows="4" cols="80" id="unitDesc" required name="unitDesc" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <select name="subject" class="form-control">
                                                <option selected>Open this select menu</option>
                                                <?php
                                                    $sql = "select subject_name from subjects where sub_category='Theory' order by (subject_name)";
                                                    $result = mysqli_query($conn, $sql);

                                                    while($row = mysqli_fetch_assoc($result)){
                                                        $subject = $row['subject_name'];
                                                        echo'
                                                            <option value="'.$subject.'">'.$subject.'</option>
                                                        ';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card-footer">
                                        <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Add Unit</button>
                                    </div>
                                <div class="row">
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