<?php

    session_start();
    $id = $_SESSION['id'];
    $del = (int)$_REQUEST['id'];
    require_once('connection.php');

    $query = "delete from system_event where event_id='$del' and organizer='$id'"; //offset $offset
    $result = mysqli_query($link, $query);
mysqli_close($link);
?>