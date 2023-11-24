<?php
$user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : "Вы не вошли в систему";
$user_role = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : false;
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <!-- encoding -->
    <meta charset="UTF-8">
    <!-- Mobile support -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title and SEO -->
    <title>Бережливый менеджер - система управления проектами</title>
    <meta name="description" content="Бережливый менеджер - система управления проектами, обеспечивающая эффективное использование ресурсов и сбережение. 
    Минимизация потерь и прозрачная модерация на всех этапах работы.">
    <meta name="keywords" content="бережливый менеджер система управления проектами проектное управление эффективный регион комфортный колледж бережливое производство lean manager">

    <meta property="og:type" content="website">
    <meta property="og:title" content="Бережливый менеджер - система управления проектами">
    <meta property="og:url" content="https://lean-manager.ru/">
    <meta property="og:image" content="https://i.postimg.cc/HW5SxnhJ/16-11-2023-144359.jpg">
    <meta property="og:description" content="Бережливый менеджер - система управления проектами, обеспечивающая эффективное использование ресурсов и сбережение. Минимизация потерь и прозрачная модерация на всех этапах работы.">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="/app/vendors/css/main.css?ver=20">

    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="32x32" href="/app/vendors/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/app/vendors/img/favicon/favicon-16x16.png">

    <meta name="yandex-verification" content="5d14f1156e60f81e">
</head>

<body>
    <header class="header">
        <div class="logo">
            <div class="hamburger-menu" id="hamburger-button">
                <div class="hamburger-menu-line"></div>
                <div class="hamburger-menu-line"></div>
                <div class="hamburger-menu-line"></div>
            </div>
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
    <div class="layout">
        <aside class="sidebar" id="sidebar">
            <ul class="sidebar__list">
                <li>
                    <div class="sidebar-group">
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
                    </div>
                    <?php if ($user_role == 3 || $user_role == 5 || $user_role == 2 || $user_role == 1) : ?>
                        <div class="sidebar-group">
                            <p class="sidebar-group__title">Панель управления</p>
                            <ul class="sidebar-group__list">
                                <li>
                                    <img src="/app/vendors/img/icon/dashboards.png" alt="">
                                    <a href="/dashboards">Дашборд</a>
                                </li>
                                <li>
                                    <img src="/app/vendors/img/icon/list.png" alt="">
                                    <a href="/todo/tasks/myproject">Мои проекты</a>
                                </li>
                                <li>
                                    <img src="/app/vendors/img/icon/addProject-icon.png" alt="">
                                    <a href="/todo/tasks/create">Добавить проект</a>
                                </li>
                                <li>
                                    <a href="https://docs.google.com/presentation/d/1zNP9ki_A9CEDSNVKEd6ovKPCBdi0g8wSlG8N6SFDBMo/edit?usp=sharing" target="_blank">Инструкция пользователя</a>
                                </li>
                            </ul>
                        </div>
                    <?php endif ?>
                    <?php if ($user_role == 3 || $user_role == 5) : ?>
                        <div class="sidebar-group">
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
                                <li>
                                    <a href="/todo/tasks/report">Отчет по проектам</a>
                                </li>
                            </ul>
                        </div>
                    <?php endif ?>
                    <div class="sidebar-group">
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
                    </div>
                    <div class="sidebar-group">
                        <p class="sidebar-group__title">Документы</p>
                        <ul class="sidebar-group__list">
                            <li>
                                <a href="/info/policy">Политика конфиденциальности</a>
                            </li>
                            <li>
                                <a href="/info/cookie">Политика обработки файлов cookie</a>
                            </li>
                            <li>
                                <a href="/info/useragreement">Пользовательское соглашение</a>
                            </li>
                        </ul>
                    </div>
                    <?php if ($user_role == 3) : ?>
                        <div class="sidebar-group">
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
                                    <a href="/todo/comments">Комментарии</a>
                                </li>
                            </ul>
                        </div>
                    <?php endif ?>
                    <div class="sidebar-group">
                        <p class="sidebar-group__title">Панель авторизации</p>
                        <ul class="sidebar-group__list">
                            <?php if ($user_role == false) : ?>
                                <li><a href="/auth/login">Вход</a></li>
                                <li><a href="/auth/register">Регистрация</a></li>
                            <?php endif ?>
                            <?php if ($user_role == true) : ?>
                                <li><a href="/users/profile">Настройки профиля</a></li>
                                <li><a href="/auth/logout">Выйти</a></li>
                            <?php endif ?>
                        </ul>
                    </div>
                </li>
            </ul>
        </aside>
        <main class="content" id="content">
            <?php echo $content; ?>
            <div id="cookie_notification">
                <p>Для улучшения работы сайта и его взаимодействия с пользователями мы используем файлы cookie. Продолжая работу с сайтом, Вы разрешаете использование cookie-файлов. Вы всегда можете отключить файлы cookie в настройках Вашего браузера.</p>
                <a class="button cookie_info" href="/info/cookie">Подробнее</a>
                <button class="button cookie_accept">Принять</button>
            </div>
        </main>
    </div>


    <script src="/app/vendors/scripts/main.js"></script>
    <script src="/app/vendors/scripts/dateUpdateing.js"></script>
    <script src="/app/vendors/scripts/modal.js"></script>
    <script src="/app/vendors/scripts/dashboards.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">

    </script>

</body>

</html>