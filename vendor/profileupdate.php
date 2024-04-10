<?php
session_start();
require_once 'connect.php';
//Редирект на профиль
header('Location: ../profile.php');
//Данные с формы
$name = $_POST['name'];
$email = $_POST['email'];
$password  = $_POST['password'];
$password__confirm = $_POST['confirm__password'];
//если не хотим менять пароль, мы можем обновить данные имя и почта, не обновляя пароль
mysqli_query($connect, "UPDATE `users` SET `name` = '$name', `email` = '$email' WHERE users.id = " .$_SESSION['user']['id'] );
//если пароль введен, то он будет обновлен дополнительно
if($password !== '') {
    //проверка на совпадение
    if($password === $password__confirm) {
        $password = md5($password);
        mysqli_query($connect, "UPDATE `users` SET `password` = '$password' WHERE users.id = " .$_SESSION['user']['id'] );
    }
    else {
        $_SESSION['message'] = 'Пароли не совпадают';
        exit;
    }
}
//Загрузка картинки
if($_FILES['pct']['name'] !== '') {
    //удаление старой картинки
    $user = mysqli_query($connect, "SELECT * FROM `users` WHERE users.id = " . $_SESSION['user']['id'])->fetch_assoc();
    unlink('../' . $user['avatar']);
    echo $user['avatar'];
    $path = 'uploads/users/' . time() . $_FILES['pct']['name'];
    if(!move_uploaded_file($_FILES['pct']['tmp_name'], '../' .  $path)){
        header('Location: ../error.html');
        exit;
    }
    mysqli_query($connect, "UPDATE `users` SET `avatar` = '$path' WHERE users.id = " .$_SESSION['user']['id'] );
   

}
$_SESSION['message'] = 'Данные обновлены';
?>
