<?php

$pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '+Koppai1889');
if (!empty($_POST)) {
    $errors = [];

    if (!$errors) {

        $query = $pdo->prepare('INSERT INTO post (title, descrip, descrip_short, audio_link, num_category) 
        VALUES (:title, :descrip, :descrip_short, :audio_link, :num_category)'
        );
        $query->bindValue('title', $_POST['title'], PDO::PARAM_STR);
        $query->bindValue('descrip', $_POST['descrip'], PDO::PARAM_STR);
        $query->bindValue('descrip_short', $_POST['descrip_short'], PDO::PARAM_STR);
        $query->bindValue('audio_link', $_POST['audio_link'], PDO::PARAM_STR);
        $query->bindValue('num_category', $_POST['num_category'], PDO::PARAM_INT);
        $query->execute();
    }
    $posts = $query->fetchAll(PDO::FETCH_ASSOC);
}

header('Location: index.php');
?>