<?php

session_start();

include __DIR__ . '/view/UsersRenderer.php';
include __DIR__ . '/../../utils/redirect_to.php';
include __DIR__ . '/../../utils/renderer.php';

if (!$_SESSION['admin']) {
  $_SESSION['success'] = false;
  $_SESSION['message'] = "You have no permissions to see this page.";
  $_SESSION['message_showed'] = false;

  redirect_to_index();

  die();
}

$max_results = 5;

$getter = new UsersRenderer();

// fetch number of users to show pages;
$total_users = $getter->count_total_users();
$max_pages = ceil($total_users / $max_results);

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
      <div class="order-by">
        <button class="btn btn-order-by">
          <?php
          if (strcmp($_SESSION['order_by'], "DESC") == 0 || !isset($_SESSION['order_by'])) {
            echo "Recent";
          } else {
            echo "Old";
          }
          ?> &nbsp;&nbsp;<span class="order-sign">^</span>&nbsp;</button>

        <div class="order-by-content hidden">
          <button class="btn btn-option btn-recent">Most recent</button>
          <button class="btn btn-option btn-old">Most old</button>
        </div>
      </div>
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
      <div class="pages-numbers">
        <?php
        if ($current_page > 1) {
          for ($i = 1; $i < $current_page; $i++) {
        ?>
            <button class="btn btn-page"><?php echo $i ?></button>
        <?php
          }
        }
        ?>
        <button class="btn btn-page current-page"><?php echo $current_page ?></button>
        <?php
        for ($i = $current_page + 1; $i < $max_pages + 1; $i++) {
        ?>
          <button class="btn btn-page"><?php echo $i ?></button>
        <?php
        }
        ?>
      </div>
    </div>
  </div>

  <script src="js/goToPage.js"></script>
  <script src="js/orderByButton.js"></script>
  <script src="js/deleteUser.js"></script>

  <?php
  include __DIR__ . '/../../includes/scripts.php';
  ?>
</body>

</html>
