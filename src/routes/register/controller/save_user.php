<?php

session_start();

include __DIR__ . '/../model/UsersDatabase.php';
include __DIR__ . '/../../../utils/redirect_to.php';
include __DIR__ . '/../../../utils/validate.php';

$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm-password'];

// create user 

$users_database = new UsersDatabase();

if (strcmp($password, $confirm_password) == 0) {
    $users_database->save($username, $password);

    $_SESSION['success'] = true;
    $_SESSION['message'] = "User registered successfully!";
    $_SESSION['message_showed'] = false;

    redirect_to_index();

    die();
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
