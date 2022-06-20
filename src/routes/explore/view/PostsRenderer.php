<?php

include __DIR__ . '/../controller/PostsGetter.php';

class PostsRenderer
{
  private $posts_getter;

  function __construct()
  {
    $this->posts_getter = new PostsGetter();
  }

  function load_posts($row_start, $max_results, $order_by)
  {
    $this->posts_getter->load_posts($row_start, $max_results, $order_by);
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
      <span class="post-title" id="<?php echo $post['id'] ?>">
        <?php
        echo $post['title'];
        ?>
      </span>
    </div>
<?php
  }

  function is_empty()
  {
    return $this->posts_getter->is_empty();
  }

  function count_total_posts()
  {
    return $this->posts_getter->count_all();
  }
}
