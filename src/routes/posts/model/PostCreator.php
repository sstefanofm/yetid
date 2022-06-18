<?php

include __DIR__ . '/../../../shared/model/Database.php';

class PostCreator extends Database
{
  private function insert_query($title, $content, $username)
  {
    return "INSERT INTO posts (title, content, username) VALUES ('$title', '$content', '$username')";
  }

  function run($title, $content, $username)
  {
    return $this->connection->query($this->insert_query($title, $content, $username));
  }
}
