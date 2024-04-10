<?php
session_start();
require_once './vendor/connect.php';
if (!$_SESSION['user']) {
    header('Location: ../signin.php');
}
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/style.min.css">
    
    <!-- Useful meta tags -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, follow">
    <meta name="google" content="notranslate">
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="">
    <link type="image/x-icon" rel="shortcut icon" href="assets/images/favicon.png"/>
    
    <title>Главная</title>
  </head>
  <body>
    <div class="page" id="page">
      <!-- Header -->
      <header class="header">
        <div class="header__left">
          <nav class="nav">
            <ul class="nav__list">
              <li class="nav__item">
                <a href="index.php" class="nav__link">Главная</a>
              </li>
              <li class="nav__item">
                <a href="#" class="nav__link has-subnav">Статьи</a>
                <ul class="subnav">
                  <li class="nav__item">
                    <a class="subnav__link">Создание сайтов</a>
                  </li>
                  <li class="nav__item">
                    <a class="subnav__link">Интернет маркетинг</a>
                  </li>
                  <li class="nav__item">
                    <a class="subnav__link">Продвижение видео</a>
                  </li>
                    <!--Новая категория-->
                  <li class="nav__item">
                    <a class="subnav__link">Интересное</a>
                  </li>
                </ul>
              </li>
              <li class="nav__item">
                <a href="aboutme.php" class="nav__link">Обо мне</a>
              </li>
              <li class="nav__item">
                <a href="advertising.php" class="nav__link">Реклама</a>
              </li>
            </ul>
          </nav>
        </div>
        <div class="header__right">
          <nav class="nav">
            <ul class="nav__list">
              <li class="nav__item">
                <a href="profile.php" class="nav__link">Профиль</a>
              </li>
                <?php if($_SESSION['user']['role'] == 1) {?>
                    <li class="nav__item">
                        <a href="addpost.php" class="nav__link">Создать пост</a>
                    </li>
                <?php } ?>
              <li class="nav__item">
                <a href="vendor/logout.php" class="nav__link">Выйти</a>
              </li>
            </ul>
          </nav>
      
          <button class="burger" type="button" id="sidebarToggle">
            <span>Открыть меню</span>
          </button>
      
         
        </div>
      </header>

      <!-- Sidebar -->
      <aside class="sidebar" id="sidebar">
        <div class="sidebar__header">
          <img src="assets/images/sidebar-header.jpg" alt="sidebar-header" />
        </div>
        <div class="sidebar__content">
          <div class="profile">
            <img
              class="profile__avatar"
              src="assets/images/sidebar-avatar.jpg"
              alt="sidebar-avatar"
            />
            <div class="profile__header">
              <div class="profile__name">Григорьева Дарина</div>
              <div class="profile__prof">Блог front-end разработчика</div>
            </div>
      
            <ul class="social">
              <li class="social__item">
                <a href="#" class="social__link" target="_blank">
                  <img src="assets/images/instagram-icon.svg" alt="instagram" />
                </a>
              </li>
              <li class="social__item">
                <a href="#" class="social__link" target="_blank">
                  <img src="assets/images/vk-icon.svg" alt="vk" />
                </a>
              </li>
              <li class="social__item">
                <a href="#" class="social__link" target="_blank">
                  <img src="assets/images/pinterest-icon.svg" alt="pinterest" />
                </a>
              </li>
            </ul>
      
            <div class="profile__text">
              Front-end разработчик. Практик верстки сайтов. Имеется опыт коммерческой
              разработки. Мечта войти в IT :)
            </div>
          </div>
          <!-- /.profile -->
          <nav class="nav nav--mobile">
            <ul class="nav__list">
              <li class="nav__item">
                <a href="index.php" class="nav__link">Главная</a>
              </li>
              <li class="nav__item">
                <a href="#" class="nav__link has-subnav">Статьи</a>
                <ul class="subnav">
                  <li class="nav__item">
                    <a href="index.php" class="subnav__link">Создание сайтов</a>
                  </li>
                  <li class="nav__item">
                    <a href="#" class="subnav__link">Интернет маркетинг</a>
                  </li>
                  <li class="nav__item">
                    <a href="#" class="subnav__link">Продвижение видео</a>
                  </li>
                </ul>
              </li>
              <li class="nav__item">
                <a href="aboutme.php" class="nav__link">Обо мне</a>
              </li>
              <li class="nav__item">
                <a href="advertising.php" class="nav__link">Реклама</a>
              </li>
              <li class="nav__item">
                <a href="profile.php" class="nav__link">Профиль</a>
              </li>
              <li class="nav__item">
                <a href="vendor/logout.php" class="nav__link">Выйти</a>
              </li>
            </ul>
          </nav>
        </div>
        <!-- /.sidebar__content -->
        <div class="sidebar__footer">
          <a href="works.php" class="btn btn--red">Мои работы</a>
          <button type="button" class="btn btn--blue" data-modal="contact-modal">
            Написать мне
          </button>
        </div>
      </aside>

      <!-- Main -->
      <main class="main">
        <div class="container">


        <div class="card">
            <div class="card__item">
              <div class="card__inner">
                <div class="card__img">
                  <img src="assets/images/card.jpg" alt="Информационный блок" />
                </div>
                <div class="card__text">Сайт - блог начинающего fullstack разработчика.
                  <br> Много интересного  материала про web разработку, немного обо мне и вас ;).
                  Пообщаемся? Оставляй комментарий под интересующим тебя постом!
                </div>
              </div>
            </div>
           </div>

