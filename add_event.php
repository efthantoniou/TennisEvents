<?php
    session_start();
    if(!isset($_SESSION['priority'])){//vale !
        $temp="admin";
    //if( strncmp($_SESSION['priority'],$temp,strlen($temp)) )
      //  header('Location: tennis_events.php');
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

    <!-- Custom styles for this template -->
    <link href="css\signin.css" rel="stylesheet">
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
                    echo '  <a class="nav-link active" href="add_event.php">Add</a>';
                    echo '  <a class="nav-link" href="edit.php">Edit</a>';
                    echo '  <a class="nav-link" href="remove.php">Remove</a>';
                    echo '</nav>';
                    
                }
            ?>
            <form class="form-signin" action="add_event_ser.php" method="POST">
                <input id="date" name="date_s" type="date" required>
                <input id="date2" name="date_e" type="date" required>
                <select name="type" size="1" class="form-control" required>
                    <option value="tour">Tournament</option>
                    <option value="knock">Knock-out</option>
                </select>
                <select name="gender" size="1" class="form-control" required>
                    <option value="female">Female</option>
                    <option value="male">Male</option>
                </select>
                <select name="age_re" size="1" class="form-control" required>
                    <option value="under">Underage</option>
                    <option value="over">Over</option>
                </select>
                <input type="number" value="1" name="sets" min="1" max="3" placeholder="sets" required>
                <?php
                    require('connection.php');
                    $query = "select f_name,l_name,user_id from system_user where priority='back'";
                    $result = mysqli_query($link,$query);
                    $id_temp = $_SESSION['id'];
                    echo '<select name="backoff" size="1" class="form-control" required>';
                    echo "<option value='$id_temp'>-</option>";
                    while($row = mysqli_fetch_row($result)){
                        $name = $row[0] . " " . $row[1];
                        echo "<option value='$row[2]'>$name</option>";
                    }
                    echo '</select>';
                    mysqli_close($link);
                ?>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Add Event</button>
            </form>
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
