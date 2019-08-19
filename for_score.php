<?php
    session_start();
    $id = $_SESSION['id'];
    $page = $_REQUEST['page'];
    require_once('connection.php');

    $query2 = "SELECT f_name,l_name FROM system_user where user_id='$id'";
    $result2 = mysqli_query($link, $query2);
    $row2 = mysqli_fetch_row($result2);
    
    $offset = ((int)$page-1)*5;
    $query = "SELECT game_id,event_id,home,away,score FROM game where back_id='$id' limit 5 offset $offset"; //offset $offset
    $result = mysqli_query($link, $query);
    while($row = mysqli_fetch_row($result)){
        echo "<div name='$row[0]' class='border border-primary'>";
        echo "$row2[0] $row2[1]<br>";
        echo "$row[2] ";
        echo "$row[3] ";
        echo "$row[4] <br>";
        echo "<button class='btn btn-primary' type='button' data-toggle='collapse' data-target='#$row[0]' aria-expanded='false' aria-controls='collapseExample'>Button with data-target</button>";
        echo "<div class='collapse'>
                <div class='card card-body'>
                    <form class='form-signin' action='add_score_query.php' method='POST'>
                        <input type='hidden' name='snuck' value='$row[0]'>
                        <input type='text' name='score' placeholder='score' required>
                        <select name='winner' size='1' class='form-control' required>
                            <option value='$row[3]'>Home</option>
                            <option value='$row[4]'>away</option>
                        </select>
                        <button class='btn btn-lg btn-primary' type='submit'>Add</button>
                        <button class='btn btn-lg btn-danger' type='reset'>Reset</button>
                    </form>
                </div>
             </div>";//kanonika o winner tha eprepe me select option kanto meta.
        echo "</div>";
    }
    mysqli_close($link);
?>