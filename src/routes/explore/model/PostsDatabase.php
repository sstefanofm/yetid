<?php

include __DIR__ . '/../../../shared/model/Database.php';

class PostsDatabase extends Database
{
  private function select_all_query()
  {
    return "SELECT * FROM posts;";
  }

  private function select_posts_query($row_start, $max_results, $order_by)
  {
    return "SELECT * FROM posts ORDER BY id $order_by LIMIT $row_start, $max_results;";
  }

  function get_all()
  {
    return mysqli_query($this->connection, $this->select_all_query());
  }

  function get_posts($row_start, $max_results, $order_by)
  {
    return mysqli_query($this->connection, $this->select_posts_query($row_start, $max_results, $order_by));
  }
}
