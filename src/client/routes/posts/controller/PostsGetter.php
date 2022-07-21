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

  function load_some($row_start, $max_results, $order_by, $username)
  {
    $this->posts = $this->posts_database->get_some($row_start, $max_results, $order_by, $username);
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

  function count_all($username)
  {
    return mysqli_num_rows($this->posts_database->get_all($username));
  }

  function get_one($id, $username)
  {
    return mysqli_fetch_array($this->posts_database->get_one($id, $username));
  }

  function get_by_id($id)
  {
    return mysqli_fetch_array($this->posts_database->get_by_id($id));
  }
}
