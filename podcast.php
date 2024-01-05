<?php

include 'vars.php';

$title;
$controls;
$error;
$link;
$home;


if ($_GET["id"] > count($podcast)) {
    $error = "Error 404<br>File Not found";
    $link = "index.php";
    $home = "Go to main page";
} else {
    $title = 'Iconic <img src="./letter_m.png">ario Musics';
    $controls = "controls";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./styles.css" />
</head>

<body>
    <h1>
        <?php
        echo $title;
        ?>
    </h1>
    <section class="podcast">
        <h1 class="error">
            <?php
            echo $error;
            ?>
        </h1>
        <h2 class="home">
            <a href=<?php
            echo $link;
            ?>>
        <?php
        echo $home;
        ?>
            </a>
        </h2>
        <p class="date">
            <?php
            include 'vars.php';
            echo $podcast[$_GET["id"]]['date'];
            ?>
        </p>
        <h2 class="title">
            <?php
            include 'vars.php';
            echo $podcast[$_GET["id"]]['title'];
            ?>
        </h2>
        <p class="audio"><audio <?php
        echo $controls;
        ?>>
                <source src="
                <?php
                include 'vars.php';
                echo $podcast[$_GET["id"]]['audio'];
                ?>
            ">
            </audio></p>
        <p class="descrip">
            <?php
            include 'vars.php';
            echo $podcast[$_GET["id"]]['descrip'];
            ?>
        </p>
    </section>
</body>

</html>