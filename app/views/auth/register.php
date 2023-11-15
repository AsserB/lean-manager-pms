<?php

ob_start();

?>

<form class="form" method="POST" action="/users/store">
    <h1 class="form-title">Регистрация</h1>
    <div class="form-fields">
        <input type="text" placeholder="ФИО" id="username" name="username" required>
        <?php if (isset($error)) : tte($error) ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
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
                <option>Прочие</option>
            </select>
        </div>
        <input type="password" placeholder="Пароль" id="password" name="password" required>
        <input type="password" placeholder="Повторите пароль" id="confirm_password" name="confirm_password" required>
    </div>
    <div class="form-button">
        <button type="submit" class="button">Зарегистрироваться</button>
    </div>

    <div class="form-info">
        <p>Нажимая кнопку "Зарегистрироваться", Вы соглашаетесь
            c условиями <a class="text-primary" href="/info/policy">"политики конфиденциальности"</a></p>
        <p>Если у вас уже есть аккаунт
            <a href="/auth/login"><?= htmlspecialchars("Авторизация") ?></a>
        </p>
    </div>
</form>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>