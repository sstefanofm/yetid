<?php

include 'database.php';

class UserModel
{
  private $username;
  private $password;
  private $database;

  function __construct($username, $password)
  {
    $this->username = $username;
    $this->password = $password;
    $this->database = new Database();
  }

  function create_user()
  {
    $this->database->save($this->username, $this->password);

    return true;
  }
}
