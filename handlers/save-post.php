<?php session_start(); ?>

<?php include __DIR__ . '/../config.php'; ?>
<?php include __DIR__ . '/../includes/db.php' ?>
<?php include __DIR__ . '/../includes/functions.php' ?>

<?php

insert_post($_REQUEST['tinymce-title'], $_REQUEST['tinymce-content'], $_SESSION['uid']);

redirect_to($BASE_URL . "admin/posts.php");

?>
