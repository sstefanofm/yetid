<?php

include __DIR__ . '/../../../shared/model/Database.php';

class PostCreator extends Database
{
  private function insert_query($title, $content, $username, $main_subtitle, $main_content)
  {
    return "INSERT INTO posts (title, content, username, main_subtitle, main_content) VALUES ('$title', '$content', '$username', '$main_subtitle', '$main_content')";
  }

  function run($title, $content, $username, $main_subtitle, $main_content)
  {
    return $this->connection->query($this->insert_query($title, $content, $username, $main_subtitle, $main_content));
  }
}
