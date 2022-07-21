<?php

// receive data;

$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm-password'];

// try to create user in db;

// send json encoded response;

echo json_encode($arr);
