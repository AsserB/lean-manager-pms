<?php
// http://leanmanager/index.php?page=roles&action=create
ob_start();
?>
<h1 class="form-title">Добавить новый проект</h1>

<form class="form" method="POST" action="/todo/tasks/store">

    <div class="form-fields create">
        <div class="form-fields__row">
            <label for="title">Название проекта</label>
            <input type="text" id="title" name="title" required>
            <label for="org_type">Выберите тип организации</label>
            <div class="form-select-wrapper">
                <select class="form-select mb-3" name="org_type" id="org_type">
                    <option>Дошкольное образование</option>
                    <option>Общее образование</option>
                    <option>Среднее профессиональное образование</option>
                    <option>Высшее образование</option>
                    <option>Институты развития</option>
                    <option>Доп. профессиональное образование</option>
                </select>
            </div>
            <label for="job_place">Название организации</label>
            <input type="text" id="job_place" name="job_place" required>
            <label for="category_id">Выберите подпроект</label>
            <div class="form-select-wrapper">
                <select class="form-select mb-3" name="category_id" id="category_id">
                    <option>Комфортная школа</option>
                    <option>Эффективный регион</option>
                    <option>Конкурс "Лидер бережливости"</option>
                </select>
            </div>
            <label for="customer">Заказчик проекта</label>
            <input type="text" id="customer" name="customer" placeholder="ФИО, должность" required>
            <label for="team_lead">Руководитель проекта</label>
            <input type="text" id="team_lead" name="team_lead" placeholder="ФИО, должность" required>
            <label for="lead_email">Электронная почта руководителя</label>
            <input type="email" id="lead_email" name="lead_email" required>
        </div>
        <div class="form-fields__row">
            <label for="passport_project">Ссылка на паспорт проекта <button class="modal__button">инструкция</button></label>
            <input type="text" id="passport_project" name="passport_project">
            <label for="presentation_project">Ссылка на презентацию проекта <button class="modal__button">инструкция</button></label>
            <input type="text" id="presentation_project" name="presentation_project">
            <div class="form-fields__textarea">
                <label for="description">Краткое описание проекта</label>
                <textarea type="text" name="description" id="description"></textarea>
            </div>
            <label for="start_date">Выберите дату начала проекта</label>
            <input type="date" id="start_date" name="start_date" required>
            <label for="kick_off_date">Выберите дату Кик-оффа</label>
            <input type="date" id="kick_off_date" name="kick_off_date" disabled>
            <label for="finish_date">Выберите дату оканчания проекта</label>
            <input type="date" id="finish_date" name="finish_date" disabled>
        </div>
    </div>

    <div class="form-button">
        <button type="submit" class="button">Добавить проект</button>
    </div>
</form>

<div class="modal__window">
    <div class="modal__main">
        <h2 class="modal__title">Инсторукция по заполнению паспорта проекта</h2>
        <div class="modal__container">
            <ol>
                <li>
                    <a href="https://irposakha14.ru/wp-content/uploads/2023/10/Паспорт-пустая-форма.docx" target=»_blank»>Шаблон паспорта проекта.docx <strong>скачать</strong></a>
                </li>
                <li>
                    <a href="https://irposakha14.ru/wp-content/uploads/2023/10/План-мероприятий.docx" target=»_blank»>Шаблон плана мероприятий.docx <strong>скачать</strong></a>
                </li>
            </ol>
        </div>
        <h2 class="modal__title">Инсторукция по оформлению презентации проекта</h2>
        <div class="modal__container">
            <ol>
                <li>
                    <a href="https://irposakha14.ru/wp-content/uploads/2023/10/Пошаговое_составление_итогового_отчета.pptx" target=»_blank»>Шаблон презентации проекта.pptx <strong>скачать</strong></a>
                </li>
                <li>
                    <a href="https://irposakha14.ru/wp-content/uploads/2023/10/Пример-потоковой-карты.pptx" target=»_blank»>Пример потоковой карты.pptx <strong>скачать</strong></a>
                </li>
            </ol>
        </div>
        <button class="modal__close">&#10006; Закрыть</button>
    </div>
</div>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>