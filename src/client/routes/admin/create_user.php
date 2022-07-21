<?php

session_start();

include __DIR__ . '/../../utils/renderer.php';
include __DIR__ . '/../../utils/redirect_to.php';

if (!$_SESSION['admin']) {
  $_SESSION['success'] = false;
  $_SESSION['message'] = "You have no permissions to see this page.";
  $_SESSION['message_showed'] = false;

  redirect_to_index();

  die();
}

?>

<!DOCTYPE html>
<html lang="en">

<?php
include __DIR__ . '/../../includes/head.php';
?>
<!-- My styles -->
<link rel="stylesheet" href="../../css/navbar_styles.css" media="all">
<link rel="stylesheet" href="../../css/body_styles.css" media="all">
<link rel="stylesheet" href="css/create_user_styles.css" media="all">
</head>

<body>
  <?php
  include __DIR__ . '/../../includes/navbar.php';
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
        <h2 class="yetid-font">Create new user</h2>
        <form id="form" action="controller/upload_user.php" method="POST">
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
            <p class="form-label role-label" for="role">User role</p>
            <div class="user-roles">
              <input class="form-check-input" type="radio" name="role" value="1" required>
              <label class="form-check-label" for="admin">Admin</label>

              <br>

              <input class="form-check-input" type="radio" name="role" value="2" required>
              <label class="form-check-label" for="normal">Normal user</label>
            </div>
          </div>

          <div class="form-group">
            <input class="btn btn-create-user form-control form-btn" type="submit" name="submit" value="Create user"> <br>
            <a class="btn-go-to-login form-control" href="http://localhost/stf/yetid/src/routes/login/login.php">Already have an account?</a>
          </div>
        </form>
      </div>
    </div>

    <div class="col-3"></div>
  </div>


  <?php
  include __DIR__ . '/../../includes/scripts.php';
  ?>

  <script src="js/checkboxPassword.js"></script>
  <script src="js/uploadUser.js"></script>
</body>

</html>
