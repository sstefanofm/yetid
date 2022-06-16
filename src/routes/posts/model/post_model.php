<?php

include __DIR__ . '/post_database.php';

class PostModel
{
  private $database;

  function __construct()
  {
    $this->database = new PostDatabase();
  }

  function create_post($username, $post_data)
  {
    $this->database->save($username, $post_data);

    return true;
  }

  function get_posts($row_start, $max_results, $order_by, $username)
  {
    return $this->database->get($row_start, $max_results, $order_by, $username);
  }

  function get_all($username)
  {
    return $this->database->get_all($username);
  }
}
