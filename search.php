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
      #maincontainer{
          min-height: 633px;
      }
    </style>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <title>Welcome to iDiscuss - Coding forum</title>
  </head>
  <body>
    <?php include 'partial/header.php' ?>

    <!-- Connected to Database -->
    <?php include 'partial/_dbConnect.php'; ?>

    <!-- Search Result -->
    <div class="container my-3" id="maincontainer">
    
        <div class="search">
            <h1>Search results for <em>'<?php echo $_GET["search"]; ?>'</em></h1>
            <hr>
            <?php 
                $search = $_GET["search"];
                $sql = "SELECT * FROM `threads` where MATCH(thread_title,thread_desc) against ('$search')";
                $result = mysqli_query($conn, $sql);
                $noresult = true;
        
                while($row = mysqli_fetch_assoc($result)){
                    $noresult = false;
                    $title = $row['thread_title'];
                    $desc = $row['thread_desc'];
                    $id = $row['thread_id'];
                    $sql1 = "select * from users as a,threads as b where a.id=b.thread_user_id and b.thread_id=$id";
                    $result1 = mysqli_query($conn,$sql1);
                    while($row = mysqli_fetch_assoc($result1)){
                        $firstname = $row['firstname'];
                        $lastname = $row['lastname'];
                        $user = $firstname .' '. $lastname;
                    }
                
                    echo '
                        <div class="result">
                            <h4>
                                <a href="threadlist.php?threadid='.$id.'&user='.$user.'" class="text-dark">'.$title.'</a>
                            </h4>
                            <p>'.$desc.'</p>
                        </div>
                    ';
                }

                if($noresult){
                    echo '
                        <div class="alert alert-secondary">
                            <div class="container">
                                <p class="display-4">No Results Found!</p>
                                <p class="lead"> Suggestions:
                                    <ul>
                                    <li>Make sure that all words are spelled correctly.</li>
                                    <li>Try different keywords.</li>
                                    <li>Try more general keywords.</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    ';
                }
            ?>
            
            
            <!-- <div class="result">
                <h4>
                    <a href="#" class="text-dark">Cannot install Pyaudio</a>
                </h4>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus ab totam non eos, eaque eum accusamus obcaecati modi cum assumenda. Nostrum, quibusdam distinctio. Inventore necessitatibus tenetur amet ut ex aliquam iure laudantium ab, aspernatur cum recusandae quo nihil nisi, rerum quaerat odio facilis est ipsa suscipit quis libero nobis voluptate!</p>
            </div> -->

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