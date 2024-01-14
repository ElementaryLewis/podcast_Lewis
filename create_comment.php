<?php

$pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '+Koppai1889');
if (!empty($_POST)) {
    $errors = [];

    if (!$errors) {

        $query = $pdo->prepare('INSERT INTO comment (body, num_post) 
        VALUES (:body, :num_post)'
        );
        $query->bindValue('body', $_POST['body'], PDO::PARAM_STR);
        $query->bindValue('num_post', $_GET['num_post'], PDO::PARAM_INT);
        $query->execute();
    }
    $posts = $query->fetchAll(PDO::FETCH_ASSOC);

}
$num_post = $_GET['num_post'];
header('Location: podcast.php?num_post=' . $num_post);

?>