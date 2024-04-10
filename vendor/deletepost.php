<?php
require_once 'connect.php';

$id = $_GET['id'];
$result = mysqli_query($connect, "SELECT * FROM `posts` WHERE `id` = $id")->fetch_assoc();
$file = $result["image"];
unlink ('../'.$file);
$result = mysqli_query($connect, "DELETE FROM `posts` WHERE `id` = $id");

header('Location: ../index.php');
?>
