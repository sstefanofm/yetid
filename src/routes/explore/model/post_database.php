<?php

include __DIR__ . '/../../../shared/model/database.php';

class PostDatabase extends Database
{
  private function select_posts_query($row_start, $max_results, $order_by)
  {
    return "SELECT * FROM posts ORDER BY id $order_by LIMIT $row_start, $max_results;";
  }

  private function select_all_query()
  {
    return "SELECT * FROM posts;";
  }

  function get($row_start, $max_results, $order_by)
  {
    return mysqli_query($this->connection, $this->select_posts_query($row_start, $max_results, $order_by));
  }

  function get_all()
  {
    return mysqli_query($this->connection, $this->select_all_query());
  }
}