<?php

include __DIR__ . '/../../../shared/model/Database.php';

class PostUpdater extends Database
{
  private function update_query($id, $content)
  {
    return "UPDATE posts SET post = '$content' WHERE id = '$id'";
  }

  function run($id, $content)
  {
    return $this->connection->query($this->update_query($id, $content));
  }
}
