<?php

include __DIR__ . '/../../../shared/model/database.php';

class UserDatabase extends Database
{
  private function select_by_username_query($username)
  {
    return "SELECT * FROM users WHERE username = '$username';";
  }

  private function run_query($username)
  {
    return mysqli_query($this->connection, $this->select_by_username_query($username));
  }

  function check_existing_user($username)
  {
    $result = $this->run_query($username);

    if (mysqli_num_rows($result) > 0) {
      return true;
    }
    return false;
  }

  function get_user($username)
  {
    $result = $this->run_query($username);

    if (mysqli_num_rows($result) <= 0) {
      return [];
    }

    return mysqli_fetch_assoc($result);
  }

  function get_user_password($username)
  {
    $result = $this->run_query($username);
    return mysqli_fetch_assoc($result)['password'];
  }
}
