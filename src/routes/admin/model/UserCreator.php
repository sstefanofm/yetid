<?php

include __DIR__ . '/../../../shared/model/Database.php';

class UserCreator extends Database
{
  private function insert_query($username, $password, $role)
  {
    return "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role');";
  }

  function run($username, $password, $role)
  {
    return $this->connection->query($this->insert_query($username, $password, $role));
  }
}
