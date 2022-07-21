<?php

include __DIR__ . '/../../../shared/model/Database.php';

class PostDeletor extends Database
{
  private function delete_query($id)
  {
    return "DELETE FROM posts WHERE id = '$id';";
  }

  function run($id)
  {
    return $this->connection->query($this->delete_query($id));
  }
}
