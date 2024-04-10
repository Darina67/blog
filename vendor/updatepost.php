<?php
require_once 'connect.php';
header('Location: ../index.php');
$id = $_POST['id'];
$title = $_POST['title'];
$prebody = $_POST['prebody'];
$post_text = $_POST['post_text'];
$category = $_POST['category'];


//обновление текстовой информации
mysqli_query($connect, "UPDATE `posts` SET `title` = '$title', `prebody` = '$prebody', `body` = '$post_text', `category` = '$category' WHERE `posts`.`id` = $id");
//если была загружена новая картинка, то в бд она будет обновлена, иначе ее не трогаем
if($_FILES['image']['tmp_name'] !== '') {
    if(!move_uploaded_file($_FILES['image']['tmp_name'], '../' .  $path)){
        header('Location: ../error.html');
        exit;
    }
    $path = 'uploads/posts/' . time() . $_FILES['image']['name'];
    mysqli_query($connect, "UPDATE `posts` SET `image` = '$path' WHERE `posts`.`id` = $id");
}

