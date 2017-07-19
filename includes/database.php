<?php
//connect to database
$db_host = 'localhost';
$db_name = 'store';
$db_user = 'root';
$db_pass = '1234';


//create mysqli objct
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

//error handler
if(mysqli_connect_errno()){
    echo "This connection failed". mysqli_connect_error();
    die();
}

?>
