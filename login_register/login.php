<html
<head>

<title>ordina pizza</title>
<style>
body{
  font-size: 2em;
}
.container {
  width: 40%;
  display: flex;
  justify-content: center;
  align-items: center;
  position: fixed;
  top: 10%;
  left:30%;
  background-color: rgba(255, 255, 255,1); /* Adjust the opacity as needed */
  z-index: 1;
  border-radius: 30px;
}

.card {
  transform-style: preserve-3d;
  min-height: 80vh;
  width: 100%;
  border-radius: 30px;
  padding: 0rem 5rem;
  box-shadow: 0 20px 20px rgba(0, 0, 0, 0.2), 0px 0px 50px rgba(0, 0, 0, 0.2);
}

</style>
</head>

<body bgcolor="#4e64fa">
<div class="container">
<div class="card">
  <?php

/*connessione DB*/

$host = "localhost";
$db_user = "root";
$db_psw = "";
$db_name = "test";

  $connessione = mysqli_connect($host,$db_user,$db_psw,$db_name);

  /*mysqli_select_db($db_name,$connessione); */

  /*faccio l'escape dei caratteri dannosi*/
  if (isset ($_POST['utente']))   {$utente=mysql_real_escape_string($_POST['utente']);}     else {$utente='';}
  if (isset ($_POST['password']))   {$password=mysql_real_escape_string($_POST['password']);}     else {$utente='';}
  /*sha1 o md5 cifra la password anche qui in questo modo corrisponde con quella inserita cifrata del db*/
  $password= sha1 (mysql_real_escape_string($_POST['password']));

  $query = "SELECT utente
            FROM tbl_test
			WHERE utente = '$utente' AND password = '$password' ";

  $ris = mysqli_query($connessione, $query) or die (mysqli_error());


  $numerorighe = mysqli_num_rows($ris);

  if($numerorighe>0)
	   {
	  echo '<script   language=javascript>document.location.href="../main/main.php"</script>';
       }
 else  {
   echo '<center><img src="" alt="failed"></center>';
   echo "<center><div>
   <br>
   <p>******************************</p>
   <br>
   <b>Utente non presente</b>
   <br>
   <p>******************************</p>
   </div></center>";
	echo '<br>';
  echo '<center><a href="../index/index.html" id="back">Ritorna al sito</a></center>';
	    }

   mysqli_close($connessione);

?>
</div></div>
</body>
</html>
