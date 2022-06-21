<?php

session_start();

include __DIR__ . '/../../utils/renderer.php';
include __DIR__ . '/../../utils/redirect_to.php';
include __DIR__ . '/controller/UsersLoader.php';

if (!$_SESSION['admin']) {
  $_SESSION['success'] = false;
  $_SESSION['message'] = "You have no permissions to see this page.";
  $_SESSION['message_showed'] = false;

  redirect_to_index();

  die();
}

// query the user from the db using provided id;
$id = $_GET['id'];

$loader = new UsersLoader();

$user = $loader->get_one_user($id);

?>

<!DOCTYPE html>
<html lang="en">

<?php
include __DIR__ . '/../../includes/head.php';
?>
<!-- My styles -->
<link rel="stylesheet" href="../../css/navbar_styles.css" media="all">
<link rel="stylesheet" href="../../css/body_styles.css" media="all">
<link rel="stylesheet" href="css/update_user_styles.css" media="all">

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
        <h2 class="yetid-font">Edit user #<?php echo $id ?></h2>
        <form id="form" action="controller/update_user.php?id=<?php echo $id ?>" method="POST">
          <div class="form-group">
            <label class="form-label" for="username">Username</label> <br>
            <input class="username" type="text" name="username" value="<?php echo $user['username'] ?>"> <br>
          </div>

          <div class="form-group">
            <label class="form-label" for="password">Password</label> <br>
            <input class="password" type="password" name="password" value="<?php echo $user['password'] ?>"> <br>
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
              <?php
              if ($user['role'] == 1) {
              ?>
                <input class="form-check-input" type="radio" name="role" value="1" <?php if ($user['role'] == 1) echo 'checked' ?> required>
              <?php
              }
              ?>
              <label class="form-check-label" for="admin">Admin</label>

              <br>

              <input class="form-check-input" type="radio" name="role" value="2" <?php if ($user['role'] == 2) echo 'checked' ?> required>
              <label class="form-check-label" for="normal">Normal user</label>
            </div>
          </div>

          <div class="form-group">
            <input class="btn btn-edit-user form-control form-btn" type="submit" name="submit" value="Update user"> <br>
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
  <script src="js/updateUser.js"></script>
</body>

</html>
