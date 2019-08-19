<?php
    session_start();
    if(isset($_SESSION['username'])){
        header('Location: index.php');
    }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Efthimios Antoniou">

    <title>Sign Up</title>

    <!-- Bootstrap core CDN CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

    <!-- Custom styles for this template -->
    <link href="css\signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead">
            <div class="inner">
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link" href="index.php">Home</a>
                    <a class="nav-link" href="tennis_events.php">Tennis Events</a>
                    <a class="nav-link" href="top5.php">Top 5</a>
                    <a class="nav-link" href="signin.php">Sign In</a>
                    <a class="nav-link active" href="signup.php">Sign Up</a>
                </nav>
            </div>
        </header>

        <main role="main" class="inner cover">
            <form class="form-signin" action="signup_ser.php" method="POST" enctype="multipart/form-data">
                <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
                <label for="username" class="sr-only">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPasswordRe" class="sr-only">Password</label>
                <input type="password" name="inputPasswordRe" id="inputPasswordRe" class="form-control" placeholder="Confirm Password" required>
                <label for="f_name" class="sr-only">Fisrt Name</label>
                <input type="text" name="f_name" id="f_name" class="form-control" placeholder="First Name" required>
                <label for="l_name" class="sr-only">Last Name</label>
                <input type="text" name="l_name" id="l_name" class="form-control" placeholder="Last Name" required>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email address" required>
                <select name="gender" size="1" class="form-control" required>
                    <option value="female">Female</option>
                    <option value="male">Male</option>
                </select>
                <select name="priority" size="1" class="form-control" required>
                    <option value="admin">Adminstrator</option>
                    <option value="back">Backoffice</option>
                    <option value="player">Tennis Player</option>
                </select>
                <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                <div class="custom-file">
                    <input type="file" name="filename" id="customFile" class="custom-file-input">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <input id="date_bi" name="date_bi" id="date_bi" type="date"><br>
                <button class="btn btn-lg btn-primary " type="submit">Sign Up</button>
                <button class="btn btn-lg btn-danger" type="reset">Reset</button>
                <a href="signin.php">
                    <h5>Already a user?</h5>
                </a>
            </form>
            <script>
                //allazei to onoma sto file field.
                // Add the following code if you want the name of the file appear on select
                $(".custom-file-input").on("change", function() {
                    var fileName = $(this).val().split("\\").pop();
                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });
            </script>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/core.js"></script>

</body>

</html>
