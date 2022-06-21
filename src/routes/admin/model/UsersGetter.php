<?php

include __DIR__ . '/../../../shared/model/Database.php';

class UsersGetter extends Database
{
  private function run_query($query)
  {
    return $this->connection->query($query);
  }

  private function select_query()
  {
    return "SELECT * FROM users;";
  }

  private function select_users_query($row_start, $max_results, $order_by)
  {
    return "SELECT * FROM users ORDER BY id $order_by LIMIT $row_start, $max_results;";
  }

  private function select_one_query($id)
  {
    return "SELECT * FROM users WHERE id ='$id';";
  }

  function count_all()
  {
    return mysqli_num_rows($this->run_query($this->select_query()));
  }

  function get_users($row_start, $max_results, $order_by)
  {
    return $this->run_query($this->select_users_query($row_start, $max_results, $order_by));
  }

  function get_one_user($id)
  {
    return mysqli_fetch_array($this->run_query($this->select_one_query($id)));
  }
}
