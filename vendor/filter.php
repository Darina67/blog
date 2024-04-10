<?php
session_start();
require_once 'connect.php';
$filtered = mysqli_query($connect, "SELECT * FROM `posts` WHERE `category` = '" . $_POST['category'] . "'")->fetch_all();
foreach ($filtered as $posts): ?>
<article class="post">
    <div class="post__header post__header--preview">
        <a href="post.php?id=<?=$posts[0]?>">
            <img
                src="<?=$posts[6]?>"
                class="post__preview"
            />
        </a>
    </div>
    <div class="post__content">
        <h2 class="post__title">
            <a href="post.php?id=<?= $posts[0]?>"><?=$posts[1]?></a>
        </h2>
        <p class="post__description">
            <?=$posts[2]?>
        </p>
    </div>
    <div class="post__footer">
        <ul class="post__data">
            <li class="post__data-item">
                <time datetime="2021-09-26 19:19"><?=$posts[4]?></time>
            </li>
            <li class="post__data-item">
                <a href="#"><?=$posts[5]?></a>
            </li>
        </ul>
        <a href="post.php?id=<?= $posts[0]?>" class="post__read">Читать</a>
        <?php if($_SESSION['user']['role'] == 1) {?>
            <a href="updatepost.php?id=<?=$posts[0]?>" class="post__read">Изменить</a>
            <a href="vendor/deletepost.php?id=<?=$posts[0]?>" class="post__read">Удалить</a>
        <?php } ?>

    </div>
</article>
<?php endforeach; ?>
