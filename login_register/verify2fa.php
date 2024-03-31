<?php
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
<body><div>
<?php
  $host = "ftp.deadend1415.altervista.org";
  $db_user = "deadend1415";
  $db_psw = "Brolinto0.";
  $db_name = "my_deadend1415";

$conn = mysqli_connect($host,$db_user,$db_psw,$db_name);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    if (!isset($fa)){$fa = $_POST["fa"];}

$id=$_SESSION["id"];

if ($stmt = $conn->prepare('SELECT 2FA FROM tbl_test WHERE id = ?')) {
		$stmt->bind_param("i", $id);
        $stmt->execute();
		$stmt->store_result();
        
        if ($stmt->num_rows > 0){
		$stmt->bind_result($otp);
			$stmt->fetch();
          echo "fa:".$fa." otp:".$otp;
            if($fa==$otp){
              echo "<script>alert('Successfully logged in'); location.href = '../main/main.php';</script>";}
              else{echo "<script>alert('Incorrect OTP!'); location.href = '../index.html';</script>";}
}else{
        echo "<p>ERROR</p>";
        echo "<a href='../index.html'>Ritorna al sito<a/>";
        }
     }else{printf("Error: %s.\n", $stmt->error);}

?></div>
</body>
</html>
