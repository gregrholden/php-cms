<?php include __DIR__ . "/../includes/db.php"; ?>
<?php include __DIR__ . "/includes/admin-header.php"; ?>
<?php include __DIR__ . "/includes/admin-navbar.php"; ?>

<section class="container col mt-5 ms-5">
  <form action="./upload.php" method="POST" enctype="multipart/form-data" class="mt-5 ms-5">
    Select an image to upload:
    <input type="file" name="media" id="mediaToUpload" />
    <input type="submit" value="Upload Media" name="submit" />
  </form>


</section>
<?php include __DIR__ . "/includes/admin-footer.php"; ?>
