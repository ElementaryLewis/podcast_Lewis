<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="./styles.css" />
</head>

<body>
  <h1>Podcast</h1>
  <!-- N° 1 -->
  <section class="podcast">
    <p class="date">
      <?php
      include 'vars.php';
      echo $podcast[0]['date'];
      ?>
    </p>
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
    <p class="date">
      <?php
      include 'vars.php';
      echo $podcast[1]['date'];
      ?>
    </p>
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
    <p class="date">
      <?php
      include 'vars.php';
      echo $podcast[2]['date'];
      ?>
    </p>
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
    <p class="date">
      <?php
      include 'vars.php';
      echo $podcast[3]['date'];
      ?>
    </p>
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
  <script src="./script.js"></script>
</body>

</html>