<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php session_start(['cookie_httponly' => true]); ?>
<?php include('../config.php'); ?>
<?php include('../includes/functions.php'); ?>
<?php

// If user is authenticated, do nothing...
if (isset($_SESSION['uid'])) {
} else {
  // ... otherwise, send back to homepage.
  redirect_to($BASE_URL . "index.php");
}

?>

<!DOCTYPE html>
<html lang="en-US">

<head>
  <!-- Define the base URL for site-wide relative links -->
  <base href=<?php echo "http://localhost/" . $BASE_URL; ?>>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap theme -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
  <!-- FontAwesome Icons/CSS -->
  <link rel="stylesheet" type="text/css" href="css/fontawesome/css/all.min.css" />
  <!-- Custom CSS Overrides -->
  <link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>

<!-- Open body tag here so we don't have to worry about it on every page. -->

<body class="container">
