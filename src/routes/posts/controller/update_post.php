<?php

session_start();

include __DIR__ . '/../model/PostUpdater.php';
include __DIR__ . '/../../../utils/redirect_to.php';

$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['post'];

$updater = new PostUpdater();

if ($updater->run($id, $title, $content)) {
  $_SESSION['success'] = true;
  $_SESSION['message'] = "Post updated successfully!";
  $_SESSION['message_showed'] = false;

  die();
}

$_SESSION['success'] = false;
$_SESSION['message'] = "There was an error updating the post.";
$_SESSION['message_showed'] = false;
