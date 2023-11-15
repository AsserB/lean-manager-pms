<?php
// http://leanmanager/index.php?page=users&action=create
ob_start();
?>

<form class="form" method="POST" action="/users/store">
    <h1 class="form-title">Добавить пользователя</h1>
    <div class="form-fields">
        <input type="text" placeholder="ФИО" id="username" name="username" required>
        <input type="email" placeholder="Электронная почта" id="email" name="email" required>
        <input type="tel" placeholder="Номер телефона" id="phone_number" name="phone_number" required>
        <input type="text" placeholder="Должность" id="job_title" name="job_title" required>
        <input type="text" placeholder="Место работы" id="job_place" name="job_place" required>

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
        <input type="password" placeholder="Пароль" id="password" name="password" required>
        <input type="password" placeholder="Повторите пароль" id="confirm_password" name="confirm_password" required>
    </div>
    <div class="form-button">
        <button type="submit" class="button">Создать</button>
    </div>
</form>

<?php $content = ob_get_clean();
include 'app/views/layout.php'
?>