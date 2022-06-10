<?php

include __DIR__ . "/../../../shared/model/database.php";

class UserDatabase extends Database
{
  function save($username, $password)
  {
    $insert_query = "INSERT INTO users (username, password) VALUES ('$username', '$password');";

    mysqli_query($this->connection, $insert_query);
  }
}
