<html>
<head>

    <title>register page</title>

    <!-- Pannello di gestione accesso-->
    <link href="admin.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div class="wrapper">
    <!-- Top navigation bar -->
    <div class="navbar">
        <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a  href="#main">Main</a></li>
            <li><a  href="login.html">Login</a></li>
            <li><a class="active">Regiser</a></li>
        </ul>
    </div>
<!--    image -->
    <div class="image"></div>
    <!-- content conatiner -->
    <div class="content">
        <div class="icon"></div><br>
        <form id="login" action= "register_2.php" method="post">
        <fieldset id="inputs">
            <input id="username" name="username" type="text"  placeholder="Username" autofocus required>
            <input id="password" name="password" type="password"  placeholder="Password" required>
        </fieldset>
        <fieldset id="actions">
            <input type="submit" id="submit" value="Register">
            <a href="../index/index.html" id="back">Ritorna al sito</a>
        </fieldset>
    </form>
    </div>
</div>

<?php
$variable = $_GET['variable'];
if (isset($variable)){
        echo "<script type='text/javascript'>alert('{$variable}');</script>";
}
?>

</body>
</html>