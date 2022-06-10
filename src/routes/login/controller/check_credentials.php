<?php

session_start();

include '../../../shared/utils/redirect_to.php';
include '../model/user_model.php';

$username = $_POST['username'];
$password = $_POST['password'];

if (empty($username) || empty($password)) {
  $_SESSION['success'] = false;
  $_SESSION['message'] = "You have to enter a username and a password.";
  $_SESSION['message_showed'] = false;

  redirect_to_login();

  die();
}

// query user from db

$user_model = new UserModel($username, $password);

if (!$user_model->check_username()) {
  $_SESSION['success'] = false;
  $_SESSION['message'] = "Invalid username or password.";
  $_SESSION['message_showed'] = false;

  redirect_to_login();

  die();
}

$user = $user_model->check_credentials();

$_SESSION['logged_in'] = $user;

if ($user_model->check_credentials()) {
  $_SESSION['success'] = true;
  $_SESSION['message'] = "You are now logged in.";
  $_SESSION['message_showed'] = false;

  $_SESSION['logged_in'] = true;

  redirect_to_index();

  die();
}

$_SESSION['success'] = false;
$_SESSION['message'] = "Invalid username or password.";
$_SESSION['message_showed'] = false;

redirect_to_login();

die();
