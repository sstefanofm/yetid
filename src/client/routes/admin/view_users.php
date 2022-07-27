<?php

session_start();

include __DIR__ . '/view/UsersRenderer.php';
include __DIR__ . '/../../utils/redirect_to.php';
include __DIR__ . '/../../utils/renderer.php';
include __DIR__ . '/../../shared/pagination/PagesNumbers.php';
include __DIR__ . '/../../shared/renderers/order_by_button.php';

if (!$_SESSION['admin']) {
  $_SESSION['success'] = false;
  $_SESSION['message'] = "You have no permissions to see this page.";
  $_SESSION['message_showed'] = false;

  redirect_to_index();

  die();
}

$max_results = 5;

$getter = new UsersRenderer();
$pages_numbers = new PagesNumbers($getter, $max_results);

// this is to fetch certain posts;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$row_start = ($current_page - 1) * $max_results;
$order_by = isset($_SESSION['order_by']) ? $_SESSION['order_by'] : "DESC";

$getter->load_users($row_start, $max_results, $order_by);

?>

<!DOCTYPE html>
<html>

<?php
include __DIR__ . '/../../includes/head.php';
?>

<!-- My styles -->
<link rel="stylesheet" href="../../css/navbar_styles.css" media="all">
<link rel="stylesheet" href="../../css/body_styles.css" media="all">
<link rel="stylesheet" href="css/view_users_styles.css" media="all">

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

  <div class="container users-container default-border">
    <div class="container users-header">
      <?php
      render_order_by_button($_SESSION['order_by']);
      ?>
    </div>

    <div class="container users-body">
      <table class="table">
        <thead>
          <th scope="col">id</th>
          <th scope="col">Username</th>
          <th scope="col">Password</th>
          <th scope="col">Role</th>
          <th scope="col"></th>
        </thead>

        <tbody>
          <?php
          for ($i = 0; $i < $max_results; $i++) {
            if (!$getter->is_empty()) {
              $getter->render_next();
            }
          }
          ?>
        </tbody>
      </table>
    </div>

    <hr>

    <div class="container users-footer">
      <?php
      $pages_numbers->render();
      ?>
    </div>
  </div>

  <script src="js/goToPage.js"></script>
  <script src="js/deleteUser.js"></script>
  <script src="js/editUser.js"></script>

  <?php
  include __DIR__ . '/../../includes/scripts.php';
  ?>
</body>

</html>
