<?php

session_start();

include __DIR__ . '/../model/UserUpdater.php';
include __DIR__ . '/../../../utils/redirect_to.php';

$id = $_GET['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirm-password'];
$role = $_POST['role'];

// call database;

$updater = new UserUpdater();

if ($updater->run($id, $username, $password, $role)) {
  $_SESSION['success'] = true;
  $_SESSION['message'] = "User updated successfully!";
  $_SESSION['message_showed'] = false;

  redirect_to_view_users();

  die();
}

$_SESSION['success'] = false;
$_SESSION['message'] = "There was a problem updating the user.";
$_SESSION['message_showed'] = false;

redirect_to_view_users();

die();
