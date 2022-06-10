<?php

session_start();

include __DIR__ . '/../../utils/renderer.php';

?>

<!DOCTYPE html>
<html lang="en">

<?php
include '../../shared/includes/head.php';
?>
<!-- My styles -->
<link rel="stylesheet" href="../../css/navbar_styles.css" media="all">
<link rel="stylesheet" href="../../css/body_styles.css" media="all">
<link rel="stylesheet" href="css/register_styles.css" media="all">
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
        <h2 class="yetid-font">Sign up</h2>
        <form action="controller/save_user.php" method="POST">
          <div class="form-group">
            <label class="form-label" for="username">Username</label> <br>
            <input class="username" type="text" name="username"> <br>
          </div>

          <div class="form-group">
            <label class="form-label" for="password">Password</label> <br>
            <input class="password" type="password" name="password"> <br>
            <div class="checkbox">
              <input class="password-checkbox" type="checkbox" name="show-password"> <label for="show-password">Show password</label>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label confirm-password-label" class="form-label" for="confirm-password">Confirm password</label> <br>
            <input class="confirm-password" type="password" name="confirm-password"> <br>
          </div>

          <div class="form-group">
            <input class="btn btn-register form-control form-btn" type="submit" name="submit" value="Register"> <br>
            <a class="btn-go-to-login form-control" href="http://localhost/stf/yetid/src/routes/login/login.php">Already have an account?</a>
          </div>
        </form>
      </div>
    </div>

    <div class="col-3"></div>
  </div>


  <?php
  include '../../shared/includes/scripts.php';
  ?>

  <script src="js/checkboxPassword.js"></script>
</body>

</html>
