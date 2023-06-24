<div class='container navbar navbar-light justify-content-end'>
  <div>
    <?php
    if (isset($_SESSION['uid']) && isset($_SESSION['fname'])) { ?>
      <span class='navbar-text pe-4'>Welcome, <a href="/webProg1/COSC630/admin/index.php"><?php echo $_SESSION['fname'] ?></a>!</span>
    <?php } else { ?>
      <span class='navbar-text pe-4'>
        Please <a class='fs-6 fw-light' href='/webProg1/COSC630/login.php'>Login</a> /
        <a class='fs-6 fw-light' href='/webProg1/COSC630/register.php'>Register</a>.
      </span>
    <?php } ?>
  </div>
</div>
