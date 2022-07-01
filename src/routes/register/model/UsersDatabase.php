<?php

include __DIR__ . "/../../../shared/model/Database.php";

class UsersDatabase extends Database
{
    private function run_query($query)
    {
        return $this->connection->query($query);
    }

    private function insert_query($username, $password)
    {
        return "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '2');";
    }

    function save($username, $password)
    {
        $this->run_query($this->insert_query($username, $password));
    }
}
