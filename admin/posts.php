<?php include __DIR__ . "/../includes/db.php"; ?>
<?php include __DIR__ . '/includes/admin-header.php'; ?>
<?php include __DIR__ . '/includes/admin-navbar.php'; ?>
<?php $abstracts = get_content_trunc(); ?>

<section class="container col mt-5 ms-5">
  <a href=<?php echo $BASE_URL . "admin/add-post.php"; ?> type="button" class="btn btn-primary mb-5">Add New Post</a>

  <?php foreach($abstracts as $item) {
    $auth_name = get_user_name($item['uid']);
    $dt = strtotime($item['updated']);
    $updated = date('M j, Y', $dt);
    echo '
          <div class="card border-secondary mb-3 w-100">
            <div class="card-header fw-lighter">By: '. $auth_name["fname"] . " " . $auth_name["lname"] . '</div>
            <div class="card-body">
              <h5 class="card-title">' . $item["title"] . '</h5>
              <p class="card-text">' . $item["abstract"] . '...</p>
              <a class="stretched-link" href="#"></a>
            </div>
            <div class="card-footer bg-transparent fw-lighter text-end">Last updated: ' . $updated . '</div>
          </div>
        ';
  } ?>

</section>

<?php include __DIR__ . "/includes/admin-footer.php"; ?>
