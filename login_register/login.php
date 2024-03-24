 <?php

/*connessione DB*/

$host = "localhost";
$db_user = "root";
$db_psw = "";
$db_name = "test";

  $connessione = mysqli_connect($host,$db_user,$db_psw,$db_name);

  if (isset ($_POST['username']))   {$username=mysql_real_escape_string($_POST['username']);}     else {$username='';}
  if (isset ($_POST['password']))   {$password=mysql_real_escape_string($_POST['password']);}     else {$password='';}

  $query = "select id,utente,password,email
            from tbl_test;";

  $output=mysqli_query($connessione,$query);
 if (!$output) {
   trigger_error(mysqli_error($connessione), E_USER_ERROR);
 }
 $totalRows = mysqli_num_rows($output);
 $currentRow = 0;

  while($o=mysqli_fetch_array($output)){
  if($o[1] == $username and $o[2] == $password) {

    $fa = strval(mt_rand(100000000, 999999999));
    echo "fa: ". $fa . "<br>";

    $id_utente = $o[0];
    $emailto = $o[3];

      $query2 = "UPDATE tbl_test SET 2FA = $fa, 2FA_EXPIRE = ADDTIME(CURRENT_TIMESTAMP,900) 
                WHERE id  = $id_utente;";
      mysqli_query($connessione,$query2);

      //mail($emailto, "2FA Login", $fa, 'From: webmaster@example.com');

    echo '<form method="post" action="verify2fa.php">
            <h1>Auth code</h1>
        <input type="text" placeholder="Auth" name="fa">
		<button type="submit" name="login">Conferma</button>
        </form>';

  }

      // Increment current row counter
      $currentRow++;

      // Check if it's the last row
      if ($o[1]!=$username and $o[2]!=$password and $currentRow >= $totalRows)
  {
      echo " error";
      echo "<br>"."<a href='../index/index.html'>Ritorna al sito<a/>";
  }
  }

   mysqli_close($connessione);

?>

