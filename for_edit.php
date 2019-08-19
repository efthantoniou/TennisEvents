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
        echo "<div name='$row[0]' class='border border-primary'>";
        echo "$row2[0] $row2[1]<br>";
        echo "$row[1] ";
        echo "$row[2] ";
        echo "$row[3] <br>";
        echo "<button class='btn btn-primary' type='button' data-toggle='collapse' data-target='#$row[0]' aria-expanded='false' aria-controls='collapseExample'>Edit</button>";
        echo "<div class='collapse' id='$row[0]'>
                <div class='card card-body'>
                    <form class='form-signin' action='editQuery.php' method='POST'>
                        <input id='date2' name='date_e' type='date'>
                        <input type='number' value='1' name='sets' min='1' max='3' placeholder='sets'>
                        <select name='type' size='1' class='form-control'>
                            <option value='tour'>Tournament</option>
                            <option value='knock'>Knock-out</option>
                        </select>
                        <input type='hidden' name='sneaky' value='$row[0]'>
                        <button class='btn btn-lg btn-primary' type='submit' >Edit</button>
                        <button class='btn btn-lg btn-danger' type='reset'>Reset</button>
                    </form>
                </div>
              </div>";
        echo "</div>";
    }
mysqli_close($link);
?>