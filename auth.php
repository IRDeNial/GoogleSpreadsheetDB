<?php
    require_once("get_spreadsheet_data.php");

    // Make sure to change the URL to your own.
    // fetchUserList($url,$numberOfColumns);
    
    $users = fetchUserList("https://spreadsheets.google.com/feeds/cells/0ArqzqB_MMK5udGJXUWpwdlZyQmpQeU10QnJ2UlJfb3c/od6/public/basic?alt=json",3);
    $username = $_GET['username'];
    $password = $_GET['password'];
    
    for($i=1;$i<count($users);$i++) {
        $database_id = $users[$i][0];
        $database_username = $users[$i][1];
        $database_password = $users[$i][2];
        if($database_username == $username) {
            if($database_password == $password) {
                echo("Successful login!");
            } else {
                echo("Incorrect password!");
            }
        } else {
            echo("Incorrect username!");
        }
    }
?>
