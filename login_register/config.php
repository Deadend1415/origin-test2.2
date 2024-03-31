<?php
function getConn()
{
    $db_host = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'test';

    /*$host = "ftp.deadend1415.altervista.org";
  $db_user = "deadend1415";
  $db_psw = "Brolinto0.";
  $db_name = "my_deadend1415";*/

    $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

    // MySQLi error
    if (mysqli_connect_errno()) {
        exit('Connection to the database failed' . mysqli_connect_error());
    }
    return $conn;
}

?>