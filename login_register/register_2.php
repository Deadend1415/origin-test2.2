<?php
  if (isset ($_POST['username']))   {$username=$_POST['username'];}     else {$username='';}
  if (isset ($_POST['password']))   {$password=$_POST['password'];}     else {$password='';}
  $admin=0;
  $host = "localhost";
  $db_user = "root";
  $db_psw = "";
  $db_name = "test";

  $conn = mysqli_connect($host,$db_user,$db_psw,$db_name);
  if (!$conn)
    {
    die('Attenzione non connesso: ' . mysqli_error());
  }else {
    $qu= ("insert into tbl_test values (null,'$username','$password',0)");

  $risultato = mysqli_query($conn,$qu);
  }

if(!$risultato)
  {
  $variable=$risultato;
    header('Location: register_html.php?variable=' . $variable);
  }
  else {
    
    $variable = "sucess"; 
    header('Location: register_html.php?variable=' . $variable);
}

  mysqli_close($conn);


?>
