<?php
ob_start();
?>

<form class="form" method="POST" action="/users/changepassword">
    <h1 class="form-title">Восстановление пароля</h1>
    <div class="form-fields">
        <label for="password">Код подтверждения</label>
        <input type="text" id="temp_passwords" name="temp_password" required>
        <label for="password">Новый пароль</label>
        <input type="password" id="password" name="password" required>
        <div class="form-button">
            <button type="submit" class="button">Изменить пароль</button>
        </div>
</form>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>