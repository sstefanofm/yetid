<?php

session_start();

include __DIR__ . '/../model/post_model.php';
include __DIR__ . '/../../../utils/redirect_to.php';

$username = $_POST['username'];
$post_data = $_POST['post'];

$post_model = new PostModel();

$post_model->create_post($username, $post_data);

$_SESSION['success'] = true;
$_SESSION['message'] = "Post created successfully!";
$_SESSION['message_showed'] = false;

echo json_encode($_SESSION);
