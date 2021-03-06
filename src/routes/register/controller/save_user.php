<?php

session_start();

include 'utils/validate.php';
include '../model/users.php';

function redirect_to($location)
{
  header("Location: $location");
}

$username = $_POST['username'];
$username_min_length = 5;
$username_max_length = 20;
$username_validation_code = validate_string($username, $username_min_length, $username_max_length);

if ($username_validation_code != 0) {
  $_SESSION['success'] = false;
  $_SESSION['message'] = validation_message($username_validation_code, "Username", $username_min_length, $username_max_length);

  redirect_to("../register.php");

  die();
}

$password = $_POST['password'];
$password_min_length = 8;
$password_max_length = 255;
$password_validation_code = validate_string($password, $password_min_length, $password_max_length);

if ($password_validation_code != 0) {
  $_SESSION['success'] = false;
  $_SESSION['message'] = validation_message($password_validation_code, "Password", $password_min_length, $password_max_length);

  redirect_to("../register.php");

  die();
}

// create user 

$user_model = new UserModel($username, $password);

if ($user_model->create_user()) {
  $_SESSION['success'] = true;
  $_SESSION['message'] = "User registered successfully!";

  redirect_to("../../../index.php");

  die();
}

$_SESSION['success'] = false;
$_SESSION['message'] = "There was an error creating the user.";

redirect_to("../register.php");

die();
