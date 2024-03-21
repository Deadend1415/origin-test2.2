<!DOCTYPE html><html>
<head>
    <title>Test 3</title>
</head>
<?php
    session_start();
?>
<body>
<p>Hello world</p>
<?php 
    foreach ($_SESSION['x'] as $x) {
        echo "$x <br>";
      }
?>

<a href="1.php">Pagina 1</a>;
</body>
</html>