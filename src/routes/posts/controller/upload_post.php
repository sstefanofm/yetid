<?php

session_start();

include __DIR__ . '/../model/PostCreator.php';

$title = $_POST['title'];
$content = $_POST['content'];
$username = $_SESSION['username'];

$creator = new PostCreator();

if ($creator->run($title, $content, $username)) {
  $_SESSION['success'] = true;
  $_SESSION['message'] = "Post created successfully!";
  $_SESSION['message_showed'] = false;

  redirect_to_index();

  die();
}

$_SESSION['success'] = false;
$_SESSION['message'] = "There was an error creating the post.";
$_SESSION['message_showed'] = false;

redirect_to_index();
