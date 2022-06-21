<?php

session_start();

include __DIR__ . '/../model/UserCreator.php';
include __DIR__ . '/../../../utils/redirect_to.php';

$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirm-password'];
$role = $_POST['role'];

// call database;

$creator = new UserCreator();

if ($creator->run($username, $password, $role)) {
  $_SESSION['success'] = true;
  $_SESSION['message'] = "New user created successfully!";
  $_SESSION['message_showed'] = false;

  redirect_to_index();

  die();
}

$_SESSION['success'] = false;
$_SESSION['message'] = "There was a problem creating the user.";
$_SESSION['message_showed'] = false;

redirect_to_create_user();

die();
