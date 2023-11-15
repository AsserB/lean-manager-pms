<?php
ob_start();
?>

<form class="form" method="POST" action="/auth/authenticate">
    <h1 class="form-title">Авторизация</h1>
    <div class="form-fields">
        <input type="email" placeholder="Электронная почта" id="email" name="email" required>
        <input type="password" placeholder="Пароль" id="password" name="password" required>
        <div class="form-button">
            <button type="submit" class="button">Войти</button>
        </div>
        <div class="form-checkbox">
            <input type="checkbox" id="remember" name="remember">
            <span>запомнить меня</span>
        </div>
        <div class="form-info">
            <p>Если у вас нет аккаунта то пройти
                <a href="/auth/register"><?= htmlspecialchars("Регистрацию") ?></a>
            </p>
        </div>

</form>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>