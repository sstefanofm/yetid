<?php

class Database
{
  private $host = 'localhost';
  private $user = 'stf';
  private $password = '123';
  private $database_name = 'yetid';
  public $connection;

  function __construct()
  {
    $this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->database_name);
  }
}
