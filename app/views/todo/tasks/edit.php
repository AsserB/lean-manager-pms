<!-- Title and SEO -->
<title>Редактировать проект по бережливому производству</title>
<meta name="description" content="Бережливый менеджер - система управления проектами, обеспечивающая эффективное использование ресурсов и сбережение. 
    Минимизация потерь и прозрачная модерация на всех этапах работы.">
<meta name="keywords" content="бережливый менеджер система управления проектами проектное управление эффективный регион комфортный колледж бережливое производство lean manager">

<meta property="og:type" content="website">
<meta property="og:title" content="Бережливый менеджер - система управления проектами">
<meta property="og:url" content="https://lean-manager.ru/">
<meta property="og:image" content="https://i.postimg.cc/HW5SxnhJ/16-11-2023-144359.jpg">
<meta property="og:description" content="Бережливый менеджер - система управления проектами, обеспечивающая эффективное использование ресурсов и сбережение. Минимизация потерь и прозрачная модерация на всех этапах работы.">


<?php
// http://leanmanager/index.php?page=roles&action=create
ob_start();

$user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : "Вы не вошли в систему";
$user_role = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : false;

?>
<h1 class="form-title">Редактировать проект</h1>

<form class="form" method="POST" action="/todo/tasks/update">
    <input type="hidden" name="id" value="<?= $task['id'] ?>">

    <!--Статус модерации-->

    <div class="form-select-wrapper edit-select">
        <label for="moderation">Статус модерации</label>
        <select class="form-select mb-2" id="moderation" name="moderation">
            <option value="Проект на проверке" <?= $task['moderation'] == 'Проект на проверке' ? 'selected' : '' ?>>
                Проект
                на проверке</option>
            <?php if ($user_role == 3 || $user_role == 5) : ?>
                <option value="Проект не доделан" <?= $task['moderation'] == 'Проект не доделан' ? 'selected' : '' ?>>Проект
                    не
                    доделан</option>
                <option value="Проект проверен" <?= $task['moderation'] == 'Проект проверен' ? 'selected' : '' ?>>Проект
                    проверен</option>
            <?php endif ?>
        </select>
    </div>

    <!--Статус проекта-->
    <div class="form-select-wrapper edit-select">
        <label for="status">Статус проекта</label>
        <select class="form-select mb-2" id="status" name="status">
            <option value="В разработке" <?= $task['status'] == 'В разработке' ? 'selected' : '' ?>>В разработке
            </option>
            <option value="Проект запущен" <?= $task['status'] == 'Проект запущен' ? 'selected' : '' ?>>Проект запущен
            </option>
            <option value="В стадии реализации" <?= $task['status'] == 'В стадии реализации' ? 'selected' : '' ?>>В
                стадии
                реализации
            </option>
            <option value="Проект завершен" <?= $task['status'] == 'Проект завершен' ? 'selected' : '' ?>>Проект
                завершен
            </option>
            <option value="Проект просрочен" <?= $task['status'] == 'Проект просрочен' ? 'selected' : '' ?>>Проект
                просрочен
            </option>
        </select>
    </div>

    <div class="form-fields edits">

        <div class="form-fields__row">

            <p>Общая информация</p>

            <!--Название проекта-->
            <label for="title">Название проекта</label>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($task['title']) ?>" required>

            <!--Заказчик проекта-->
            <label for="customer">Заказчик проекта</label>
            <input type="text" id="customer" name="customer" value="<?= htmlspecialchars($task['customer']) ?>" required>

            <!--Категория проекта-->
            <div class="form-select-wrapper">
                <label for="category_id">Выберите подпроект</label>
                <div class="form-select-wrapper">
                    <select class="form-select mb-3" name="category_id" id="category_id">
                        <option>Комфортная школа</option>
                        <option>Эффективный регион</option>
                        <option>Конкурс "Лидер бережливости"</option>
                    </select>
                </div>
            </div>
            <!--Уведомление об окончании проекта-->
            <div class="form-select-wrapper">
                <label for="reminder_at">Уведомление об окончании проекта</label>
                <select class="form-select mb-2" id="reminder_at" name="reminder_at" required>
                    <option value="month">За месяц до окончания</option>
                    <option value="week">За неделю до окончания</option>
                    <option value="day">За день до окончания</option>
                </select>
            </div>

            <!--Выберите дату Кик-оффа-->
            <label for="kick_off_date">Выберите дату Кик-оффа</label>
            <input type="date" id="kick_off_date" name="kick_off_date" value="<?= htmlspecialchars($task['kick_off_date']) ?>" required>

            <!--Выберите дату оканчания проекта-->
            <label for="finish_date">Выберите дату оканчания проекта</label>
            <input type="date" id="finish_date" name="finish_date" value="<?= htmlspecialchars($task['finish_date']) ?>" required>

            <!--Краткое описание проекта-->
            <div class="form-fields__textarea">
                <label for="description">Краткое описание проекта</label>
                <textarea type="text" name="description" id="description" cols="30" rows="5"><?= htmlspecialchars($task['description']) ?></textarea>
            </div>
        </div>
        <div class="form-fields__row">

            <p>Этап подготовки</p>

            <!--Ссылка на паспорт проекта-->
            <label for="passport_project">Ссылка на паспорт проекта <span class="modal__button">инструкция</span></label>
            <input type="text" id="passport_project" name="passport_project" value="<?= htmlspecialchars($task['passport_project']) ?>">

            <label for="start_protocol">Приказ о начале проекта</label>
            <input type="text" id="start_protocol" name="start_protocol" placeholder="ссылка на файл" value="<?= htmlspecialchars($task['start_protocol']) ?>">

            <label for="photo_before">Фото до</label>
            <input type="text" id="photo_before" name="photo_before" placeholder="ссылка на файл" value="<?= htmlspecialchars($task['photo_before']) ?>">

            <p>Этап реализации</p>

            <!--Ссылка на презентацию проекта-->
            <label for="presentation_project">Ссылка на презентацию проекта <span class="modal__button">инструкция</span></label>
            <input type="text" id="presentation_project" name="presentation_project" value="<?= htmlspecialchars($task['presentation_project']) ?>">

            <label for="kickoff_protocol">Протокол запускающего совещания(Kick-off)</label>
            <input type="text" id="kickoff_protocol" name="kickoff_protocol" placeholder="ссылка на файл" value="<?= htmlspecialchars($task['kickoff_protocol']) ?>">

            <p>Этап мониторинга</p>

            <label for="photo_after">Фото после</label>
            <input type="text" id="photo_after" name="photo_after" placeholder="ссылка на файл" value="<?= htmlspecialchars($task['photo_after']) ?>">

            <p>Этап завершения</p>

            <label for="finish_protocol">Протокол закрытия проекта</label>
            <input type="text" id="finish_protocol" name="finish_protocol" placeholder="ссылка на файл" value="<?= htmlspecialchars($task['finish_protocol']) ?>">

        </div>
    </div>

    <div class="form-button">
        <button type="submit" class="button">Обновить проект</button>
    </div>

</form>

<div class="modal__window">
    <div class="modal__main">
        <h2 class="modal__title">Инструкция по заполнению паспорта проекта</h2>
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
        <h2 class="modal__title">Инструкция по оформлению презентации проекта</h2>
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