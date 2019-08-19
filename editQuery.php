<?php
    session_start();
    
    $sneaky = $_POST['sneaky'];
    

    require_once('connection.php');
    if(!empty($_POST['date_e'])){
        $date_e = $_POST['date_e'];
        $query = "update system_event set e_date='$date_e' where event_id='$sneaky'";
        mysqli_query($link, $query);
    }

    if(!empty($_POST['sets'])){
        $sets = $_POST['sets'];
        $query = "update system_event set sets='$sets' where event_id='$sneaky'";
        mysqli_query($link, $query);
    }
    
    if(!empty($_POST['type'])){
        $type = $_POST['type'];
        $query = "update system_event set type='$type' where event_id='$sneaky'";
        mysqli_query($link, $query);
    }
    
    header('Location: edit.php');
    mysqli_close($link);
?>