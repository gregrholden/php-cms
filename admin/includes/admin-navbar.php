<?php

$active   = "class='nav-link active' aria-current='page'";
$inactive = "class='nav-link link-dark'";

?>

<div class="row">
  <nav class="d-inline-flex flex-column vh-100 p-3 ms-1 bg-light" style="width: 240px;">
    <div class='row'>
      <ul class="nav navbar navbar-brand">
        <li class="nav-item">
          <a href="/webProg1/COSC630/admin/index.php" class="nav-link link-dark ps-3">
            Holden Logo
          </a>
        </li>
      </ul>
    </div>
    <hr>
    <div class='row flex-grow-1'>
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a <?php if ($_SERVER['SCRIPT_NAME'] == "/webProg1/COSC630/admin/index.php") {
                echo $active;
              } else {
                echo $inactive;
              } ?> href="/webProg1/COSC630/admin/index.php">
            <span class="fa-solid fa-landmark me-3"></span>Dashboard
          </a>
        </li>
        <li>
          <a <?php if ($_SERVER['SCRIPT_NAME'] == "/webProg1/COSC630/admin/posts.php") {
                echo $active;
              } else {
                echo $inactive;
              } ?> href="/webProg1/COSC630/admin/posts.php">
            <span class="fa-solid fa-paragraph me-3"></span> Posts
          </a>
        </li>
        <li>
          <a <?php if ($_SERVER['SCRIPT_NAME'] == "/webProg1/COSC630/admin/media.php") {
                echo $active;
              } else {
                echo $inactive;
              } ?> href="/webProg1/COSC630/admin/media.php">
            <span class="fa-solid fa-images me-3"></span>Media
          </a>
        </li>
        <li class="nav-item">
          <a <?php if ($_SERVER['SCRIPT_NAME'] == "/webProg1/COSC630/admin/account.php") {
                echo $active;
              } else {
                echo $inactive;
              } ?> href="/webProg1/COSC630/admin/account.php">
            <span class="fa-solid fa-user-astronaut me-3"></span> Account
          </a>
        </li>
      </ul>
    </div>
    <hr>
    <div class="row">
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a href="/webProg1/COSC630/index.php" class="nav-link link-dark">
            <span class="fa-solid fa-right-to-bracket me-2"></span> Return to Site
          </a>
        </li>
      </ul>
    </div>
  </nav>
