 <?php

/*connessione DB*/

$host = "localhost";
$db_user = "root";
$db_psw = "";
$db_name = "test";

  $connessione = mysqli_connect($host,$db_user,$db_psw,$db_name);

  if (isset ($_POST['utente']))   {$utente=mysql_real_escape_string($_POST['utente']);}     else {$utente='';}
  if (isset ($_POST['password']))   {$password=mysql_real_escape_string($_POST['password']);}     else {$utente='';}

  /*sha1 o md5 cifra la password anche qui in questo modo corrisponde con quella inserita cifrata del db*/

  $query = "select username,password,user_type
  from tbl_test;";

  $output=mysqli_query($connessione,$query);

  while($o=mysqli_fetch_array($output)){

  if($o[0]==$utente and $o[1]==$password){
      if($o[2]==1){
        header('Location:../admin/admin.html');
      }else{
          header('Location:../main/main.php');
      }
  }else{
      echo '<p>Non esiste</p>';
  }
  }

   mysqli_close($connessione);

?>

