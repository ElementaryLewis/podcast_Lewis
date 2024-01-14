<?php

function getPDO($root, $password)
{
    $pdo = new PDO('mysql:host=localhost;dbname=blog', $root, $password);
    return $pdo;
}

function getPodcastsWithCategory($num_post)
{
    $pdo = getPDO('root', '+Koppai1889');
    if (!empty($_GET['search'])) {

        $query = $pdo->prepare
        ('SELECT num_post, title, descrip, descrip_short, audio_link,
      p.created_at, p.updated_at, p.num_category, name
        FROM post p
        LEFT JOIN category c ON p.num_category = c.num_category
        WHERE title LIKE :search
        ORDER BY p.created_at DESC
        LIMIT 20
        ');

        $query->bindValue('search', '%' . $_GET['search'] . '%', PDO::PARAM_STR);
        $query->execute();

        $posts = $query->fetchAll(PDO::FETCH_ASSOC);
    } else if (!empty($num_post)) {
        $query = $pdo->prepare('SELECT num_post, title, descrip, descrip_short, audio_link,
        p.created_at, p.updated_at, p.num_category, name
        FROM post p
        LEFT JOIN category c ON p.num_category = c.num_category
        WHERE p.num_post=:num_post
      ');
        $query->bindValue('num_post', $num_post, PDO::PARAM_STR);
        $query->execute();
        $posts = $query->fetchAll(PDO::FETCH_ASSOC);

        if (
            empty($num_post) ||
            !($post = current(
                array_filter(
                    $posts,
                    fn(array $post) => $post['num_post'] === (int) $num_post
                )
            )
            )
        ) {
            return false;
        }
    } else if (empty($num_post)) {
        $query = $pdo->query
        ('SELECT num_post, title, descrip, descrip_short, audio_link,
      p.created_at, p.updated_at, p.num_category, name
        FROM post p
        LEFT JOIN category c ON p.num_category = c.num_category
        LIMIT 20 
        ');
        $posts = $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }

    return $posts;
}

function getCategory()
{
    $pdo = getPDO('root', '+Koppai1889');
    $query = $pdo->query
    ('SELECT DISTINCT p.num_category, name
            FROM post p
            LEFT JOIN category c ON p.num_category = c.num_category
            ');
    $category = $query->fetchAll(PDO::FETCH_ASSOC);

    return $category;
}

function getCommentWithUsers($num_post)
{
    $pdo = getPDO('root', '+Koppai1889');
    $query = $pdo->prepare('SELECT m.num_comment, body, m.created_at, m.updated_at,
    m.num_post, m.num_user, pseudonyme, avatar
    FROM `comment` m
    LEFT JOIN post p ON m.num_post = p.num_post
    LEFT JOIN users u ON m.num_user = u.num_user 
    WHERE m.num_post = :num_post;
  ');
    $query->bindValue('num_post', $num_post, PDO::PARAM_STR);
    $query->execute();
    $comments = $query->fetchAll(PDO::FETCH_ASSOC);
    if (empty($comments)) {
        return false;
    }
    return $comments;
}

?>