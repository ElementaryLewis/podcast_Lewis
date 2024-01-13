<?php

$pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '+Koppai1889');
if (!empty($_POST)) {

    $query = $pdo->prepare('DELETE FROM post WHERE num_post = :num_post');
    $query->bindValue('num_post', $_POST['num_post'], PDO::PARAM_INT);
    $query->execute();

    $posts = $query->fetchAll(PDO::FETCH_ASSOC);
}

header('Location: index.php');
?>