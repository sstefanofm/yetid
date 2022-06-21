<?php

include __DIR__ . '/../../../shared/model/Database.php';

class PostCreator extends Database
{
  private function insert_query($title, $content, $username, $main_subtitle)
  {
    return "INSERT INTO posts (title, content, username, main_subtitle) VALUES ('$title', '$content', '$username', '$main_subtitle')";
  }

  function run($title, $content, $username, $main_subtitle)
  {
    return $this->connection->query($this->insert_query($title, $content, $username, $main_subtitle));
  }
}