<?php


    /* Текущий номер страницы*/
    $currentPage = (empty($_GET["page"])? 1 : intval($_GET["page"]));
    // Количество кнопок на странице
    $limit = 3;
    // Диапазон выбираемых постов из БД (находим id поста, с которого будет начинаться вывод из БД в зависимости от номера страницы)
    // Например, на второй странице выведутся три поста, начиная с id = 3 ((2 - 1)*3 =3), на третьей странице выведутся посты начиная с id 6 (тоже три штуки)
    $offset = ($currentPage - 1) * $limit;
    // Стрелочки влево вправо
    // проверка пагинации
    $prev = $currentPage - 1;
    $next = $currentPage + 1;

        // Делаем выборку всех записей из БД
        $result = mysqli_query($connect, "SELECT * FROM `posts`")->fetch_all();
        // При нажатии на цифры currentPage меняется, а страница обновляется
        // Здесь берем выборку из БД и обрезаем ее начиная с offset (в зависимости от текущей страницы) и выбираем ровно три записи (переменная limit)
        $array = array_splice($result, $offset, $limit, true);
        if($prev <= 0 ) {
          $prev = 1;
          $currentPage = 1;
        }
        if(count($array) == 0) {
          echo "Тут ничего нет";
        }
?>
            <div class="post__list">

            <?php
                        foreach ($array as $posts)
            {
                ?>
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

            <?php
            }
            ?>
        </div>


<!-- pagination -->

<ul class="pagination">  
  <li class="pagination__item">
    <a href="?page=<?=$prev?>" class="pagination__link"> &lt; </a>
  </li>
  <?php
  for($i = 0; $i < $limit; $i++) {
    $num = $i + 1;
    if($num == $currentPage) {
      echo "<li class='pagination__item'>";
      echo "<a href='?page=$num' class='pagination__link active'>$num</a>";
      echo "</li>";
    }
    else {
      echo "<li class='pagination__item'>";
      echo "<a href='?page=$num' class='pagination__link'>$num</a>";
      echo "</li>";
    }
  }
  ?>
  <li class="pagination__item">
    <a href="?page=<?=$next?>"  class="pagination__link">&gt;</a>
  </li>
</ul>

</div>
      </main>
    </div>

    <div class="modal" id="story-modal">
  <div class="modal__content modal__content--story">
    <video
      class="modal__video"
      src=""
      poster="assets/images/story1.jpg"
    ></video>
  </div>
</div>
 <div class="modal" id="contact-modal">
  <div class="modal__content modal__content--contact">
    <button class="modal__close" type="button">
      <img src="assets/images/cancel.svg" alt="Закрыть" />
    </button>
    <form action="/vendor/telegram.php" class="form" method="POST">
      <div class="form__group form__group--md">
        <input type="text" class="form__control" placeholder="Ваше имя" name="user_name" />
        <span class="form__line"></span>
      </div>

      <div class="form__group form__group--md">
        <input type="email" class="form__control" placeholder="Ваш Email" name="user_email"/>
        <span class="form__line"></span>
      </div>

      <div class="form__group form__group--md">
        <textarea
          class="form__control form__control--textarea"
          placeholder="Текст сообщения"
          name="user_text"
        ></textarea>
        <span class="form__line"></span>
      </div>

      <div class="form__footer">
        <div class="form__group form__group--md">
          <button class="btn btn--blue btn--rounded btn--sm" type="submit">
            Отправить
          </button>
        </div>
      </div>
    </form>
    <ul class="modal__footer">
      <li>e-mail: <a href="mailto:web-dev67@mail.ru">web-dev67@mail.ru</a></li>
      <li>тел: <a href="tel:+79082889173">8-908-288-91-73</a></li>
    </ul>
  </div>
  <!--modal-content-->
</div>
 <div class="modal">
  <div class="modal__content">
    <button class="modal__close" type="button">
      <img src="assets/images/cancel.svg" alt="" />
    </button>
    <ul class="social">
      <li class="social__item">
        <a href="#" class="social__link">
          <img src="assets/images/share/facebook.svg" alt="instagram" />
        </a>
      </li>
      <li class="social__item">
        <a href="#" class="social__link">
          <img src="assets/images/share/twitter.svg" alt="vk" />
        </a>
      </li>
      <li class="social__item">
        <a href="#" class="social__link">
          <img src="assets/images/share/vk.svg" alt="pinterest" />
        </a>
      </li>
      <li class="social__item">
        <a href="#" class="social__link">
          <img src="assets/images/share/export.svg" alt="pinterest" />
        </a>
      </li>
    </ul>
  </div>
  <!--modal-content-->
</div>


    <!-- JS -->
    <script src="assets/js/app.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/filter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
  </body>
</html>
