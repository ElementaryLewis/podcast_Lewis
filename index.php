<?php

include './src/function.php';
$pdo = getPDO('podcast', 'root', '+Koppai1889');

if (!empty($_GET['search'])) {
  $search_post = $_GET['search'];
} else {
  $search_post = null;
}

$posts = getPodcastsWithCategories($pdo, $search_post);
$category = getCategory($pdo);

if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
  $page_no = $_GET['page_no'];
} else {
  $page_no = 1;
}

$total_records_per_page = 5;
$offset = ($page_no - 1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;

$total_records = getCountPage();
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$second_last = $total_no_of_pages - 1;
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
  <a href="index.php" class="index">
    <h1>Iconic <img src="./letter_m.png">ario Musics</h1>
  </a>

  <form class="search" method="GET">
    <label for="search">Search</label>
    <input type="search" name="search" id="search">
  </form>

  <p></p>
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

  <p></p>
  <div class="center">
    <div class="pagination">
      <?php if ($total_no_of_pages <= 10) {
        for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
            echo "<a class='active'>$counter</a>";
          } else {
            echo "<a href='?page_no=$counter'>$counter</a>";
          }
        }
      } elseif ($total_no_of_pages > 10) {
        if ($page_no <= 4) {
          for ($counter = 1; $counter < 8; $counter++) {
            if ($counter == $page_no) {
              echo "<a class='active'>$counter</a>";
            } else {
              echo "<a href='?page_no=$counter'>$counter</a>";
            }
          }
          echo "<a>...</a>";
          echo "<a href='?page_no=$second_last'>$second_last</a>";
          echo "<a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a>";
        } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
          echo "<a href='?page_no=1'>1</a>";
          echo "<a href='?page_no=2'>2</a>";
          echo "<a>...</a>";
          for (
            $counter = $page_no - $adjacents;
            $counter <= $page_no + $adjacents;
            $counter++
          ) {
            if ($counter == $page_no) {
              echo "<a class='active'>$counter</a>";
            } else {
              echo "<a href='?page_no=$counter'>$counter</a>";
            }
          }
          echo "<a>...</a>";
          echo "<a href='?page_no=$second_last'>$second_last</a>";
          echo "<a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a>";
        } else {
          echo "<a href='?page_no=1'>1</a>";
          echo "<a href='?page_no=2'>2</a>";
          echo "<a>...</a>";
          for (
            $counter = $total_no_of_pages - 6;
            $counter <= $total_no_of_pages;
            $counter++
          ) {
            if ($counter == $page_no) {
              echo "<a class='active'>$counter</a>";
            } else {
              echo "<a href='?page_no=$counter'>$counter</a>";
            }
          }
        }
      }
      ?>
    </div>
    <p></p>
    <div class="pagination">
      <?php if ($page_no > 1) {
        echo "<a href='?page_no=1'>First Page</a>";
      } ?>

      <a <?php if ($page_no <= 1) {
        echo "class='disabled'";
      } else {
        echo "href='?page_no=$previous_page'";
      } ?>>Previous Page</a>

      <a <?php if ($page_no >= $total_no_of_pages) {
        echo "class='disabled'";
      } else {
        echo "href='?page_no=$next_page'";
      } ?>>Next Page</a>

      <?php if ($page_no < $total_no_of_pages) {
        echo "<a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a>";
      } ?>
    </div>
  </div>
  <p></p>

  <form class="podcast_create" action="create.php" method="post">
    <p></p>
    <label class="create" for="title">Podcast Title</label>
    <input type="text" name="title" id="title">
    <label class="create" for="title">Category</label>
    <select name="num_category" id="num_category">
      <?php
      foreach ($category as $cat):
        ?>
        <option value="<?= $cat['num_category'] ?>">
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