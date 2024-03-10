
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
  background-color: rgba(255, 255, 255,0.9); /* Adjust the opacity as needed */
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
  if (isset ($_POST['utente']))   {$utente=$_POST['utente'];}     else {$utente='';}
  if (isset ($_POST['password']))   {$password=sha1($_POST['password']);}     else {$password='';}

  $host = "localhost";
  $db_user = "root";
  $db_psw = "";
  $db_name = "pizzeria";

  $conn = mysqli_connect($host,$db_user,$db_psw,$db_name);
  if (!$conn)
    {
    die('Attenzione non connesso: ' . mysqli_error());
  }else {
    $qu= ("insert into tbl_accessi
           values (null,'$utente','$password')");

  $risultato = mysqli_query($conn,$qu);
  }

  if(!$risultato)
  {
   echo("Errore: " . mysqli_error($conn));
  }
  else
  { /*echo '<center><img src="icon2.png" alt="failed"></center>';
    echo "<center><div>
    <br>
    <p>******************************</p>
    <br>
    <b>Inserimento Effettuato Con Successo</b>
    <br>
    <p>******************************</p>
    </div></center>";*/
  }



  mysqli_close($conn);


?>
<br><br>
<center><a href="../../../../../../Program%20Files%20(x86)/EasyPHP-12.1/www/my%20portable%20files/index.html">Ritorna al sito</a></center>
</div></div>
</body>
</html>
