<?php

session_start();

include __DIR__ . '/../model/PostsDatabase.php';

$username = $_POST['username'];
$post_data = $_POST['post'];

$posts_database = new PostsDatabase();

$posts_database->save($username, $post_data);

$_SESSION['success'] = true;
$_SESSION['message'] = "Post created successfully!";
$_SESSION['message_showed'] = false;
