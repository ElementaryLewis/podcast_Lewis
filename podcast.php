<?php

$pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '+Koppai1889');

$query = $pdo->prepare('SELECT num_post, title, descrip, descrip_short, audio_link,
    p.created_at, p.updated_at, p.num_category, name
    FROM post p
    LEFT JOIN category c ON p.num_category = c.num_category
    WHERE num_post=:num_post
  ');
$query->bindValue('num_post', $_GET['num_post'], PDO::PARAM_STR);
$query->execute();
$posts = $query->fetchAll(PDO::FETCH_ASSOC);

if (empty($_GET['num_post']) ^ $_GET['num_post'] == 0) {
    header('Location: 404.php');
    die;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="wnum_postth=device-wnum_postth, initial-scale=1.0" />
    <title>
        <?php foreach ($posts as $post): ?>
            <?= $post['title'] ?>
        <?php endforeach ?>
    </title>
    <link rel="stylesheet" href="./styles.css" />
</head>

<body>
    <a href="index.php" class="index">
        <h1>Iconic <img src="./letter_m.png">ario Musics</h1>
    </a>

    <?php if (empty($posts)): ?>
        <p>No matching records found.</p>
    <?php else: ?>
        <?php foreach ($posts as $post): ?>
            <section class="podcast">
                <time class="created_at" datetime="<?= htmlspecialchars($post['created_at']) ?>">
                    <?= htmlspecialchars($post['created_at']) ?>
                </time>
                <h2 class="title">
                    <?= htmlspecialchars($post['title']) ?>
                </h2>
                <pre class="descrip"> <?= htmlspecialchars($post['descrip']) ?> </pre>
                <p class="audio">
                    <audio controls>
                        <source src="<?= htmlspecialchars($post['audio_link']) ?>">
                    </audio>
                </p>
            </section>
        <?php endforeach ?>
    <?php endif ?>

    <div>
        <?php if (!empty($status)): ?>
            <p>
                <?= $status ?>
            </p>
        <?php endif ?>
        <form action="update.php?num_post=<?= $post['num_post'] ?>" method="post"
            style="display: inline-flex; flex-direction: column">
            <label for="title">Podcast Title</label>
            <input type="text" name="title" id="title" value="<?= $post['title'] ?>">
            <label for="descrip_short">Short Description</label>
            <textarea name="descrip_short" id="descrip_short" cols="30"
                rows="5"><?= $post['descrip_short'] ?></textarea>
            <label for="descrip">Description</label>
            <textarea name="descrip" id="descrip" cols="30" rows="10"><?= $post['descrip'] ?></textarea>
            <select name="num_category" id="num_category">
                <?php foreach ($posts as $post): ?>
                    <option value="<?= htmlspecialchars($post['num_category']) ?>">
                        <?= htmlspecialchars($post['name']) ?>
                    </option>
                <?php endforeach ?>
            </select>
            <label for="audio_link">Audio Link</label>
            <textarea name="audio_link" id="audio_link" cols="30" rows="2"><?= $post['audio_link'] ?></textarea>
            <input type="submit" value="Edit">
        </form>
    </div>
</body>

</html>