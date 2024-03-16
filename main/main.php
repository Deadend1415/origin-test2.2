<?php
// Start the session
session_start();
$_SESSION["game1"] = 0;
?>
<!DOCTYPE html>
<html style="height: 100%;">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="main.css">
    <link href='https://fonts.googleapis.com/css?family=ADLaM Display' rel='stylesheet'>

    <title>test</title>
</head>
<body>
    <div class="wrapper">
<!-- Top navigation bar -->
        <div class="navbar">
            <ul>
            <li><a href="../index/index.html">Home</a></li>
            <li><a class="active" href="#main">Main</a></li>
            <li><a href="../login_register/login.html">Login</a>
            <li><a href="../login_register/register_html.php">Regiser</a>
        </div>
<!-- Grid conatiner -->
        <div class="grid-container">
            <div class="row">
                <p>🅵🅸🅶🅷🅸🅽🅶 🅶🅰🅼🅴🆂</p>
                <a href="https://www.snk-corp.co.jp/us/games/kof-portal/" target="_blank"
                    <img src="../resources/kof1.jpg" alt="Snow"
                         onmouseover="this.src='../resources/kof2.gif';"
                         onmouseout="this.src='../resources/kof1.jpg';">
                    </a>

                <a href="https://www.guiltygear.com/ggst/en/" onclick="func1()" target="_blank">
                <img src="../resources/gg1.jpeg" alt="Snow"
                     onmouseover="this.src='../resources/gg2.gif';"
                     onmouseout="this.src='../resources/gg1.jpeg';">
                </a>

                <a href="https://www.streetfighter.com/6/it" onclick="func1()" target="_blank">
                <img src="../resources/sf6.jpg" alt="Snow"
                     onmouseover="this.src='../resources/sf6.gif';"
                     onmouseout="this.src='../resources/sf6.jpg';">
                </a>

                <a href="https://en.bandainamcoent.eu/tekken/tekken-7" onclick="func1()" target="_blank">
                <img src="../resources/tk1.jpeg" alt="Snow"
                     onmouseover="this.src='../resources/tk7.gif';"
                     onmouseout="this.src='../resources/tk1.jpeg';">
                </a>

                <a href="https://en.bandainamcoent.eu/dragon-ball/dragon-ball-fighterz" onclick="func1()" target="_blank">
                <img src="../resources/dbz.jpeg" alt="Snow"
                     onmouseover="this.src='../resources/dbz.gif';"
                     onmouseout="this.src='../resources/dbz.jpeg';">
                </a>

<!--
                <img src="../resources/4" alt="Snow"
                     onmouseover="this.src='../resources/5.gif';"
                     onmouseout="this.src='../resources/4';">
-->

            </div>
            <div class="row">
                <p>🆃🅾🅿 🆃🆁🅴🅽🅳🅸🅽🅶 🅲🅰🆃🅴🅶🅾🆁🆈</p>
                <a href="https://www.monsterhunter.com/" onclick="func1()" target="_blank">
                <img src="../resources/mh.jpg" alt="Snow"
                     onmouseover="this.src='../resources/mh.gif';"
                     onmouseout="this.src='../resources/mh.jpg';">
                </a>

                <a href="https://ryu-ga-gotoku.com/gaiden/asia_en/" onclick="func1()" target="_blank">
                <img src="../resources/yakuza.jpg" alt="Snow"
                     onmouseover="this.src='../resources/yakuza.gif';"
                     onmouseout="this.src='../resources/yakuza.jpg';">
                </a>

                <a href="https://en.bandainamcoent.eu/elden-ring/elden-ring" onclick="func1()" target="_blank">
                <img src="../resources/elden.jpg" alt="Snow"
                     onmouseover="this.src='../resources/elden.gif';"
                     onmouseout="this.src='../resources/elden.jpg';">
                </a>

                <a href="https://insomniac.games/game/marvels-spider-man-2/" onclick="func1()" target="_blank">
                <img src="../resources/spm.jpg" alt="Snow"
                     onmouseover="this.src='../resources/spm.gif';"
                     onmouseout="this.src='../resources/spm.jpg';">
                </a>

                <a href="https://www.konami.com/mg/archive/mgr/" onclick="func1()" target="_blank">
                <img src="../resources/mgg.jpg" alt="Snow"
                     onmouseover="this.src='../resources/mgg.gif';"
                     onmouseout="this.src='../resources/mgg.jpg';">
                </a>

            </div>
            </div>
        </div>
    <?php
    echo $_SESSION["game1"];
    ?>
</body>
</html>