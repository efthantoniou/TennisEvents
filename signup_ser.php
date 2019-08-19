<?php
$uploaddir = "C:\\xampp\\htdocs\\dashboard\\pictures\\";
if( $_SERVER["REQUEST_METHOD"] == "POST"){
    if( !empty($_POST["username"]) && !empty($_POST["inputPassword"]) && !empty($_POST["inputPasswordRe"]) && !empty($_POST["f_name"]) && !empty($_POST["l_name"]) && !empty($_POST["inputEmail"]) && !empty($_POST["date_bi"]) && !empty($_POST["priority"]) && !empty($_POST["gender"])){
        require_once('connection.php');
        $username = test_input($_POST["username"]);
        $password = test_input($_POST["inputPassword"]);
        $password_re = test_input($_POST["inputPasswordRe"]);
        $f_name = test_input($_POST["f_name"]);
        $l_name = test_input($_POST["l_name"]);
        $email = test_input($_POST["inputEmail"]);
        $date  = $_POST["date_bi"];
        $gender = test_input($_POST["gender"]);
        $prio = test_input($_POST["priority"]);

        $query = "SELECT email,username FROM system_user WHERE email='$email' or username='$username'";
        $result_check = mysqli_query($link,$query);
        if(mysqli_num_rows($result_check) == 0){
            $filename = basename($_FILES['filename']['name']);
            $uploadfile = $uploaddir . $filename;
            if (move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile)) {
                echo "File is valid, and was successfully uploaded.\n";
            } 
            else {
                echo "Possible file upload attack!\n";
            }
            $salted = "q345afsthhq3456afspthd".$password."23auhieb3457wfgpgjhw547rfgh";
            $hashed = hash('sha512', $salted);
            $query1 = "INSERT INTO system_user (username,password_u,f_name,l_name,email,gender,date_bi,photo_path,priority) VALUES ('$username','$hashed','$f_name','$l_name','$email','$gender','$date','$uploadfile','$prio');";
            $result = mysqli_query($link,$query1);
            echo "Affected rows: " . mysqli_affected_rows($link);
            mysqli_close($link);
            header('Location: signin.php');
        }
        else{
            echo "Account already exists!!!";
            header('Location: signup.php');
        }
                
    }
    else{
        header('Location: signup.php');
    }
}
else{
    header('Location: signup.php');
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
