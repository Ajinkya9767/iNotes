<?php
  session_start();
  if(!$_SESSION['loggedIn'] && $_SESSION['loggedIn'] != true){
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        #ques {
            min-height: 378px;
        }

        .abc1 {
            text-decoration: none;
            color: black;
        }

        .abc1 :hover {
            text-decoration: underline;
        }
        body{
            background-color: #1a2035;
            color: white;
        }
    </style>
    <title>Welcome to iDiscuss - Coding forum</title>
</head>

<body>
    <?php include 'partial/header.php' ?>

    <!-- Connected to Database -->
    <?php include 'partial/_dbConnect.php'; ?>

    <?php
        $subject_id = $_GET['subid'];
        $sql = "select * from subjects where subject_id=$subject_id";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $subject_name = $row['subject_name'];
            $subject_desc = $row['subject_desc'];
            $sub_category = $row['sub_category'];
        }
    ?>

    <?php
        if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
            $userid = $_SESSION['userid'];
        }
    ?>
    <div class="container my-4">
        <div class="alert alert-info" role="alert">
            <h4 class="display-4 text-center"><?php echo $subject_name ?></h4>
            <p><?php echo $subject_desc ?></p>

        </div>
    </div>
    
    <div class="container px-6">
        <?php
            if(isset($_GET['unitid'])){
                $unit_id = $_GET['unitid'];
                $sql = "select * from units where unit_id='$unit_id'";
                $result = mysqli_query($conn, $sql);

                $row = mysqli_fetch_assoc($result);
                $file_cat_name = $row['unit_name'];
                echo '<h3 class="text-center">'.$file_cat_name.'</h3>';
            }
            if(isset($_GET['assignmentid'])){
                $assignment_id = $_GET['assignmentid'];
                $sql = "select * from assignments where assignment_id='$assignment_id'";
                $result = mysqli_query($conn, $sql);

                $row = mysqli_fetch_assoc($result);
                $file_cat_name = $row['assignment_name'];
                echo '<h3 class="text-center">'.$file_cat_name.'</h3>';
            }
        ?>
        <hr>
    </div>

    <style>
        .container .table th,td{
            text-align: center;
        }
        #coln{
            width: 10%;
        }
    </style>

    <?php
        $sql = "select * from files where file_cat_name='$file_cat_name'";
        $result = mysqli_query($conn, $sql);
        $numofRows = mysqli_num_rows($result);

        if($numofRows == 0){
            echo'
                <div class="container alert-warning">
                    <h2>No Document Found!!</h2>
                    <br>
                    <h4>
                        Documents are not uploaded yet!
                        <br>
                        You can wait until admin upload any file.
                    </h4>
                </div>
            ';
        }
        else{
            echo'
                <div class="container px-5" id="ques">
                    <table class="table table-bordered table-warning">
                        <tr>
                            <th scope="col" id="coln">
                                Sr No.
                            </th>
                            <th>
                                Filename
                            </th>
                            <th>
                                File Category
                            </th>
                            <th>
                                Download
                            </th>
                        </tr>
                    <tbody>
                    ';
                            $sql = "select * from files where file_cat_name='$file_cat_name'";
                            $result = mysqli_query($conn, $sql);
        
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $file_id = $row['file_id'];
                                $file_name = $row['file_name'];
                                $file_category = $row['file_category'];
                                echo '
                                    <tr>
                                        <td>
                                            '.$i.'
                                        </td>
                                        <td>
                                            ' . $file_name . '
                                        </td>
                                        <td>
                                            ' . $file_category . '
                                        </td>
                                        <td>
                                            <a href="filedownload.php?file='.$file_name.'"><i class="fa fa-download"></i></a>
                                        </td>
                                    </tr>   
                                ';
                                $i++;
                            }
                            echo '
                        </tbody>
                    </table>
                </div>
            ';
        }
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