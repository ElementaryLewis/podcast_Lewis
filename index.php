<?php

$pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '+Koppai1889');

if (!empty($_GET['search'])) {
  $pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '+Koppai1889');
  $query = $pdo->prepare
  ('SELECT num_post, title, descrip, descrip_short, audio_link,
  p.created_at, p.updated_at, p.num_category, name
    FROM post
    LEFT JOIN category ON post.num_category = category.num_category
    WHERE title LIKE :search
    ORDER BY created_at DESC
    ');

  $query->bindValue('search', '%' . $_GET['search'] . '%', PDO::PARAM_STR);
  $query->execute();

  $posts = $query->fetchAll(PDO::FETCH_ASSOC);
} else {
  $query = $pdo->query
  ('SELECT num_post, title, descrip, descrip_short, audio_link,
  p.created_at, p.updated_at, p.num_category, name
    FROM post p
    LEFT JOIN category c ON p.num_category = c.num_category
    ');
  $posts = $query->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mario Music</title>
  <link rel="stylesheet" href="./styles.css" />
</head>

<body>
  <div>
    <a href="index.php" class="index">
      <h1>Iconic <img src="./letter_m.png">ario Musics</h1>
    </a>

    <form method="GET">
      <label for="search">Search</label>
      <input type="search" name="search" id="search">
    </form>

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
          <h3 class="category">
            <?= htmlspecialchars($post['name']) ?>
          </h3>
          <pre class="descrip"> <?= htmlspecialchars($post['descrip_short']) ?> </pre>
          <p class="listen">
            <a href="podcast.php?num_post=<?= $post['num_post'] ?>">
              <img src="./play-button.png" />Listen</a>
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
      <form action="create.php" method="post" style="display: inline-flex; flex-direction: column">
        <label for="title">Podcast Title</label>
        <input type="text" name="title" id="title">
        <select name="name" id="name">
          <?php
          $query_c = $pdo->query
          ('SELECT DISTINCT p.num_category, name
            FROM post p
            LEFT JOIN category c ON p.num_category = c.num_category
            ');
          $category = $query_c->fetchAll(PDO::FETCH_ASSOC);
          foreach ($category as $cat):
            ?>
            <option value="<?= htmlspecialchars($cat['num_category']) ?>">
              <?= htmlspecialchars($cat['name']) ?>
            </option>
          <?php endforeach ?>
        </select>
        <label for="descrip_short">Short Description</label>
        <textarea name="descrip_short" id="descrip_short" cols="30" rows="5"></textarea>
        <label for="descrip">Description</label>
        <textarea name="descrip" id="descrip" cols="30" rows="10"></textarea>
        <label for="audio_link">Audio Link</label>
        <textarea name="audio_link" id="audio_link" cols="30" rows="1"></textarea>
        <input type="submit" value="Publish">
      </form>
    </div>

    <div>
      <form action="delete.php" method="post" style="display: inline-flex; flex-direction: column">
        <label for="num_post">Delete Podcast</label>
        <select name="num_post" id="num_post">
          <?php foreach ($posts as $post): ?>
            <option value="<?= htmlspecialchars($post['num_post']) ?>">
              <?= htmlspecialchars($post['title']) ?>
            </option>
          <?php endforeach ?>
        </select>
        <input type="submit" value="Delete Podcast">
      </form>
    </div>
</body>

</html>