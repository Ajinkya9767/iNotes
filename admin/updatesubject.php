<?php
session_start();
include("../partial/_dbConnect.php");

if(isset($_POST['btn_update'])) {
    $subject_desc = $_POST['subjectDesc'];	
    $sub_category = $_POST['category'];

        $subject_id = $_GET['subid'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "update subjects set subject_desc='$subject_desc', sub_category='$sub_category' where subject_id='$subject_id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo '
                <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                <strong>Success!</strong> You updated user successfully!.
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
        $user_id = NULL;
        if(isset($_GET['subid'])){
            $subject_id = $_GET['subid'];

            $sql = "select * from subjects where subject_id='$subject_id'";
            $result = mysqli_query($conn, $sql);

            if($result){
                $row = mysqli_fetch_assoc($result);
                $subject_name = $row['subject_name'];
                $subject_desc = $row['subject_desc'];
                $sub_category = $row['sub_category'];
            }
        }
    ?>

    <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            <form action="" method="post" type="form" name="form">
                <div class="row">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h5 class="title">Update Subject Details</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Subject Name</label>
                                            <input type="text" id="subjectName" disabled name="subjectName" placeholder="<?php echo $subject_name; ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Subject Description</label>
                                            <textarea rows="4" cols="80" id="subjectDesc" required name="subjectDesc" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Subject Category</label>
                                            <select name="category" class="form-control">
                                                <option selected>Open this select menu</option>
                                                <option value="Theory">Theory</option>
                                                <option value="Lab">Lab</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card-footer">
                                        <button type="submit" id="btn_update" name="btn_update" required class="btn btn-fill btn-primary">Update Subject</button>
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