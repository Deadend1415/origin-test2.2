<?php
  if (isset ($_POST['username']))   {$username=$_POST['username'];}     else {$username='';}
  if (isset ($_POST['password']))   {$password=$_POST['password'];}     else {$password='';}
  $admin=0;
  $host = "ftp.deadend1415.altervista.org";
  $db_user = "deadend1415";
  $db_psw = "Brolinto0.";
  $db_name = "my_deadend1415";

  $conn = mysqli_connect($host,$db_user,$db_psw,$db_name);
  if (!$conn)
    {
    die('Attenzione non connesso: ' . mysqli_error());
  }else {
    $qu= ("insert into tbl_test(utente,password,user_type) values ('$username','$password',0);");

  $risultato = mysqli_query($conn,$qu);
  }


    
    $variable = "sucess"; 
    header('Location: register_html.php?variable=' . $variable);


  mysqli_close($conn);


?>
