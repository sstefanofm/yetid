<?php

session_start();

include '../../shared/view/renderer.php';

?>

<!DOCTYPE html>
<html lang="en">

<?php
include '../../shared/includes/head.php'
?>
<link rel="stylesheet" href="../../css/navbar_styles.css" media="all">
<link rel="stylesheet" href="../../css/body_styles.css" media="all">
<link rel="stylesheet" href="css/login_styles.css" media="all">
</head>

<body>
  <?php
  include '../../shared/includes/navbar.php';
  ?>

  <?php
  if (!$_SESSION['message_showed']) {
    render_alert($_SESSION['success'], $_SESSION['message']);
    $_SESSION['message_showed'] = true;
  }
  ?>

  <div class="row">
    <div class="col-3"></div>

    <div class="col-md-4 card card-body grey-card m-4 row">
      <div class="m-4 m-auto">
        <h2 class="yetid-font">Log in</h2>
        <form action="controller/check_credentials.php" method="POST">
          <div class="form-group">
            <label class="form-label" for="username">Username</label> <br>
            <input class="username" type="text" name="username"> <br>
          </div>

          <div class="form-group">
            <label class="form-label" for="password">Password</label> <br>
            <input class="password" type="password" name="password"> <br>
            <a class="forgot-password" href="#">Forgot your password?</a>
            <div class="checkbox">
              <input class="password-checkbox" type="checkbox" name="show-password"> <label for="show-password">Show password</label>
            </div>
          </div>

          <div class="form-buttons form-group">
            <input class="btn btn-login form-control form-btn" type="submit" name="submit" value="Log in"> <br>
            <button id="register-button" class="btn btn-register form-control form-btn">Create new account</button>
          </div>
        </form>
      </div>
    </div>

    <div class="col-3"></div>
  </div>

  <?php
  include '../../shared/includes/scripts.php';
  ?>

  <script src="js/redirectRegister.js"></script>
  <script src="js/checkboxPassword.js"></script>
</body>

</html>
