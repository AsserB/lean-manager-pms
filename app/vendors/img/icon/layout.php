<?php
$user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : "Вы не вошли в систему";
$user_role = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : false;
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <!-- encoding -->
    <meta charset="UTF-8" />
    <!-- Mobile support -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Title and SEO -->
    <title>Бережливый менеджер</title>
    <meta name="description" content="Бережливый менеджер эффективное управление проектами" />
    <meta name="keywords" content="ключевые слова, фразы" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="/app/vendors/css/main.css?ver=5.1">

    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon/favicon-16x16.png">
</head>

<body>
    <header class="header">
        <div class="logo">
            <a class="logo" href="/">
                <img src="/app/vendors/img/logo.png" alt="Бережливый менеджер">
                <p>Бережливый менеджер</p>
            </a>
        </div>
        <div class="header-nav">
            <ul class="header-nav__links">
                <li class="auth"><?= $user_email ?></li>
                <?php if ($user_role == false) : ?>
                    <li><a href="/auth/login">Войти</a></li>
                    <li><a href="/auth/register">Регистрация</a></li>
                <?php endif ?>
            </ul>
        </div>
    </header>
    <aside class="sidebar">
        <ul class="sidebar__list">
            <li>
                <section class="sidebar-group">
                    <p class="sidebar-group__title">Основное</p>
                    <ul class="sidebar-group__list">
                        <li>
                            <img src="/app/vendors/img/icon/home-icon.png" alt="">
                            <a href="/">Главное</a>
                        </li>
                        <li>
                            <img src="/app/vendors/img/icon/knowledge.png" alt="">
                            <a href="/info/courses">Учебные материалы</a>
                        </li>
                        <?php if ($user_role == false) : ?>
                            <li>
                                <img src="/app/vendors/img/icon/projectList-icon.png" alt="">
                                <a href="/todo/tasks">Проекты</a>
                            </li>
                        <?php endif ?>
                        <?php if ($user_role == 3 || $user_role == 5 || $user_role == 2 || $user_role == 1) : ?>
                            <li>
                                <img src="/app/vendors/img/icon/projectList-icon.png" alt="">
                                <a href="/todo/tasks/allprojects">Проекты</a>
                            </li>
                        <?php endif ?>
                        <!--<li>
                            <img src="/app/vendors/img/icon/home-icon.png" alt="">
                            <a href="/info">О проекте</a>
                        </li>-->
                    </ul>
                </section>
                <?php if ($user_role == 3 || $user_role == 5 || $user_role == 2 || $user_role == 1) : ?>
                    <section class="sidebar-group">
                        <p class="sidebar-group__title">Панель управления</p>
                        <ul class="sidebar-group__list">
                            <li>
                                <img src="/app/vendors/img/icon/list.png" alt="">
                                <a href="/todo/tasks/myproject">Мои проекты</a>
                            </li>
                            <li>
                                <img src="/app/vendors/img/icon/addProject-icon.png" alt="">
                                <a href="/todo/tasks/create">Добавить проект</a>
                            </li>
                        </ul>
                    </section>
                <?php endif ?>
                <?php if ($user_role == 3 || $user_role == 5) : ?>
                    <section class="sidebar-group">
                        <p class="sidebar-group__title">Модерация проектов</p>
                        <ul class="sidebar-group__list">
                            <li>
                                <img src="/app/vendors/img/icon/security-scan.png" alt="">
                                <a href="/todo/tasks/onchek">Проекты на проверке</a>
                            </li>
                            <li>
                                <img src="/app/vendors/img/icon/error-message.png" alt="">
                                <a href="/todo/tasks/expired">Проекты на доработке</a>
                            </li>
                            <li>
                                <img src="/app/vendors/img/icon/verification.png" alt="">
                                <a href="/todo/tasks/completed">Проверенные проекты</a>
                            </li>
                        </ul>
                    </section>
                <?php endif ?>
                <section class="sidebar-group">
                    <p class="sidebar-group__title">Информационная панель</p>
                    <ul class="sidebar-group__list">
                        <li>
                            <img src="/app/vendors/img/icon/about-icon.png" alt="">
                            <a href="/info/about">Эффективный регион</a>
                        </li>
                        <li>
                            <img src="/app/vendors/img/icon/education.png" alt="">
                            <a href="/info/school">Комфортная школа</a>
                        </li>
                        <li>
                            <img src="/app/vendors/img/icon/rcbt-icon.png" alt="">
                            <a href="/info/rcbt">РЦБТ</a>
                        </li>
                    </ul>
                </section>
                <?php if ($user_role == 3) : ?>
                    <section class="sidebar-group">
                        <p class="sidebar-group__title">Панель администратора</p>
                        <ul class="sidebar-group__list">
                            <li>
                                <a href="/users">Пользователи</a>
                            </li>
                            <li>
                                <a href="/roles">Роли</a>
                            </li>
                            <li>
                                <a href="/pages">Страницы</a>
                            </li>
                            <li>
                                <a href="/todo/category">Категории</a>
                            </li>
                        </ul>
                    </section>
                <?php endif ?>
                <section class="sidebar-group">
                    <p class="sidebar-group__title">Панель авторизации</p>
                    <ul class="sidebar-group__list">
                        <?php if ($user_role == false) : ?>
                            <li><a href="/auth/login">Вход</a></li>
                            <li><a href="/auth/register">Регистрация</a></li>
                        <?php endif ?>
                        <?php if ($user_role == true) : ?>
                            <!--<li><a href="/users/profile">Настройки профиля</a></li>-->
                            <li><a href="/auth/logout">Выйти</a></li>
                        <?php endif ?>
                    </ul>
                </section>
            </li>
        </ul>
    </aside>
    <main class="content">
        <?php echo $content; ?>
    </main>

    <script src="/app/vendors/scripts/main.js"></script>
    <script src="/app/vendors/scripts/dateUpdateing.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>