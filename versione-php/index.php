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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>
  </head>
  <body>
    <header>
      <div class="container">
        <div class="header-container">
          <div class="logo">
            <img src="../icons/spotify.png" alt="">
          </div>

          <h1>PHP-Dischi</h1>

        </div>
      </div>
    </header>
    <main>
      <div class="container">
        <div class="genre-selector">
          <select id="filter">
            <option value="">--select genre--</option>
            <?php foreach ($genres as $genre) { ?>
              <option value="<?php echo $genre ?>">
                  <?php echo $genre ?>
              </option>
              <?php
            }?>
          </select>
        </div>
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
    <script id="card-template" type="text/x-handlebars-template">
      <div class="card">
        <img src="{{ poster }}" alt="">
        <h2>{{ title }}</h2>
        <em>{{ author }}</em>
        <small>{{ year }}</small>
      </div>
    </script>

    <script src="../main.js" charset="utf-8"></script>
  </body>
</html>
