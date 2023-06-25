<?php include __DIR__ . "/includes/db.php"; ?>
<?php include __DIR__ . "/includes/header.php"; ?>

<?php

if_logged_in_then_redirect_to($BASE_URL . 'index.php');

if (is_method('post')) {
  if (isset($_POST['username']) && isset($_POST['password'])) {
    login($_POST['username'], $_POST['password']);
    // var_dump($stmt);
    if (isset($_SESSION['uid'])) {
      redirect_to($BASE_URL . 'index.php');
    } else {
      redirect_to($BASE_URL . 'login.php');
    }
  } else {
    redirect_to($BASE_URL . 'login.php');
  }
}

$msg = '';
if (isset($_SESSION['login_err'])) {
  $msg = "<div><p class='bg-danger bg-gradient rounded text-light text-center p-3'>" . $_SESSION['login_err'] . "</p></div>";
}

?>

<div class="container mt-5 mb-3">
  <div class="row d-flex justify-content-center">
    <div class="col-md-4">
      <h2 class="text-center">Login</h2>
      <?php
      if (!empty($msg)) {
        echo $msg;
      }
      ?>
      <form id="login-form" class="form" method="POST">
        <div class="form-group">
          <div class="input-group">
            <input name="username" type="text" class="form-control" placeholder="Enter Username" />
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <input name="password" type="password" class="form-control" placeholder="Enter Password" />
          </div>
        </div>
        <br>
        <div class="form-group text-center">
          <input name="login" class="btn btn-primary btn-block" value="Login" type="submit">
          <input name="reset" class="btn btn-danger btn-block" value="Reset" type="reset">
        </div>
      </form>
    </div>
  </div>
  <p class='fs-6 fw-light text-center mt-5'>Need an account? <a href=<?php echo $BASE_URL . 'register.php'; ?>>Register here</a>.</p>
</div>

<?php
// Unset error messages when page finishes loading.
unset($_SESSION['login_err']);
?>

<!-- End of Document: Footer -->
<?php include __DIR__ . "/includes/footer.php"; ?>
