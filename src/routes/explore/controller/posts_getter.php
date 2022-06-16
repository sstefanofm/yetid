<?php

include __DIR__ . '/../model/post_model.php';

class PostsGetter
{
  private $post_model;
  private $posts;
  private $turns;

  function __construct()
  {
    $this->post_model = new PostModel();
  }

  function load_posts($row_start, $max_results, $order_by)
  {
    $this->posts = $this->post_model->get_posts($row_start, $max_results, $order_by);
  }

  function get_next()
  {
    $this->turns++;

    return mysqli_fetch_array($this->posts);
  }

  function is_empty()
  {
    if ($this->turns >= mysqli_num_rows($this->posts)) {
      return true;
    }
    return false;
  }

  function count_all()
  {
    return mysqli_num_rows($this->post_model->get_all());
  }
}
