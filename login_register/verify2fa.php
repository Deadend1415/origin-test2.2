<html>
<head>
    <style>
        body{
            background: #f9f9f9 url(../resources/abstract.jpg) no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: xx-large;
        }
        div{
            background-color: rgba(255, 255, 255, 0.75);
            height: 50%;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 5%;
        }
        p{color: red;}
        @media only screen and (min-width: 918px) {
            div {
                width: 30%;
            }
        }
    </style>
</head>
<body><div>
<?php
$host = "localhost";
$db_user = "root";
$db_psw = "";
$db_name = "test";

$connessione = mysqli_connect($host,$db_user,$db_psw,$db_name);


    //if (!isset($id_utente)){$id_utente = $_POST["id_utente"];}
    if (!isset($fa)){$fa = $_POST["fa"];}

$query = "select * from tbl_test where 2FA and 2FA_EXPIRE > CURRENT_TIMESTAMP";

$output = mysqli_query($connessione,$query);

while($o=mysqli_fetch_array($output)){
    if (count($output) == 0) {
        //TODO: Inserire gestione di login fallito
        echo "<p>ERROR</p>";
        echo "<a href='../index/index.html'>Ritorna al sito<a/>";
    } else {
        //TODO: Inserire gestione di login eseguito correttamente
        header('Location:../main/main.php');
    }
}
?></div>
</body>
</html>
