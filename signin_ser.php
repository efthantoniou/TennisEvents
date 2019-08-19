<?php
    session_start();
    if( $_SERVER["REQUEST_METHOD"] == "POST"){
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            require_once('connection.php');
            $email = test_input($_POST['email']);
            $password = test_input($_POST['password']);
            $salted = "q345afsthhq3456afspthd".$password."23auhieb3457wfgpgjhw547rfgh";
            $hashed = hash('sha512', $salted);// CHAR(128) mhn ksexaseis
            $query = "SELECT username,priority,user_id FROM system_user WHERE email='$email' AND password_u='$hashed';";
            $result = mysqli_query($link,$query);

            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_row($result);
                $_SESSION['username'] = $row[0];
                $_SESSION['priority'] = $row[1];
                $_SESSION['id'] = $row[2];
                mysqli_close($link);
                header('Location: index.php');
            }
            else{
                mysqli_close($link);
                header('Location: signin.php');
            }
        }
        else{
            header('Location: signin.php');
        }
    }
    else{
        header('Location: signin.php');
    }
    
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>