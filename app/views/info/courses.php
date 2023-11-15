<?php
ob_start();
?>

<section class="courses">
    <h1 class="title"><mark>#</mark>Учебные материалы</h1>

    <div class="courses__list">
        <a href="https://irposakha14.ru/wp-content/uploads/2023/10/Интенсив-1-История.pdf" target=»_blank» class="courses__item">
            <div class="courses__item-header">
                <img class="courses__img" src="/app/vendors/img/content/courses/c-1.jpg" alt="Образовательный интенсив Часть 1 Введение">
                <h2>Образовательный интенсив Часть 1 Введение</h2>
            </div>
            <div class="courses__item-body"></div>
        </a>
        <a href="https://irposakha14.ru/wp-content/uploads/2023/10/Интенсив-2-Картирование.pdf" target=»_blank» class="courses__item">
            <div class="courses__item-header">
                <img class="courses__img" src="/app/vendors/img/content/courses/c-2.jpg" alt="Образовательный интенсив Часть 1 Введение">
                <h2>Образовательный интенсив Часть 2 Картирование
                </h2>
            </div>
            <div class="courses__item-body"></div>
        </a>
        <a href="https://irposakha14.ru/wp-content/uploads/2023/10/Интенсив-3-Инструменты-БП.pdf" target=»_blank» class="courses__item">
            <div class="courses__item-header">
                <img class="courses__img" src="/app/vendors/img/content/courses/c-2.jpg" alt="Образовательный интенсив Часть 1 Введение">
                <h2>Образовательный интенсив Часть 3 Инструменты бережливого производства</h2>
            </div>
            <div class="courses__item-body"></div>
        </a>
        <a href="https://irposakha14.ru/wp-content/uploads/2023/10/Интенсив-4-Паспорт-проекта.pdf" target=»_blank» class="courses__item">
            <div class="courses__item-header">
                <img class="courses__img" src="/app/vendors/img/content/courses/с-4.jpg" alt="Образовательный интенсив Часть 1 Введение">
                <h2>Образовательный интенсив Часть 4 Паспорт проекта</h2>
            </div>
            <div class="courses__item-body"></div>
        </a>
        <a href="https://irposakha14.ru/wp-content/uploads/2023/10/Интенсив-5-Комфортная-школа.pdf" target=»_blank» class="courses__item">
            <div class="courses__item-header">
                <img class="courses__img" src="/app/vendors/img/content/courses/с-5.jpg" alt="Образовательный интенсив Часть 1 Введение">
                <h2>Образовательный интенсив Часть 5 Комфортная школа</h2>
            </div>
            <div class="courses__item-body"></div>
        </a>
    </div>

</section>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>