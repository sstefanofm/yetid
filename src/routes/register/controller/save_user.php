<?php

session_start();

include 'utils/validate.php';
include '../model/user_model.php';
include __DIR__ . '/../../../utils/redirect_to.php';

$username = $_POST['username'];
$username_min_length = 5;
$username_max_length = 20;
$username_validation_code = validate_string($username, $username_min_length, $username_max_length);

if ($username_validation_code != 0) {
  $_SESSION['success'] = false;
  $_SESSION['message'] = validation_message($username_validation_code, "Username", $username_min_length, $username_max_length);
  $_SESSION['message_showed'] = false;

  redirect_to_register();

  die();
}

$password = $_POST['password'];
$confirm_password = $_POST['confirm-password'];
$password_min_length = 8;
$password_max_length = 255;
$password_validation_code = validate_string($password, $password_min_length, $password_max_length);
$confirm_password_validation_code = validate_string($confirm_password, $password_min_length, $password_max_length);

if ($password_validation_code != 0 || $confirm_password_validation_code != 0) {
  $_SESSION['success'] = false;
  $_SESSION['message'] = validation_message($password_validation_code != 0 ? $password_validation_code : $confirm_password_validation_code, "Password", $password_min_length);
  $_SESSION['message_showed'] = false;

  redirect_to_register();

  die();
}

// create user 

$user_model = new UserModel($username, $password, $confirm_password);

if ($user_model->check_passwords()) {
  if ($user_model->create_user()) {
    $_SESSION['success'] = true;
    $_SESSION['message'] = "User registered successfully!";
    $_SESSION['message_showed'] = false;

    redirect_to_index();

    die();
  }
} else {
  $_SESSION['success'] = false;
  $_SESSION['message'] = "Both passwords do not match.";
  $_SESSION['message_showed'] = false;

  redirect_to_register();

  die();
}

$_SESSION['success'] = false;
$_SESSION['message'] = "There was an error creating the user.";
$_SESSION['message_showed'] = false;

redirect_to_register();

die();
