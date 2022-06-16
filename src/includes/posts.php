<?php

session_start();

include __DIR__ . '/../routes/posts/view/render_post.php';

$render_post = new RenderPost();

$page_number = (!isset($_GET['page']) || $_GET['page'] <= 0) ? 1 : (int) $_GET['page'];

// max number of results coming from the database (when using "LIMIT $row_start, $max_results")
$max_results = 5;

// from which row of the sql table the results start (when using "LIMIT $row_start, $max_results")
$row_start = ($page_number - 1) * $max_results;

$order_by = isset($_SESSION['order_by']) ? $_SESSION['order_by'] : "DESC";
$render_post->load_posts($row_start, $max_results, $order_by);
$total_posts = $render_post->count_total_posts();

$max_pages = ceil($total_posts / $max_results);

?>

<div class="posts-container default-border">
  <div class="posts-header default-border">
    <button class="btn btn-colors btn-home">Home</button>
    <button class="btn btn-colors btn-explore">Explore</button>
    <?php
    if ($_SESSION['logged_in']) {
    ?>
      <button class="btn btn-colors btn-create"><span class="add-sign">[+]</span>&nbsp;Create</button>
    <?php
    }
    ?>
    <button class="btn btn-order-by">Order by &nbsp;&nbsp;<span class="order-sign">^</span>&nbsp;</button>

    <div class="order-by-content hidden">
      <button class="btn btn-option btn-recent">Most recent</button>
      <button class="btn btn-option btn-old">Most old</button>
    </div>
  </div>

  <div class="posts-body default-border">
    <?php
    for ($i = 0; $i < $max_results; $i++) {
      if (!$render_post->is_empty()) {
        $render_post->render_next();
      } else {
        continue;
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

<script src="http://localhost/stf/yetid/src/js/orderByButton.js"></script>
<script src="http://localhost/stf/yetid/src/js/goToCreatePost.js"></script>
<script src="http://localhost/stf/yetid/src/js/goToPage.js"></script>
