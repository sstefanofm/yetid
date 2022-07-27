<?php

include __DIR__ . '/../shared/Database.php';

class PostUploader extends Database
{
  function __construct()
  {
    parent::__construct("posts");
  }

  private function insert_query()
  {
    return "INSERT INTO $this->table VALUES (?, ?, ?, ?, ?)";
  }

  function run($user_id, $content, $title, $main_subtitle, $main_content)
  {
    try {
      $stmt = $this->sql->prepare($this->insert_query());
      $stmt->bind_param("issss", $user_id, $content, $title, $main_subtitle, $main_content);
      $stmt->execute();
    } catch (Exception) {
      return false;
    }
    return true;
  }
}
