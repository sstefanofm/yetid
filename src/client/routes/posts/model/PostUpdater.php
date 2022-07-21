<?php

include __DIR__ . '/../../../shared/model/Database.php';

class PostUpdater extends Database
{
  private function update_query($id, $title, $main_subtitle, $main_content, $content)
  {
    return "UPDATE posts SET title = '$title', main_subtitle = '$main_subtitle', main_content = '$main_content', content = '$content' WHERE id = '$id'";
  }

  function run($id, $title, $main_subtitle, $main_content, $content)
  {
    return $this->connection->query($this->update_query($id, $title, $main_subtitle, $main_content, $content));
  }
}
