<?php

session_start();

include __DIR__ . '/../model/UsersDeletor.php';

$id = $_POST['id'];

$deletor = new UsersDeletor();

if ($deletor->run($id)) {
  $_SESSION['success'] = true;
  $_SESSION['message'] = "User deleted successfully!";
  $_SESSION['message_showed'] = false;

  die();
}

$_SESSION['success'] = false;
$_SESSION['message'] = "There was an error deleting the user.";
$_SESSION['message_showed'] = false;
