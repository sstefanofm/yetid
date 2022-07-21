<?php

include __DIR__ . '/../../../shared/model/Database.php';

class UserUpdater extends Database
{
  private function run_query($query)
  {
    return $this->connection->query($query);
  }

  private function update_user_query($id, $username, $password, $role)
  {
    return "UPDATE users SET username = '$username', password = '$password', role = '$role' WHERE id = '$id';";
  }

  function run($id, $username, $password, $role)
  {
    return $this->run_query($this->update_user_query($id, $username, $password, $role));
  }
}
