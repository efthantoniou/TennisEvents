<?php
    session_start();
    $id = $_SESSION['id'];
    $page = $_REQUEST['page'];
    require_once('connection.php');

    $query2 = "SELECT f_name,l_name FROM system_user where user_id='$id'";
    $result2 = mysqli_query($link, $query2);
    $row2 = mysqli_fetch_row($result2);
    
    $offset = ((int)$page-1)*5;
    $query = "SELECT event_id,s_date,e_date,organizer,type,gender,age_re FROM system_event where organizer='$id' limit 5 offset $offset"; //offset $offset
    $result = mysqli_query($link, $query);
    while($row = mysqli_fetch_row($result)){
        echo "<div name='$row[0]' class='border border-primary' onclick='deleteThis(this)'>";
        echo "$row2[0] $row2[1]<br>";
        echo "$row[1] ";
        echo "$row[2] ";
        echo "$row[3] <br>";
        echo "</div>";
    }
    mysqli_close($link);
?>