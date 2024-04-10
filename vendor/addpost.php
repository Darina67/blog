<?php
require_once 'connect.php';

$title = $_POST['title'];
$preview = $_POST['preview'];
$post_text = $_POST['post_text'];
$category = $_POST['category'];

$path = 'uploads/posts/' . time() . $_FILES['image']['name'];
if(!file_exists($path)){
    $path == NULL;
}
if(!move_uploaded_file($_FILES['image']['tmp_name'], '../' .  $path)){
    header('Location: ../error.html');
}

mysqli_query($connect, "INSERT INTO `posts`( `title`, `prebody`, `body`, `data`, `category`, `image`) VALUES ('$title','$preview','$post_text',CURRENT_DATE(),'$category','$path')");
header('Location: ../index.php');
?>