<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php session_start(['cookie_httponly' => true]); ?>
<?php include 'includes/functions.php'; ?>

<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap theme -->
  <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css" />
  <!-- FontAwesome Icons/CSS -->
  <link rel="stylesheet" type="text/css" href="./css/fontawesome/css/all.min.css" />
  <!-- Custom CSS Overrides -->
  <link rel="stylesheet" type="text/css" href="./css/styles.css" />
</head>
<!-- Open body tag here so we don't have to worry about it on every page. -->

<body>

  <?php include "includes/navbar.php" ?>
