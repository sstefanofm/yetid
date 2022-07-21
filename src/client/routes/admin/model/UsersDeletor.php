<?php

include __DIR__ . '/../../../shared/model/Database.php';

class UsersDeletor extends Database
{
  private function run_query($query)
  {
    return $this->connection->query($query);
  }

  private function delete_query($id)
  {
    return "DELETE FROM users WHERE id = '$id';";
  }

  function run($id)
  {
    return $this->run_query($this->delete_query($id));
  }
}
