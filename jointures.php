<?php

$pdo = new PDO('mysql:host=localhost;dbname=blog', 'homestead', 'secret');

// LEFT JOIN
$query = $pdo->query('SELECT posts.title, posts.body, categories.name AS category_name
    FROM posts
    LEFT JOIN categories ON posts.category_id = categories.id
    -- WHERE posts.id = 6
');

echo '<pre>';
var_dump($query->fetchAll(PDO::FETCH_ASSOC));
echo '</pre>';

// INNER JOIN (possibilité d'indiquer seulement JOIN pour faire un INNER JOIN implicite)
$query = $pdo->query('SELECT posts.title, posts.body, categories.name AS category_name
    FROM posts
    INNER JOIN categories ON posts.category_id = categories.id
    -- WHERE posts.id = 6
');

echo '<pre>';
var_dump($query->fetchAll(PDO::FETCH_ASSOC));
echo '</pre>';
