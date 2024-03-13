<?php
  if (isset ($_POST['username']))   {$username=$_POST['username'];}     else {$username='';}
  if (isset ($_POST['password']))   {$password=$_POST['password'];}     else {$password='';}

  $host = "localhost";
  $db_user = "root";
  $db_psw = "";
  $db_name = "test";

  $conn = mysqli_connect($host,$db_user,$db_psw,$db_name);
  if (!$conn)
    {
    die('Attenzione non connesso: ' . mysqli_error());
  }else {
    $qu= ("insert into tbl_test values (null,'$username','$password')");

  $risultato = mysqli_query($conn,$qu);
  }


if(!$risultato)
  {
    header("Location: checkconn.php?message=$risultato");
  }
  else
  {
    header("Location: checkconn.php?status=success");  }


  mysqli_close($conn);


?>
