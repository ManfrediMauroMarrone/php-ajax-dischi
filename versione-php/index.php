<?php
include '../dischi.php';
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../dist/app.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Andika+New+Basic:ital@1&display=swap" rel="stylesheet">
  </head>
  <body>
    <header>
      <div class="container">
        <div class="header-container">
          <div class="logo">
            <img src="icons/spotify.png" alt="">
          </div>

          <h1>PHP-Dischi</h1>

        </div>
      </div>
    </header>
    <main>
      <div class="container">
        <div class="card-container">
          <?php foreach ($dischi as $disco) { ?>
            <div class="card">
              <div class="image">
                <img src="<?php echo $disco['poster']; ?>" alt="">

              </div>
              <h2><?php  echo $disco['title'] ?></h2>
              <em><?php  echo $disco['author'] ?></em>
              <small><?php  echo $disco['year'] ?></small>

            </div>
            <?php
          } ?>
        </div>
      </div>
    </main>
  </body>
</html>
