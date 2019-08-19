<?php
    session_start();
    $page = $_REQUEST["p"];
    require_once('connection.php');
    
    $offset = ((int)$page-1)*5;
    $query2 = "SELECT user_id,f_name,l_name FROM system_user";
    $result2 = mysqli_query($link, $query2);
    $row2 = mysqli_fetch_row($result2);
   
    $query = "SELECT event_id,s_date,e_date,organizer,type,gender,age_re FROM system_event where organizer='$row2[0]' limit 5 offset $offset"; //offset $offset
    $result = mysqli_query($link, $query);
    while($row = mysqli_fetch_row($result)){
        echo "<div name='$row[0]' class='border border-primary'>";
        echo "$row2[1] $row2[2]<br>";
        echo "$row[1] ";
        echo "$row[2] ";
        echo "$row[3] <br>";
        echo "</div>";
    }
mysqli_close($link);
?>
