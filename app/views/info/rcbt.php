<?php
ob_start();
?>

<div class="content__main">
    <div class="container-content">
        <header class="content-header">
            <img class="content-img" src="/app/vendors/img/content/rcbt.jpeg" alt="Проект эффективный регион">
            <h1 class="title"><mark>#</mark>Региональный центр бережливых технологий</h1>
            <p class="text">
                <span class="marker2">Основная цель деятельности Центра</span> — способствование
                успешному
                внедрению подходов, принципов, методов и инструментов бережливого
                производства в систему образования Республики Саха (Якутия).
            </p>
            <p class="text">
                Основными задачами Центра являются:
            <ul>
                <li class="text__list marker3">
                    <p>1.внедрение подходов, принципов, методов и инструментов бережливого
                        производства;</p>
                </li>
                <li class="text__list marker3">
                    <p>2.изучение и обобщение опыта применения технологий бережливого
                        производства в образовательных организациях Республики Саха
                        (Якутия);
                    </p>
                </li>
                <li class="text__list marker3">
                    <p>3.организация информирования, обучения и консультирования
                        педагогических и руководящих работников образовательных
                        организаций
                        Республики Саха (Якутия), а также руководителей и специалистов
                        муниципальных органов управления образованием и по вопросам
                        внедрения и
                        тиражирования технологий бережливого производства в образовании;
                    </p>
                </li>
                <li class="text__list marker3">
                    <p>4.организация и проведение форумов, конференций, круглых столов,
                        совещаний по тематике «Бережливого производства» для обмена
                        опытом и
                        популяризации концепции бережливого производства в деятельность
                        образовательных организаций Республики Саха (Якутия), в рамках
                        реализации современного законодательства и приоритетных
                        направлений
                        развития образования;</p>
                </li>
                <li class="text__list marker3">
                    <p>5.координирование сетевого взаимодействия педагогических и
                        руководящих работников образовательных организаций Республики
                        Саха
                        (Якутия) по внедрению и тиражированию технологий бережливого
                        производства в практическую деятельность;</p>
                </li>
                <li class="text__list marker3">
                    <p>6.сопровождение образовательных организаций при прохождении
                        партнерских проверок качества образцов местного, регионального и
                        федерального образцов;</p>
                </li>
                <li class="text__list marker3">
                    <p>7.ведение реестра образовательных организаций, внедряющих технологии
                        бережливого производства.</p>
                </li>
            </ul>
            </p>
        </header>
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

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>