<?php

include __DIR__ . '/../model/PostsDatabase.php';

class PostsGetter
{
  private $posts_database;
  private $posts;
  private $turns;

  function __construct()
  {
    $this->posts_database = new PostsDatabase();
  }

  function load_posts($row_start, $max_results, $order_by)
  {
    $this->posts = $this->posts_database->get_posts($row_start, $max_results, $order_by);
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
    return mysqli_num_rows($this->posts_database->get_all());
  }
}
