<?php include __DIR__ . "/includes/db.php"; ?>
<?php include __DIR__ . "/includes/header.php"; ?>
<?php $abstracts = get_content_trunc(); ?>

<div class="container">
  <h1>Homepage</h1>
  <section class="col mt-5 ms-5">

    <?php foreach ($abstracts as $item) {
      $auth_name = get_user_name($item['uid']);
      $dt = strtotime($item['updated']);
      $updated = date('M j, Y', $dt);
      echo '
          <div class="card border-secondary mb-3 w-100">
            <div class="card-header fw-lighter">By: ' . $auth_name["fname"] . " " . $auth_name["lname"] . '</div>
            <div class="card-body">
              <h5 class="card-title">' . $item["title"] . '</h5>
              <p class="card-text">' . $item["abstract"] . '...</p>
              <a class="stretched-link" href="' . $BASE_URL . 'article.php?id=' . $item['cid'] . '"></a>
            </div>
            <div class="card-footer bg-transparent fw-lighter text-end">Last updated: ' . $updated . '</div>
          </div>
        ';
    } ?>

  </section>
</div>

<?php include __DIR__ . "/includes/footer.php"; ?>
