<?php

include __DIR__ . '/../../../shared/model/database.php';

class PostDatabase extends Database
{
  private function insert_post_query($username, $post)
  {
    return "INSERT INTO posts (username, post) VALUES ('$username', '$post');";
  }

  private function select_posts_query($row_start, $max_results, $order_by, $username)
  {
    return "SELECT * FROM posts WHERE username = '$username' ORDER BY id $order_by LIMIT $row_start, $max_results;";
  }

  private function select_all_query($username)
  {
    return "SELECT * FROM posts WHERE username = '$username';";
  }

  function save($username, $post)
  {
    mysqli_query($this->connection, $this->insert_post_query($username, $post));
  }

  function get($row_start, $max_results, $order_by, $username)
  {
    return mysqli_query($this->connection, $this->select_posts_query($row_start, $max_results, $order_by, $username));
  }

  function get_all($username)
  {
    return mysqli_query($this->connection, $this->select_all_query($username));
  }
}
