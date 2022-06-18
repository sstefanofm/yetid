<?php

session_start();

include __DIR__ . '/../model/PostsDatabase.php';

$title = $_POST['title'];
$content = $_POST['content'];
$username = $_SESSION['username'];

$posts_database = new PostsDatabase();

$posts_database->save($title, $username, $content);

$_SESSION['success'] = true;
$_SESSION['message'] = "Post created successfully!";
$_SESSION['message_showed'] = false;
