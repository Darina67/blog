<?php
session_start();
require_once 'connect.php';

$user_name = $_SESSION['user']['name'];
$user_avatar = $_SESSION['user']['avatar'];
$id = $_POST['id'];
$body  = $_POST['comment-text'];

mysqli_query($connect, "")

mysqli_query($connect, "INSERT INTO `comments`(`id`, `comment_id`, `body`, `data`, `user_name`, `user_avatar`)
                                VALUES (NULL,'$id','$body',CURRENT_DATE(),'$user_name','$user_avatar')");

header('Location: ../post.php?id=' . $id);
?>



