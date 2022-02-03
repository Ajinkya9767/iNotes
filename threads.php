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
            min-height: 195px;
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
        $id = $_GET['catid'];
        $sql = "select * from categories where category_id=$id";
        $result = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_assoc($result)){
            $catname = $row['category_name'];
            $catdesc = $row['category_description'];
        }
    ?>

    <?php
        if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
            $userid = $_SESSION['userid'];
        }
        $showAlert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'POST'){
            //Insert thread into Database
            $th_title = $_POST['title'];
            $th_desc = $_POST['desc'];
            $th_cat_id = $id;

            $th_title = str_replace("<" , "&lt" , $th_title);
            $th_title = str_replace(">" , "&gt" , $th_title);
            $th_desc = str_replace("<" , "&lt" , $th_desc);
            $th_desc = str_replace(">" , "&gt" , $th_desc);
            
            $sql = "insert into threads (thread_title,thread_desc,thread_cat_id,thread_user_id) values ('$th_title','$th_desc','$th_cat_id','$userid')";
            $result = mysqli_query($conn,$sql);
            $showAlert = true;

            if($showAlert){
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
            <h4 class="display-4">Welcome to <?php echo $catname ?> forums</h4>
            <p ><?php echo $catdesc ?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum. No spam / Advertising / Self-promote in the forums is not allowed. Do not post copyright-infringing material. Do not post "offensive" posts, links or images. Do not cross post questions. Remain respectful of other members at all times.</p>
            <a href="#" class="btn btn-success btn-lg">Learn more</a>
        </div>
    </div>
    
    <?php
        if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
            $catid = $_GET['catid'];
            echo '
                <div class="container alert alert-warning">
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Ask a question
                    </a>
                    <div class="collapse" id="collapseExample">
                    <h1 class="my-4">Ask a Question</h1>
                    <form method="POST" action="http://localhost/php_tutorial/Forum/threads.php?catid='.$catid.'" ?>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Thread Title</label>
                            <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" required>
                            <div id="emailHelp" class="form-text">Keep your title as short as crisp possible.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Ellaborate your Concern</label>
                            <textarea class="form-control" name="desc" id="desc" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                </div>
            ';
        }
        else{
            echo'
                <div class="container alert alert-warning">
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Ask a question
                    </a>
                </div>
            ';
        }     
    ?>

    <!-- category contain starts here -->
    <div class="container my-3" id="ques">
        <h1>Browse Questions</h1>
        <hr>
        <?php
            $id = $_GET['catid'];
            $sql = "select * from users as a,threads as b where a.id=b.thread_user_id and b.thread_cat_id=$id";
            $result = mysqli_query($conn,$sql);
            $noresult = true;

            while($row = mysqli_fetch_assoc($result)){
                $noresult = false;
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $user = $firstname .' '. $lastname;
                $threadname = $row['thread_title'];
                $threaddesc = $row['thread_desc'];
                $threadid = $row['thread_id'];
                $date = $row['thread_time'];
                echo '
                    <div class="d-flex my-3">
                    <div class="flex-shrink-0">
                        <img src="images/user.png" width="54px" alt="...">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="mt-0"><a class="abc1" href="threadlist.php?threadid='.$threadid.'&user='.$user.'">'.$threadname.'</a></h5>
                        '.$threaddesc.'
                    </div>
                    <p class="font-weight-bold my-0">Asked by: <b>'.$firstname.' '.$lastname.'</b> at <b>'.$date.'</b></p>
                    </div>
                ';
            }
            
            if($noresult){
                echo '
                    <div class="alert alert-secondary">
                        <div class="container">
                            <p class="display-4">No Threads Found!</p>
                            <p class="lead">Be the first person to ask a question.</p>
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