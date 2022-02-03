<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        #ques{
            min-height: 227px;
        }
        .abc1{
            text-decoration: none;
            color: black;
        }
        .abc1 :hover{
            text-decoration: underline;
        }
    </style>
    <title>Welcome to iDiscuss - Coding forum</title>
  </head>
  <body>
    <?php include 'partial/header.php' ?>

    <!-- Connected to Database -->
    <?php include 'partial/_dbConnect.php'; ?>

    <?php
        $id = $_GET['threadid'];
        $sql = "select * from threads where thread_id=$id";
        $result = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_assoc($result)){
            $threadname = $row['thread_title'];
            $threaddesc = $row['thread_desc'];
        }
    ?>

    <?php
        if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
            $user = $_SESSION['firstname'].' '.$_SESSION['lastname'];
        }
        else{
            $user = "Anonymous User";
        }

        $showAlert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'POST'){
            //Insert thread into Database
            $cmt_content = $_POST['comment'];
            $cmt_content = str_replace("<" , "&lt" , $cmt_content);
            $cmt_content = str_replace(">" , "&gt" , $cmt_content);
            
            $sql = "insert into comments (comment_content,thread_id,comment_by) values ('$cmt_content','$id','$user')";
            $result = mysqli_query($conn,$sql);
            $showAlert = true;

            if($showAlert){
                echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your Comment has been added!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ';
            }
        }
    ?>

    <div class="container my-4">
        <div class="alert alert-info" role="alert">
            <h4 class="display-4"><?php echo $threadname ?></h4>
            <p ><?php echo $threaddesc ?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum. No spam / Advertising / Self-promote in the forums is not allowed. Do not post copyright-infringing material. Do not post "offensive" posts, links or images. Do not cross post questions. Remain respectful of other members at all times.</p>
            <p>Posted by: 
                <b>
                    <?php
                        if(isset($_GET['user'])){
                            $user = $_GET['user'];
                            echo $user;

                        }
                        else{
                            echo "Anonymous User";
                        }
                    ?>
                </b>
            </p>
        </div>
    </div>
    
    <?php
        if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
            $threadid = $_GET['threadid'];
            $user = $_GET['user'];
            echo '
                <div class="container alert alert-warning">
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Post a Comment
                    </a>
                    <div class="collapse" id="collapseExample">
                    <h1 class="my-4">Add Your Comment</h1>
                    <form action="threadlist.php?threadid='.$threadid.'&user='.$user.'" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Type your comment</label>
                            <textarea class="form-control" name="comment" id="comment" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Post Comment</button>
                    </form>
                    </div>
                </div>
            ';
        }
        else{
            echo'
                <div class="container alert alert-warning">
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Post a Comment
                    </a>
                </div>
            ';
        }     
    ?>
    
    <!-- category contain starts here -->
    <div class="container my-3 mb-5" id="ques">
        <h1>Discussion</h1>
        <hr>
        <?php
            $id = $_GET['threadid'];
            $sql = "select * from comments where thread_id=$id";
            $result = mysqli_query($conn,$sql);
            $noresult = true;

            while($row = mysqli_fetch_assoc($result)){
                $noresult = false;
                $cmt_id = $row['comment_id'];
                $content = $row['comment_content'];
                $date = $row['comment_time'];
                $user = $row['comment_by'];

                echo '
                    <div class="d-flex my-3">
                    <div class="flex-shrink-0">
                        <img src="images/user.png" width="54px" alt="...">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <p class="font-weight-bold my-0"><b>'.$user.' at '.$date.'</b></p>
                        '.$content.'
                    </div>
                    </div>
                ';
            }
            if($noresult){
                echo '
                    <div class="alert alert-secondary">
                        <div class="container">
                            <p class="display-4">No Comments Found!</p>
                            <p class="lead">Be the first person to add a comment.</p>
                        </div>
                    </div>
                ';
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