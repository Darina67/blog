<?php
session_start();
require_once 'vendor/connect.php';
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

    
    <title>Профиль</title>
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
                    <a href="#" class="subnav__link">Создание сайтов</a>
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
                    <a href="#" class="subnav__link">Создание сайтов</a>
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
                <a href="text.php" class="nav__link">Обо мне</a>
              </li>
              <li class="nav__item">
                <a href="text.php" class="nav__link">Реклама</a>
              </li>
              <li class="nav__item">
                <a href="profile.php" class="nav__link">Профиль</a>
              </li>
              <li class="nav__item">
                <a href="#" class="nav__link">Выйти</a>
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
<h1 class="page__title">Профиль</h1>

<form action="vendor/profileupdate.php" class="form" method="POST" enctype="multipart/form-data">
    <?php
    $user = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = " . $_SESSION['user']['id'])->fetch_assoc();
    ?>
  <div class="cabinet">
    <div class="cabinet__form">
      <div class="form__group form__group--md">
        <input
          name="name"
          type="text"
          class="form__control"
          placeholder="Имя"
          value="<?= $user['name'] ?>"
        />
        <span class="form__line"></span>
      </div>

      <div class="form__group form__group--md">
        <input
          name="email"
          type="email"
          class="form__control"
          placeholder="Email"
          value="<?= $user['email'] ?>"
        />
        <span class="form__line"></span>
      </div>

      <div class="form__group form__group--md">
        <input
          name="password"
          type="password"
          class="form__control"
          placeholder="Новый пароль"
        />
        <span class="form__line"></span>
      </div>

      <div class="form__group form__group--md">
        <input
          name="confirm__password"
          type="password"
          class="form__control"
          placeholder="Подтвердите пароль"
        />
        <span class="form__line"></span>
      </div>
    </div>

    <div class="cabinet__avatar">
      <img src="<?= $user['avatar'] ?>" alt="profile__avatar" class="profile__avatar" id="profile__preview" />

      <label for="pct" class="cabinet__file">
        <input name="pct" id="pct" type="file" />
        выбрать аватар
      </label>
    </div>
  </div>

  <button class="btn btn--blue btn--rounded btn--sm" type="submit">
    Сохранить
  </button>
    <?php
        //здесь будем выводить сообщение из сессии message
        require "vendor/message.php";
    ?>
</form>

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
    <form action="/" class="form" method="POST">
      <div class="form__group form__group--md">
        <input type="text" class="form__control" placeholder="Ваше имя" />
        <span class="form__line"></span>
      </div>

      <div class="form__group form__group--md">
        <input type="email" class="form__control" placeholder="Ваш Email" />
        <span class="form__line"></span>
      </div>

      <div class="form__group form__group--md">
        <textarea
          class="form__control form__control--textarea"
          placeholder="Текст сообщения"
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
    <script src="assets/js/preview.js"></script>

  </body>
</html>
