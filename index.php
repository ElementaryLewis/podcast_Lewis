<?php

include './src/function.php';
$posts = getPodcastsWithCategory(null);
$category = getCategory();
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
      <?php
      foreach ($posts as $post): ?>
        <form class="podcast" action="delete.php?num_post=<?= $post['num_post'] ?>" method="post">
          <input class="delete" type="image" src="./bin.PNG">
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
        </form>
      <?php endforeach ?>
    <?php endif ?>

    <form class="podcast_create" action="create.php" method="post">
      <p></p>
      <label class="create" for="title">Podcast Title</label>
      <input type="text" name="title" id="title">
      <label class="create" for="title">Category</label>
      <select name="name" id="name">
        <?php
        foreach ($category as $cat):
          ?>
          <option value="<?= htmlspecialchars($cat['num_category']) ?>">
            <?= htmlspecialchars($cat['name']) ?>
          </option>
        <?php endforeach ?>
      </select>
      <label class="create" for="descrip_short">Short Description</label>
      <textarea name="descrip_short" id="descrip_short" rows="5"></textarea>
      <label class="create" for="descrip">Description</label>
      <textarea name="descrip" id="descrip" rows="10"></textarea>
      <label class="create" for="audio_link">Audio Link</label>
      <input type="text" name="audio_link" id="audio_link">
      <p></p>
      <input class="button" type="submit" value="Create Podcast">
      <p></p>
    </form>

</body>

</html>