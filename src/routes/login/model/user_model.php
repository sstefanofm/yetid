<?php

include __DIR__ . "/user_database.php";

class UserModel
{
  private $username;
  private $password;
  private $database;

  function __construct($username, $password)
  {
    $this->username = $username;
    $this->password = $password;
    $this->database = new UserDatabase();
  }

  function check_username()
  {
    return $this->database->check_existing_user($this->username);
  }

  function check_credentials()
  {
    $user = $this->database->get_user($this->username);

    if (count($user) <= 0) {
      return false;
    }

    $db_password = $this->database->get_user_password($user['username']);

    if (strcmp($this->password, $db_password) == 0) {
      return true;
    }
    return false;
  }
}
