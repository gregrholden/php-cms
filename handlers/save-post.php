<?php session_start(); ?>
<?php include '../../includes/db.php' ?>
<?php include '../../includes/functions.php' ?>

<?php

var_dump($_SESSION);
var_dump($_REQUEST['tinymce-title']);
var_dump($_REQUEST['tinymce-content']);


?>
