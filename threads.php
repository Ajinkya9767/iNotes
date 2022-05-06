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
    <style>
        #ques {
            min-height: 195px;
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
    $id = $_GET['subid'];
    $sql = "select * from subjects where subject_id=$id";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['subject_name'];
        $catdesc = $row['subject_desc'];
    }
    ?>

    <?php
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
        $userid = $_SESSION['userid'];
    }
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        //Insert thread into Database
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];
        $th_cat_id = $id;

        $th_title = str_replace("<", "&lt", $th_title);
        $th_title = str_replace(">", "&gt", $th_title);
        $th_desc = str_replace("<", "&lt", $th_desc);
        $th_desc = str_replace(">", "&gt", $th_desc);

        $sql = "insert into threads (thread_title,thread_desc,thread_cat_id,thread_user_id) values ('$th_title','$th_desc','$th_cat_id','$userid')";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;

        if ($showAlert) {
            echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your thread has been added! Please wait for community to respond.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ';
        }
    }
    ?>

    <div class="container my-4">
        <div class="alert alert-info" role="alert">
            <h4 class="display-4 text-center"><?php echo $catname ?></h4>
            <p><?php echo $catdesc ?></p>

        </div>
    </div>

    <div class="container px-6">
        <?php
            $sub_cat = $_GET['subcat'];
            if ($sub_cat == 'Theory')
                echo '<h3 class="text-center">Units</h3>';
            else
                echo '<h3 class="text-center">Assignments</h3>';
        ?>
        <hr>
    </div>

    <div class="container px-5">
        <?php
            if ($sub_cat == 'Theory') {
                $sql = "select * from units where unit_sub_id='$id'";
                $result = mysqli_query($conn, $sql);

                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    $unit_id = $row['unit_id'];
                    $unit_name = $row['unit_name'];
                    $unit_desc = $row['unit_desc'];

                    echo '
                        <table class="table table-bordered table-warning">
                            <tr>
                                <th scope="col">
                                    Unit ' . $no . ': ' . $unit_name . ' 
                                </th>
                            </tr>
                            <tbody>
                                <tr>
                                    <td>
                                        ' . $unit_desc . '
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="threadlist.php?unitid=' . $unit_id . '&subid=' . $id . '" class="btn btn-primary">View Documents</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        ';
                    $no++;
                }
            }
            if ($sub_cat == 'Lab') {
                $sql = "select * from assignments where assignment_sub_id='$id'";
                $result = mysqli_query($conn, $sql);

                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    $assignment_id = $row['assignment_id'];
                    $assignment_name = $row['assignment_name'];

                    echo '
                        <table class="table table-bordered table-warning">
                            <tr>
                                <th scope="col">
                                    Assignment No. ' . $no . '
                                </th>
                            </tr>
                            <tbody>
                                <tr>
                                    <td>
                                        ' . $assignment_name . '
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="threadlist.php?assignmentid=' . $assignment_id . '&subid=' . $id . '" class="btn btn-primary">View Documents</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        ';
                    $no++;
                }
            }
        ?>
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