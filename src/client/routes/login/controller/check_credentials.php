<?php

session_start();

include __DIR__ . '/../model/UsersDatabase.php';
include __DIR__ . '/../../../utils/redirect_to.php';

$username = $_POST['username'];
$password = $_POST['password'];

if (empty($username) || empty($password)) {
  $_SESSION['success'] = false;
  $_SESSION['message'] = "You have to enter a username and a password.";
  $_SESSION['message_showed'] = false;

  redirect_to_login();

  die();
}

$users_database = new UsersDatabase();

$db_password = $users_database->get_user_password($username);

$is_admin = $users_database->get_user_role($username) == 1;


if (!$users_database->check_existing_user($username) || strcmp($password, $db_password) != 0) {
  $_SESSION['success'] = false;
  $_SESSION['message'] = "Invalid username or password.";
  $_SESSION['message_showed'] = false;

  redirect_to_login();

  die();
}

$_SESSION['success'] = true;
$_SESSION['message'] = "You are now logged in.";
$_SESSION['message_showed'] = false;
$_SESSION['logged_in'] = true;
$_SESSION['admin'] = $is_admin;
$_SESSION['username'] = $username;

redirect_to_index();
