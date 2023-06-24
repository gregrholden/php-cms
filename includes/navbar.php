<?php

$active   = "class='nav-link active' aria-current='page'";
$inactive = "class='nav-link'";

?>

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/webProg1/COSC630/">Holden</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a <?php if ($_SERVER['SCRIPT_NAME'] == "/webProg1/COSC630/index.php") {
                echo $active;
              } else {
                echo $inactive;
              }
              ?> href="/webProg1/COSC630/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a <?php if ($_SERVER['SCRIPT_NAME'] == "/webProg1/COSC630/about.php") {
                echo $active;
              } else {
                echo $inactive;
              }
              ?> href="/webProg1/COSC630/about.php">About</a>
        </li>
        <li class="nav-item">
          <a <?php if ($_SERVER['SCRIPT_NAME'] == "/webProg1/COSC630/gallery.php") {
                echo $active;
              } else {
                echo $inactive;
              }
              ?> href="/webProg1/COSC630/gallery.php">Gallery</a>
        </li>
        <?php
        if (!is_logged_in()) {
        ?>
          <li class="nav-item">
            <a <?php if ($_SERVER['SCRIPT_NAME'] == "/webProg1/COSC630/login.php") {
                  echo $active;
                } else {
                  echo $inactive;
                }
                ?> href="/webProg1/COSC630/login.php">Login</a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="/webProg1/COSC630/handlers/logout.php">Logout</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>

<?php include 'includes/subheader.php'; ?>
