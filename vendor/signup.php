<?php
session_start();
require_once 'connect.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password  = $_POST['password'];
$password__confirm = $_POST['password_confirm'];

if($password === $password__confirm) {
    $path = 'uploads/users/' . time() . $_FILES['avatar']['name'];
    if(!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' .  $path)){
        header('Location: ../error.html');
    }
    $password = md5($password);
    mysqli_query($connect, " INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `role`) VALUES (NULL, '$name', '$email', '$password','$path', 0)");
      $_SESSION['message'] = 'Регистрация прошла успешно';
    header('Location: ../signin.php');
}else{
    $_SESSION['message'] = 'Пароли не совпадают';
    header('Location: ../signup.php');
}


?>