<?php

session_start();

include __DIR__ . '/../model/PostDeletor.php';

$id = $_POST['id'];

$deletor = new PostDeletor();

if ($deletor->run($id)) {
  $_SESSION['success'] = true;
  $_SESSION['message'] = "Post deleted successfully.";
  $_SESSION['message_showed'] = false;

  die();
}

$_SESSION['success'] = false;
$_SESSION['message'] = "There was an error deleting the post.";
$_SESSION['message_showed'] = false;
