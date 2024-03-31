<?php
require_once 'config.php';
  //Create  session
  session_start();
  //error reporting
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

  //Connessione al database
  $conn = getConn();

  //Params preparation
  if (isset ($_POST['username']))   {$username=$_POST['username'];}     else {$username='';}
  if (isset ($_POST['password']))   {$password=$_POST['password'];}     else {$password='';}
  if (isset ($_POST['email']))   {$email=$_POST['email'];}     else {$email='';}

  $stmt = $conn->prepare("INSERT INTO tbl_test(utente,password,email) VALUES (?, ?,?)");
  $stmt->bind_param('sss',$username,$password,$email);
  if (!$stmt->execute()){
    $_SESSION["register"] = "failed";
  }else{
    $_SESSION["register"] = "success";
  }
  header("Location: register_html.php?");

  mysqli_close($conn);

?>
