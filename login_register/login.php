<?php
require_once 'config.php';
//Create session
session_start();
?>
<html>
   <head>
       <link href="login.css" rel="stylesheet" type="text/css" />
   </head>
   <body>
   <div>
 <?php

     //error reporting
     mysqli_report(MYSQLI_REPORT_ERROR);

     //Connessione al database
     $conn = getConn();

     //Params preparation
     if (isset ($_POST['username']))   {$username=$_POST['username'];}     else {$username='';}
     if (isset ($_POST['password']))   {$password=$_POST['password'];}     else {$password='';}

     //Create query
     if ($stmt = $conn->prepare(
             "select id,2FA 
                    from tbl_test 
                    where utente = '$username' 
                    and password = '$password';"));
     $stmt->execute();
     $stmt->store_result();

 if ($stmt->num_rows > 0) {//query
     $stmt->bind_result($id, $fa);
     $stmt->fetch();
     //set id and otp into session
    $_SESSION["id"] = $id;
    $_SESSION["fa"] = $fa = strval(mt_rand(100000000, 999999999));
    //send mail

    //update otp
     $query = "UPDATE tbl_test SET 2FA = '$fa', 2FA_EXPIRE = ADDTIME(CURRENT_TIMESTAMP,900)
                WHERE id  = $id;";
     mysqli_query($conn,$query);

     //form for authentication
     echo '<form method="post" action="verify2fa.php">
            <h1>Auth code</h1>
        <input type="text" placeholder="Auth" name="fa">
		<button type="submit" name="login">Conferma</button>
        </form>';
 }else{
  echo "<script>alert('Incorrect Username/Password'); location.href = 'login.html';</script>";
 }

   mysqli_close($conn);

?>
   </div>
   </body>
 </html>
