<?php

include __DIR__ . '/../routes/posts/view/PostsRenderer.php';
include __DIR__ . '/../shared/pagination/PagesNumbers.php';
include __DIR__ . '/../shared/renderers/create_button.php';
include __DIR__ . '/../shared/renderers/order_by_button.php';
include __DIR__ . '/../shared/renderers/not_logged_message.php';

$max_results = 5;
$posts_renderer = new PostsRenderer();
$pages_numbers = new PagesNumbers($posts_renderer, $max_results);

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
    render_create_button($logged);
    render_order_by_button();
    ?>

  </div>

  <div class="posts-body default-border">
    <?php
    render_not_logged_message($logged);
    ?>
    <?
    if ($logged) {
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
    <?php
    $pages_numbers->render();
    ?>
  </div>
</div>

<script src="js/goToPage.js"></script>
<script src="js/goToExplore.js"></script>
<script src="js/clickPost.js"></script>
