<?php
ob_start();
?>

<!--Основная страница с контентом-->

<section class="advantages" id="advantages">
    <h1 class="title">о проекте</h1>
    <div class="cards">
        <div class="cards__row">
            <div class="a-card">
                <img src="/app/vendors/img/card_img/db0icon.png" class="card__img" alt="">
                <div class="card__content">
                    <h3 class="card__title">Цифровая база данных</h3>
                    <div class="card__border violet"></div>
                    <p class="card__text">База данных проектов образовательных
                        организаций
                        внедряющих
                        технологии бережливого производства
                    </p>
                </div>
            </div>
            <div class="a-card">
                <img src="/app/vendors/img/card_img/reestr-icon.png" class="card__img" alt="">
                <div class="card__content">
                    <h3 class="card__title">Электронный реестр</h3>
                    <div class="card__border orange"></div>
                    <p class="card__text">Электронный реестр образовательных
                        организаций,
                        внедряющих технологии бережливого производства
                    </p>
                </div>
            </div>
        </div>
        <div class="cards__row">
            <div class="a-card">
                <img src="/app/vendors/img/card_img/monitoring.png" class="card__img" alt="">
                <div class="card__content">
                    <h3 class="card__title">Мониторинг проектов</h3>
                    <div class="card__border green-border"></div>
                    <p class="card__text">Разработка и внедрение программ цифровых
                        курсов по
                        бережливому производству
                    </p>
                </div>
            </div>
            <div class="a-card">
                <img src="/app/vendors/img/card_img/ppu.png" class="card__img" alt="">
                <div class="card__content">
                    <h3 class="card__title">Электронная система ППУ</h3>
                    <div class="card__border blue"></div>
                    <p class="card__text">Системы сбора предложений по улучшениям
                        (ППУ) от
                        организаций, направленных на внедрение
                        бережливых технологий в систему образования РС (Я)
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>