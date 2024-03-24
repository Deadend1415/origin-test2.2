<?php
$host = "localhost";
$db_user = "root";
$db_psw = "";
$db_name = "test";

$connessione = mysqli_connect($host,$db_user,$db_psw,$db_name);


    //if (!isset($id_utente)){$id_utente = $_POST["id_utente"];}
    if (!isset($fa)){$fa = $_POST["fa"];}
    if(isset($_POST['var'])) $var=$_POST['var'];

$query = "select * from tbl_test4 where 2FA and 2FA_EXPIRE > CURRENT_TIMESTAMP";
$output = mysqli_query($connessione,$query);

if (count($output) === 0) {
    //TODO: Inserire gestione di login fallito
    exit("fallito");
    echo "<a href='../index/index.html'>Ritorna al sito<a/>";
} else {
    //TODO: Inserire gestione di login eseguito correttamente
    header('Location:../main/main.php');
}

?>