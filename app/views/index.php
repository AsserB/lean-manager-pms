<?php
ob_start();

$user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : "";
$user_role = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : false;
?>


<main class="main">
    <div class="main__info">
        <div class="main__info--text">
            <h1 class="main__info--title">Бережливый <a class="main__info--link" href="/info/rcbt">менеджер</a></h1>
            <h2 class="main__info--subtitle">эффективное управление <a class="main__info--link" href="/todo/tasks">проектами</a></h2>
            <div class="main__info--btn--wrapper">
                <?php if ($user_role == false) : ?>
                    <a href="/auth/login" class="main__info--btn">Авторизоваться</a>
                <?php endif ?>
                <?php if ($user_role == 3 || $user_role == 5 || $user_role == 2 || $user_role == 1) : ?>
                    <a href="/todo/tasks/create" class="main__info--btn">Добавить проект</a>
                <?php endif ?>
            </div>
        </div>
        <div class="main__info--img--top">
            <img src="/app/vendors/img/content/main-img-top.png" alt="">
        </div>
        <div class="main__info--img">
            <img src="/app/vendors/img/content/main-img.jpg" alt="Платформа управления проектами">
        </div>
    </div>

    <div class="main__advantages" id="advantages">
        <h2 class="main__info--subtitle title--advantages">Создавайте <a class="main__info--link" href="/todo/tasks">проекты</a>, определяйте их цели и сроки<a class="main__info--link" href="/todo/tasks"></a></h2>
        <div class="main__advantages--wrapper">
            <div class="main__advantages--text">
                <p>На нашей платформе вы можете ознакомиться с <a class="main__info--link" href="/todo/tasks">проектами</a> других пользователей.
                    Это может быть полезно для того, чтобы узнать о новых идеях и тенденциях
                    в области проектирования, а также для того, чтобы найти вдохновение для
                    своих собственных проектов.</p>
            </div>
            <div class="main__info--img moderation">
                <img src="/app/vendors/img/content/all-projects.png" alt="Платформа управления проектами">
            </div>
        </div>
        <div class="main__advantages--wrapper">
            <div class="main__info--img moderation">

                <img src="/app/vendors/img/content/moderation.png" alt="Платформа управления проектами">
            </div>
            <div class="main__advantages--text">
                <p>Наши <a class="main__info--link" href="/info/rcbt">модераторы</a> всегда
                    готовы помочь пользователям в решении любых вопросов или проблем,
                    связанных с проектами</p>
            </div>
        </div>
        <div class="main__advantages--wrapper">
            <div class="main__advantages--text">
                <p>У вас есть возможность создавать проекты по бережливому производству и
                    делиться ими с другими пользователями</p>
            </div>
            <div class="main__info--img moderation">
                <img src="/app/vendors/img/content/addprojects.png" alt="Платформа управления проектами">
            </div>
        </div>
    </div>

    <div class="contacts" id="contacts">
        <h2 class="main__info--subtitle contacts-title"><a class="main__info--link" href="/info/rcbt">Контактная информация</a></h2>
        <div class="contacts-list">
            <div class="contacts-item">
                <div class="contacts-item-content">
                    <ul class="contacts-ul">
                        <li class="contacts-li-icon">
                            <img src="/app/vendors/img/icon/mail.png" alt="Электронная почта">
                            <a href="mailto:rcbt-irpo@mail.ru">rcbt-irpo@mail.ru</a>
                        </li>
                        <li class="contacts-li-icon">
                            <img src="/app/vendors/img/icon/office-building.png" alt="Организация">
                            <a href="https://irposakha14.ru">ГАУ ДПО РС(Я) "Институт развития профессионального развития"</a>
                        </li>
                        <li class="contacts-li-icon">
                            <img src="/app/vendors/img/icon/location.png" alt="Адрес">
                            <span>г. Якутск, ул. Крупской, 13.</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="contacts-item">
                <div class="contacts-item-content">
                    <div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/74/yakutsk/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Якутск</a><a href="https://yandex.ru/maps/74/yakutsk/house/ulitsa_krupskoy_13/ZUsPaABiS0QAXUJsYWJxc3xlYgo=/?ll=129.722836%2C62.020997&utm_medium=mapframe&utm_source=maps&z=17.45" style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица Крупской, 13 — Яндекс Карты</a><iframe src="https://yandex.ru/map-widget/v1/?ll=129.722836%2C62.020997&mode=whatshere&whatshere%5Bpoint%5D=129.722087%2C62.020707&whatshere%5Bzoom%5D=17&z=17.45" width="470" height="345" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>