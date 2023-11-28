<?php
ob_start();
?>

<form class="form" method="POST" action="/users/recoverpassword">
    <h1 class="form-title">Забыли пароль?</h1>
    <div class="form-info">
        <p>Ничего страшного, введите свой email, и мы вышлем Вам инструкции по восстановлению пароля.</p>
    </div>
    <div class="form-fields">
        <input type="email" placeholder="Электронная почта" id="email" name="email" required>
        <div class="form-button">
            <button type="submit" class="button">Восстановить пароль</button>
        </div>
        <div class="form-info">
            <p>Письмо с инструкцией может попасть в <strong>СПАМ</strong> обязательно проверьте</p>
        </div>
</form>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>