<?php

include __DIR__ . '/PostUploader.php';

$uploader = new PostUploader();

// obtain user_id in some way;
$user_id = null;

$content = $_POST['content'];
$title = $_POST['title'];
$main_subtitle = $_POST['main_subtitle'];
$main_content = $_POST['main_content'];

$success = $uploader->run($user_id, $main_content, $title, $main_content, $main_content);

echo json_encode(array("success" => $success));
