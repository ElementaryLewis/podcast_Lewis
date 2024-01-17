<?php

include './src/function.php';
$pdo = getPDO('podcast', 'root', '+Koppai1889');

$num_post = $_GET['num_post'];
$posts = getPodcastsWithCategory($pdo, $num_post);
$category = getCategory($pdo);
$comments = getCommentWithUsers($pdo, $num_post);

if ($posts == false) {
    header('Location: 404.php');
    die;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

    <form class="podcast_create" action="update.php?num_post=<?= $post['num_post'] ?>" method="post">
        <p></p>
        <label class="create" for="title">Podcast Title</label>
        <input type="text" name="title" id="title" value="<?= $post['title'] ?>">
        <label class="create" for="title">Category</label>
        <select name="num_category" id="num_category">
            <?php foreach ($posts as $post): ?>
                <option value="<?= htmlspecialchars($post['num_category']) ?>">
                    <?= htmlspecialchars($post['name']) ?>
                </option>
            <?php endforeach ?>
        </select>
        <label class="create" for="descrip_short">Short Description</label>
        <textarea name="descrip_short" id="descrip_short" rows="5"><?= $post['descrip_short'] ?></textarea>
        <label class="create" for="descrip">Description</label>
        <textarea name="descrip" id="descrip" rows="10"><?= $post['descrip'] ?></textarea>
        <label class="create" for="audio_link">Audio Link</label>
        <input name="audio_link" id="audio_link" value="<?= $post['audio_link'] ?>">
        <p></p>
        <input class="button" type="submit" value="Edit">
        <p></p>
    </form>

    <?php

    ?>

    <p>Commentary</p>
    <?php if ($comments == false): ?>
        <p><i>There is no comment.</i></p>
    <?php else: ?>
        <?php foreach ($comments as $comment): ?>
            <form class="podcast" action="delete_comment.php?num_comment=<?= $comment['num_comment'] ?>" method="post">
                <div class="user">
                    <p class="pseudo">
                        <?= $comment['pseudonyme'] ?>
                    </p>
                    <img class="avatar" alt="<?= $comment['pseudonyme'] ?>" src="<?= $comment['avatar'] ?>">
                </div>
                <input class="delete" type="image" src="./bin.PNG">
                <time class="created_at" datetime="<?= htmlspecialchars($comment['created_at']) ?>">
                    <?= htmlspecialchars($comment['created_at']) ?>
                </time>
                <pre class="descrip"> <?= htmlspecialchars($comment['body']) ?> </pre>
            </form>
        <?php endforeach ?>
    <?php endif ?>

    <p>Write Comment</p>
    <form class="podcast_create" action="create_comment.php?num_post=<?= $_GET['num_post'] ?> " method="post">
        <p></p>
        <label class="create" for="body">Comment</label>
        <textarea name="body" id="body" rows="5"></textarea>
        <p></p>
        <input class="button" type="submit" value="Send Comment">
        <p></p>
    </form>

</body>

</html>