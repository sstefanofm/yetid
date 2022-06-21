<?php

session_start();

include __DIR__ . '/../model/PostCreator.php';

$title = $_POST['title'];
$content = $_POST['content'];
$main_subtitle = $_POST['main_subtitle'];
$main_content = $_POST['main_content'];
$username = $_SESSION['username'];

$creator = new PostCreator();

if ($creator->run($title, $content, $username, $main_subtitle, $main_content)) {
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
