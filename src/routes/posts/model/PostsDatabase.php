<?php

include __DIR__ . '/../../../shared/model/Database.php';

class PostsDatabase extends Database
{
  private function run_query($query)
  {
    return $this->connection->query($query);
  }

  private function select_all_query($username)
  {
    return "SELECT * FROM posts WHERE username = '$username';";
  }

  private function select_some_query($row_start, $max_results, $order_by, $username)
  {
    return "SELECT * FROM posts WHERE username = '$username' ORDER BY id $order_by LIMIT $row_start, $max_results;";
  }

  private function select_one_query($id, $username)
  {
    return "SELECT * FROM posts WHERE id = '$id' AND username = '$username';";
  }

  private function select_by_id_query($id)
  {
    return "SELECT * FROM posts WHERE id = '$id';";
  }

  function get_all($username)
  {
    return $this->run_query($this->select_all_query($username));
  }

  function get_some($row_start, $max_results, $order_by, $username)
  {
    return $this->run_query($this->select_some_query($row_start, $max_results, $order_by, $username));
  }

  function get_one($id, $username)
  {
    return $this->run_query($this->select_one_query($id, $username));
  }

  function get_by_id($id)
  {
    return $this->run_query($this->select_by_id_query($id));
  }
}
