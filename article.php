<?php include __DIR__ . "/includes/db.php"; ?>
<?php include __DIR__ . "/includes/header.php"; ?>
<?php

// Parse current page URL into an array.
$parts = parse_url($_SERVER['REQUEST_URI']);
// Assign the query parameter value to a new variable '$query'.
parse_str($parts['query'], $query);

?>


<?php
// Retrieve the current page's content using the $query value.
$item = get_full_content_by_id($query['id']);
$auth_name = get_user_name($item['uid']);
$udt = strtotime($item['updated']);
$updated = date('M j, Y', $udt);
$cdt = strtotime($item['created']);
$created = date('M j, Y', $cdt);
?>

<div class="container">
  <h1><?php echo $item["title"]; ?></h1>
  <section class="col mt-5 ms-5">
    <?php
      echo '
          <div class="card border-light mb-3 w-100">
            <div class="card-header fw-lighter">By: ' . $auth_name["fname"] . " " . $auth_name["lname"] . '</div>
            <div class="card-body">
              <p class="card-text"><em>' . $created . '</em></p>
              <p class="card-text">' . $item["body"] . '</p>
            </div>
            <div class="card-footer bg-transparent fw-lighter text-end">Last updated: ' . $updated . '</div>
          </div>
        ';
    ?>

  </section>
</div>

<?php include __DIR__ . "/includes/footer.php"; ?>
