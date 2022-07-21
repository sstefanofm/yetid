<?php

include __DIR__ . '/../routes/posts/view/PostsRenderer.php';

$posts_renderer = new PostsRenderer();

$page_number = (!isset($_GET['page']) || $_GET['page'] <= 0) ? 1 : (int) $_GET['page'];

$logged = $_SESSION['logged_in'];

if ($logged) {
  // max number of results coming from the database (when using "LIMIT $row_start, $max_results")
  $max_results = 5;
  // from which row of the sql table the results start (when using "LIMIT $row_start, $max_results")
  $row_start = ($page_number - 1) * $max_results;

  $username = $_SESSION['username'];
  $total_posts = $posts_renderer->count_total_posts($username);
  $max_pages = ceil($total_posts / $max_results);

  $order_by = isset($_SESSION['order_by']) ? $_SESSION['order_by'] : "DESC";

  $posts_renderer->load_posts($row_start, $max_results, $order_by, $username);
}

?>

<div class="posts-container default-border">
  <div class="posts-header default-border">
    <button class="btn btn-colors btn-home">Home</button>
    <button class="btn btn-colors btn-explore">Explore</a></button>
    <?php
    if ($_SESSION['logged_in']) {
    ?>
      <button class="btn btn-colors btn-create"><span class="add-sign">[+]</span>&nbsp;Create</button>
    <?php
    }
    ?>
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

  <div class="posts-body default-border">
    <?php
    if (!$logged) {
    ?>
      <p class="not-logged">You have to be logged in to see your posts</p>
      <div class="not-logged">
        <a class="btn btn-secondary" href="routes/login/login.php">Log in</a>
      </div>
    <?php
    } else {
      for ($i = 0; $i < $max_results; $i++) {
        if (!$posts_renderer->is_empty()) {
          $posts_renderer->render_next();
        } else {
          continue;
        }
      }
    }
    ?>
  </div>

  <div class="posts-footer default-border">
    <div class="pages-numbers">
      <?php
      if ($page_number > 1) {
        for ($i = 1; $i < $page_number; $i++) {
      ?>
          <button class="btn btn-page"><?php echo $i ?></button>
      <?php
        }
      }
      ?>
      <button class="btn btn-page current-page"><?php echo $page_number ?></button>
      <?php
      for ($i = $page_number + 1; $i < $max_pages + 1; $i++) {
      ?>
        <button class="btn btn-page"><?php echo $i ?></button>
      <?php
      }
      ?>
    </div>
  </div>
</div>

<script src="js/orderByButton.js"></script>
<script src="js/goToPage.js"></script>
<script src="js/goToExplore.js"></script>
<script src="js/clickPost.js"></script>
