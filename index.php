<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="./styles.css" />
</head>

<body>
  <h1>Iconic <img src="./letter_m.png">ario Musics</h1>
  <!-- N° 1 -->
  <section class="podcast">
    <h2 class="title">
      <?php
      include 'vars.php';
      echo $podcast[0]['title'];
      ?>
    </h2>
    <p class="descrip">
      <?php
      include 'vars.php';
      echo $podcast[0]['descrip'];
      ?>
    </p>
    <p class="listen">
      <a href="podcast.php?id=0"><img src="./play-button.png" />Ecouter</a>
    </p>
  </section>
  <!-- N° 2 -->
  <section class="podcast">
    <h2 class="title">
      <?php
      include 'vars.php';
      echo $podcast[1]['title'];
      ?>
    </h2>
    <p class="descrip">
      <?php
      include 'vars.php';
      echo $podcast[1]['descrip'];
      ?>
    </p>
    <p class="listen">
      <a href="podcast.php?id=1"><img src="./play-button.png" />Ecouter</a>
    </p>
  </section>
  <!-- N° 3 -->
  <section class="podcast">
    <h2 class="title">
      <?php
      include 'vars.php';
      echo $podcast[2]['title'];
      ?>
    </h2>
    <p class="descrip">
      <?php
      include 'vars.php';
      echo $podcast[2]['descrip'];
      ?>
    </p>
    <p class="listen">
      <a href="podcast.php?id=2"><img src="./play-button.png" />Ecouter</a>
    </p>
  </section>
  <!-- N° 4 -->
  <section class="podcast">
    <h2 class="title">
      <?php
      include 'vars.php';
      echo $podcast[3]['title'];
      ?>
    </h2>
    <p class="descrip">
      <?php
      include 'vars.php';
      echo $podcast[3]['descrip'];
      ?>
    </p>
    <p class="listen">
      <a href="podcast.php?id=3"><img src="./play-button.png" />Ecouter</a>
    </p>
  </section>
  <!-- N° 5 -->
  <section class="podcast">
    <h2 class="title">
      <?php
      include 'vars.php';
      echo $podcast[4]['title'];
      ?>
    </h2>
    <p class="descrip">
      <?php
      include 'vars.php';
      echo $podcast[4]['descrip'];
      ?>
    </p>
    <p class="listen">
      <a href="podcast.php?id=4"><img src="./play-button.png" />Ecouter</a>
    </p>
  </section>
  <!-- N° 6 -->
  <section class="podcast">
    <h2 class="title">
      <?php
      include 'vars.php';
      echo $podcast[5]['title'];
      ?>
    </h2>
    <p class="descrip">
      <?php
      include 'vars.php';
      echo $podcast[5]['descrip'];
      ?>
    </p>
    <p class="listen">
      <a href="podcast.php?id=5"><img src="./play-button.png" />Ecouter</a>
    </p>
  </section>
  <!-- N° 7 -->
  <section class="podcast">
    <h2 class="title">
      <?php
      include 'vars.php';
      echo $podcast[6]['title'];
      ?>
    </h2>
    <p class="descrip">
      <?php
      include 'vars.php';
      echo $podcast[6]['descrip'];
      ?>
    </p>
    <p class="listen">
      <a href="podcast.php?id=6"><img src="./play-button.png" />Ecouter</a>
    </p>
  </section>
  <!-- N° 8 -->
  <section class="podcast">
    <h2 class="title">
      <?php
      include 'vars.php';
      echo $podcast[7]['title'];
      ?>
    </h2>
    <p class="descrip">
      <?php
      include 'vars.php';
      echo $podcast[7]['descrip'];
      ?>
    </p>
    <p class="listen">
      <a href="podcast.php?id=7"><img src="./play-button.png" />Ecouter</a>
    </p>
  </section>
  <!-- N° 9 -->
  <section class="podcast">
    <h2 class="title">
      <?php
      include 'vars.php';
      echo $podcast[8]['title'];
      ?>
    </h2>
    <p class="descrip">
      <?php
      include 'vars.php';
      echo $podcast[8]['descrip'];
      ?>
    </p>
    <p class="listen">
      <a href="podcast.php?id=8"><img src="./play-button.png" />Ecouter</a>
    </p>
  </section>
  <!-- N° 10 -->
  <section class="podcast">
    <h2 class="title">
      <?php
      include 'vars.php';
      echo $podcast[9]['title'];
      ?>
    </h2>
    <p class="descrip">
      <?php
      include 'vars.php';
      echo $podcast[9]['descrip'];
      ?>
    </p>
    <p class="listen">
      <a href="podcast.php?id=9"><img src="./play-button.png" />Ecouter</a>
    </p>
  </section>
  <!-- N° 11 -->
  <section class="podcast">
    <h2 class="title">
      <?php
      include 'vars.php';
      echo $podcast[10]['title'];
      ?>
    </h2>
    <p class="descrip">
      <?php
      include 'vars.php';
      echo $podcast[10]['descrip'];
      ?>
    </p>
    <p class="listen">
      <a href="podcast.php?id=10"><img src="./play-button.png" />Ecouter</a>
    </p>
  </section>
</body>

</html>