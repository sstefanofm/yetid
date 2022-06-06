<?php

class Database
{
  private $host = 'localhost';
  private $user = 'stf';
  private $password = '123';
  private $database_name = 'yetid';
  private $connection;

  function __construct()
  {
    $this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->database_name);
  }

  function save($username, $password)
  {
    $insert_query = "INSERT INTO users (username, password) VALUES ('$username', '$password');";

    mysqli_query($this->connection, $insert_query);
  }
}
