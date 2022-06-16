<?php

include __DIR__ . '/post_database.php';

class PostModel
{
  private $database;

  function __construct()
  {
    $this->database = new PostDatabase();
  }

  function get_posts($row_start, $max_results, $order_by)
  {
    return $this->database->get($row_start, $max_results, $order_by);
  }

  function get_all()
  {
    return $this->database->get_all();
  }
}
