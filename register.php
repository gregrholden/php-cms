<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<?php

if_logged_in_then_redirect_to($BASE_URL . 'index.php');

if (is_method('post')) {
  if (
    isset($_POST['username']) && isset($_POST['password1'])
    && isset($_POST['fname']) && isset($_POST['lname'])
    && isset($_POST['email'])
  ) {
    $msg = '';
    // Send registration data to backend.
    register_closed($_POST['username'], $_POST['password1'], $_POST['fname'], $_POST['lname'], $_POST['email']);
    if (isset($_SESSION['reg_status']) && isset($_SESSION['reg_msg'])) {
      if ($_SESSION['reg_status'] < 1) {
        $msg = "<div><p class='bg-danger bg-gradient rounded text-light text-center p-3'>" . $_SESSION['reg_msg'] . "</p></div>";
      } else {
        $msg = "<div><p class='bg-success bg-gradient rounded text-light text-center p-3'>" . $_SESSION['reg_msg'] . "</p></div>";
      }
    }
  } else {
    redirect_to($BASE_URL . 'register.php');
  }
}

?>

<div class="container mt-5">
  <div class="row d-flex justify-content-center">
    <div class="col-md-4">
      <h2 class="text-center mb-3">Register</h2>
      <?php
      if (!empty($msg)) {
        echo $msg;
      }
      ?>
      <form name="registration_form" class="form" method="POST">
        <div class="form-group">
          <div class="input-group">
            <input name="username" required type="text" class="form-control" placeholder="Create Username" />
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <input name="password1" id="pass1" oninput="check()" required type="password" class="form-control" placeholder="Create Password" />
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <input name="password2" id="pass2" oninput="check()" required type="password" class="form-control" placeholder="Re-enter Password" />
          </div>
        </div>
        <br>
        <div class="form-group">
          <div class="input-group">
            <input name="fname" required type="text" class="form-control" placeholder="Enter First Name" />
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <input name="lname" required type="text" class="form-control" placeholder="Enter Last Name" />
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <input name="email" required type="email" class="form-control" placeholder="Enter Email" />
          </div>
        </div>
        <br>
        <div class="form-group text-center">
          <input name="register" class="btn btn-primary btn-block" value="Register" type="submit">
          <input name="reset" class="btn btn-danger btn-block" value="Reset" type="reset">
        </div>
      </form>
    </div>
  </div>
  <p class='fs-6 fw-light text-center mt-5'>Already have an account? <a href=<?php echo $BASE_URL . 'login.php'; ?>>Login here</a>.</p>
</div>

<script type="text/javascript">
  // JavaScript function to set custom validity message on second password field
  // if it doesn't match the first one.
  function check() {
    var input = document.getElementById('pass2');
    if (input.value !== document.getElementById('pass1').value) {
      input.setCustomValidity('Passwords must match');
    } else {
      // input is valid -- reset the error message
      input.setCustomValidity('');
    }
  }
</script>

<?php

// Unset the registration status/msg each time page finishes loading.
unset($_SESSION['reg_status']);
unset($_SESSION['reg_msg']);

?>

<!-- End of Document: Footer -->
<?php include "includes/footer.php"; ?>
