<?php include __DIR__ . "/../includes/db.php"; ?>
<?php include __DIR__ . '/includes/admin-header.php'; ?>
<?php include __DIR__ . '/includes/admin-navbar.php'; ?>
<?php $abstracts = get_content_trunc(); ?>

<section class="container col mt-5 ms-5">
  <a href=<?php echo $BASE_URL . "admin/add-post.php"; ?> type="button" class="btn btn-primary">Add New Post</a>
  <div>
    <?php var_dump($abstracts); ?>
  </div>
</section>

<?php include __DIR__ . "/includes/admin-footer.php"; ?>
