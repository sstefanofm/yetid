<?php

include __DIR__ . '/../../../shared/model/Database.php';

class UsersDatabase extends Database
{
  private function run_query($query)
  {
    return mysqli_query($this->connection, $query);
  }

  private function select_user_query($username)
  {
    return "SELECT * FROM users WHERE username = '$username';";
  }

  function check_existing_user($username)
  {
    $result = $this->run_query($this->select_user_query($username));

    if (mysqli_num_rows($result) > 0) {
      return true;
    }
    return false;
  }

  function get_user_password($username)
  {
    $result = $this->run_query($this->select_user_query($username));
    return mysqli_fetch_assoc($result)['password'];
  }

  function get_user_role($username)
  {
    $result = $this->run_query($this->select_user_query($username));
    return mysqli_fetch_assoc($result)['role'];
  }
}
