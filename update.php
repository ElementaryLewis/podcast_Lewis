<?php

$pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '+Koppai1889');
if (!empty($_POST)) {
    $errors = [];

    if (!$errors) {
        $query = $pdo->prepare('UPDATE post 
        SET title = :title, descrip = :descrip, descrip_short = :descrip_short, 
        audio_link = :audio_link, num_category = :num_category
        WHERE num_post = :num_post');
        $query->bindValue('title', $_POST['title'], PDO::PARAM_STR);
        $query->bindValue('descrip', $_POST['descrip'], PDO::PARAM_STR);
        $query->bindValue('descrip_short', $_POST['descrip_short'], PDO::PARAM_STR);
        $query->bindValue('audio_link', $_POST['audio_link'], PDO::PARAM_STR);
        $query->bindValue('num_category', $_POST['num_category'], PDO::PARAM_INT);
        $query->bindValue('num_post', $_GET['num_post'], PDO::PARAM_INT);
        $query->execute();

        $num_post = $_GET['num_post'];
        header("Location: podcast.php?num_post=$num_post");
    }
}

?>