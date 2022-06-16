<?php

include __DIR__ . '/../controller/posts_getter.php';

class RenderPost
{
  private $posts_getter;

  function __construct()
  {
    $this->posts_getter = new PostsGetter();
  }

  function load_posts($row_start, $max_results, $order_by, $username)
  {
    $this->posts_getter->load_posts($row_start, $max_results, $order_by, $username);
  }

  function render_next()
  {
    $post = $this->posts_getter->get_next();
?>
    <div class="post default-border">
      <div class="post-user">
        <?php
        echo $post['username'];
        ?>
      </div>
      <div class="post-content">
        <?php
        echo $post['post'];
        ?>
      </div>
    </div>
<?php
  }

  function is_empty()
  {
    return $this->posts_getter->is_empty();
  }

  function count_total_posts($username)
  {
    return $this->posts_getter->count_all($username);
  }
}