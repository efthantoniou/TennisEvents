<?php
    session_start();
    $snuck = $_POST['snuck'];
    $score = $_POST['score'];
    $winner = $_POST['winner'];
    require_once('connection.php');
    
    if(!empty($score) && !empty($winner) && !empty($snuck)){
        $query = "insert into game(score,winner) values '$score','$winner' where game_id='$snuck'";
        mysqli_query($link,$query);
    }
mysqli_close($link);
?>