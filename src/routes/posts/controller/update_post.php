<?php

session_start();

include __DIR__ . '/../model/PostUpdater.php';
include __DIR__ . '/../../../utils/redirect_to.php';

$id = $_POST['id'];
$title = $_POST['title'];
$main_subtitle = $_POST['main_subtitle'];
$main_content = $_POST['main_content'];
$content = $_POST['content'];

$updater = new PostUpdater();

if ($updater->run($id, $title, $main_subtitle, $main_content, $content)) {
  $_SESSION['success'] = true;
  $_SESSION['message'] = "Post updated successfully!";
  $_SESSION['message_showed'] = false;

  die();
}

$_SESSION['success'] = false;
$_SESSION['message'] = "There was an error updating the post.";
$_SESSION['message_showed'] = false;
