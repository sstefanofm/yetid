<?php

include 'user_database.php';

class UserModel
{
  private $username;
  private $password;
  private $confirm_password;
  private $database;

  function __construct($username, $password, $confirm_password)
  {
    $this->username = $username;
    $this->password = $password;
    $this->confirm_password = $confirm_password;
    $this->database = new UserDatabase();
  }

  function check_passwords()
  {
    if (strcmp($this->password, $this->confirm_password) == 0) {
      return true;
    }
    return false;
  }

  function create_user()
  {
    $this->database->save($this->username, $this->password);

    return true;
  }
}
