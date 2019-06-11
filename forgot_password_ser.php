<?php
    session_start();
    if( $_SERVER["REQUEST_METHOD"] == "POST"){
        if(!empty($_POST['email'])){
            $recovery = "Your password is: ".gen_paswd(10);
            mail($_POST['email']),"Password Recovery",$recovery);
            header('Location: signin.php');
        }

        
function gen_paswd($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
    $paswd = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $paswd []= $keyspace[random_int(0, $max)];
    }
    return implode('', $paswd);
}
?>