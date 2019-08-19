<?php
    session_start();
    if(!isset($_SESSION['priority'])){//vale !
        $temp="admin";
        if( strncmp($_SESSION['priority'],$temp,strlen($temp)) )
            header('Location: tennis_events.php');
    }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Efthimios Antoniou">

    <title>Home</title>

    <!-- Bootstrap core CDN CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    
    <script src="javascript/pagination_rev.js"></script>
    <script src="javascript/removeSelected.js"></script>
    <!-- Custom styles for this template -->
    <link href="css\cover.css" rel="stylesheet">
</head>

<body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead">
            <div class="inner">
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link" href="index.php">Home</a>
                    <a class="nav-link active" href="tennis_events.php">Tennis Events</a>
                    <a class="nav-link" href="top5.php">Top 5</a>
                    <?php
                        if(!isset($_SESSION['username']) ){
                            echo '<a class="nav-link" href="signin.php">Sign In</a>';
                            echo '<a class="nav-link" href="signup.php">Sign Up</a>';
                        }
                        else{
                            echo "<a class='nav-link' href='user.php' >".$_SESSION['username']."</a>"; //.$_SESSION['username']
                            echo '<a class="nav-link" href="signout.php">Logout</a>';
                        }
                    ?>
                </nav>
            </div>
        </header>

        <main role="main" class="inner cover">
            <?php     
                if(isset($_SESSION['username']) && $_SESSION['priority'] === "admin"){
                    echo '<nav class="nav nav-masthead justify-content-center">';
                    echo '  <a class="nav-link" href="add_event.php">Add</a>';
                    echo '  <a class="nav-link" href="edit.php">Edit</a>';
                    echo '  <a class="nav-link active" href="remove.php">Remove</a>';
                    echo '</nav>';
                }
                echo '<div id="events">';
                echo '<button name="1" class="btn btn-lg btn-primary" onclick="previousPage(this.name)">Show</button>';
                echo '</div>'; 
            ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a href="#" class="page-link" name="1" id="previous" onclick="previousPage(this.name)">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link" name="1" id="next" onclick="nextPage(this.name)">Next</a></li>
                </ul>
            </nav>
        </main>

        <footer class="mastfoot mt-auto">
            <div class="inner">
                <p>Εργασία για το μάθημα σχεδίαση εφαρμογών και υπηρεσιών διαδικτύου.<br>Αριστείδης Μουζακίτης<br>Ευθύμιος Αντωνίου<br>Παναγιώτης Διαμαντόπουλος .</p>
            </div>
        </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>

</html>
