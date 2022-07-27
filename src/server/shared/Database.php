<?php

class Database
{
  private $host = 'localhost';
  private $user = 'stf';
  private $password = '123';
  private $database_name = 'yetid';
  protected $sql;
  protected $table;

  function __construct($table)
  {
    $this->sql = mysqli_connect($this->host, $this->user, $this->password, $this->database_name);
    $this->table = $table;
  }
}
