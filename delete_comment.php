<?php

$pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '+Koppai1889');
if (!empty($_POST)) {

    $query = $pdo->prepare('SELECT num_post FROM comment
    WHERE num_comment = :num_comment');
    $query->bindValue('num_comment', $_GET['num_comment'], PDO::PARAM_INT);
    $query->execute();

    $posts = $query->fetchAll(PDO::FETCH_ASSOC);

    if (empty($posts)) {
        die("No comments found with num_comment = " . $_GET['num_comment']);
    }

    $num_post = null;
    foreach ($posts as $post) {
        $num_post = $post['num_post'];
    }

    $query = $pdo->prepare('DELETE FROM comment WHERE num_comment = :num_comment');
    $query->bindValue('num_comment', $_GET['num_comment'], PDO::PARAM_INT);

    $posts = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->execute();

    header('Location: podcast.php?num_post=' . $num_post);
}
?>