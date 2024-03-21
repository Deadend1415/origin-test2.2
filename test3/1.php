<!DOCTYPE html><html>
<head>
    <title>Test 3</title>
</head>
<?php session_start();
    
    if(!isset($_SESSION['x'])){
        $_SESSION['x']= [0,0,0];
    }
?>
<body>
<p>HI</p>

<form method="post">
<button name="btn" type=submit value="1">Value 1</button>
<button name="btn" type=submit value="2">Value 2</button>
<button name="btn" type=submit value="3">Value 3</button>
</form>

<a href="2.php">Pagina 2</a>;

<?php
if(isset($_POST['btn'])){
switch($_POST['btn']){
    case '1':
    increment(0);
    break;

    case '2':
    increment(1);
    break;

    case '3':
    increment(2);
    break;
}
}

function increment($index) {
    $_SESSION['x'][$index] = $_SESSION['x'][$index]+1;
  }
?>
</body>
</html>