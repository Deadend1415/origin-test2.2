<?php
// Start the session
session_start();
?>
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
   <body>
   <div>
     <?php

/*connessione DB*/

  $host = "ftp.deadend1415.altervista.org";
  $db_user = "deadend1415";
  $db_psw = "Brolinto0.";
  $db_name = "my_deadend1415";

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
    echo $fa;

    $id = $o[0];
    $_SESSION["id"] = $id;
    $emailto = $o[3];

      $query2 = "UPDATE tbl_test SET 2FA = $fa, 2FA_EXPIRE = ADDTIME(CURRENT_TIMESTAMP,900) 
                WHERE id  = $id;";
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
      echo "<p>ERROR</p>";
      echo "<a href='../index.html'>Ritorna al sito<a/>";
  }
  }

   mysqli_close($connessione);

?>
   </div>
   </body>
 </html>
