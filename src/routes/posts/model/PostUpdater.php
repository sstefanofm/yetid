<?php

include __DIR__ . '/../../../shared/model/Database.php';

class PostUpdater extends Database
{
  private function update_query($id, $title, $content)
  {
    return "UPDATE posts SET title = '$title', content = '$content' WHERE id = '$id'";
  }

  function run($id, $title, $content)
  {
    return $this->connection->query($this->update_query($id, $title, $content));
  }
}
