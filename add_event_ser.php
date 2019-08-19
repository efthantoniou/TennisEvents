<?php
    session_start();
    if( $_SERVER["REQUEST_METHOD"] == "POST"){
        if(!empty($_POST['date_s']) && !empty($_POST['date_e']) && !empty($_POST['type']) && !empty($_POST['gender']) && !empty($_POST['age_re']) && !empty($_POST['sets']) && !empty($_POST['backoff'])){
            require_once('connection.php');
            $date_s = $_POST['date_s'];
            $date_e = $_POST['date_e'];
            $type = $_POST['type'];
            $gender = $_POST['gender'];
            $age_re = $_POST['age_re'];
            $sets = $_POST['sets'];
            $back = $_POST['backoff'];
            $org_id = $_SESSION['id'];
            $query = "insert into system_event(s_date,e_date,organizer,backoffice,type,age_re,sets,gender) values ('$date_s','$date_e','$org_id','$back','$type','$age_re','$sets','$gender')";
            $result = mysqli_query($link, $query);    
            mysqli_close($link);
            header('Location: tennis_events.php');
        }
        else
            header('Location: tennis_events.php');
    }
    else
        header('Location: tennis_events.php');
            
?>