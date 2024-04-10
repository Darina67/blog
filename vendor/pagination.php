<?php
require_once ('connect.php');

$result = mysqli_query($connect, "SELECT * FROM `posts`");
$posts = mysqli_fetch_assoc($result);


$limit = 6;
$page = intval($_GET['page']) ?: 1;
$offset = ($page - 1) * $limit;
$products_on_page = array_slice($posts, $offset, $limit, true);
$products_quantity = count($posts);
$pages = $products_quantity / $limit;
$pages_total = ceil($pages);


require('index.php');
?>