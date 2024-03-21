<?php
  $host = "localhost";
  $db_user = "root";
  $db_psw = "";
  $db_name = "test2";

  $conn = mysqli_connect($host,$db_user,$db_psw,$db_name);
  if (!$conn)
    {
    die('Attenzione non connesso: ' . mysqli_error());
  }

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT ID_UTENTE, EMAIL FROM UTENTI WHERE USERNAME = $username AND password = $password";
$login_results= execute_query($query); //metodo da implementare
if (count($login_results) === 0) {
	//TODO: Inserire gestione di login fallito
} else {
	// generazione del codice a 9 cifre
	$2fa = strval(mt_rand(100000000, 999999999));

	$id_utente = $login_result['ID_UTENTE'];
	$emailto = $login_result['EMAIL'];
	//memorizzazione del codice sulla riga dell'anagrafica utente
	$query = "UPDATE FROM UTENTI SET 2FA = $2fa, 2FA_EXPIRE = ADDTIME(CURRENT_TIMESTAMP,900) WHERE ID_UTENTE = $id_utente"
	execute_query($query); //metodo da implementare

	// invio della mail, metodo sostituibile con una funzione che usa SMTP
	mail($emailto, "2FA Login", $2fa, 'From: webmaster@example.com');

	?>
	<form method="post" action="verify2fa.php">
		<h1>Auth code</h1>
		<input type="hidden" id="idutente" value="<?=$id_utente;?>">
		<input type="text" id="2fa" placeholder="Authcode" name="Authcode">
		<button type="submit" name="login">Conferma</button>
	</form>
<?php
}
?>