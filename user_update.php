<?php
    session_start();

    $id = $_SESSION['id'];
    $password = test_input($_POST['password']);
    $new = test_input($_POST['new']);
    $salted = "q345afsthhq3456afspthd".$password."23auhieb3457wfgpgjhw547rfgh";
    $new_salted = "q345afsthhq3456afspthd".$new."23auhieb3457wfgpgjhw547rfgh";
    $hashed = hash('sha512', $salted);// CHAR(128) mhn ksexaseis
    $hashed_new = hash('sha512', $new_salted);
    
    require_once('connection.php');
    $query = "select f_name from system_user where user_id='$id' and password_u='$hashed'";
    $result = mysqli_query($link,$query);

    if(mysqli_num_rows($result) == 1){
        $query = "update system_user set password_u='$hashed_new' where user_id='$id'";
        mysqli_query($link,$query);
    }
        
        
    mysqli_close($link);
    header('Location: index.php');

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>