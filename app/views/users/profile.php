<?php
ob_start();
?>

<!-- Основной контент -->
<div class="profile-wrapper">
    <div class="profile">
        <h1 class="pofile-title"><strong>Настройки профиля</strong></h1>
        <p><strong>ФИО:</strong> <?php echo $user['username']; ?></p>
        <p><strong>Email:</strong> <?php echo $user['email']; ?> (<a class="profile-link" href="/auth/logout">выйти</a>)</p>
        <p><strong>Номер телефона:</strong> <?php echo $user['phone_number']; ?></p>
        <p><strong>Должность:</strong> <?php echo $user['job_title']; ?></p>
        <p><strong>Место работы:</strong> <?php echo $user['job_place']; ?></p>
        <p><strong>Тип организации:</strong> <?php echo $user['org_type']; ?></p>
        <p><strong>Роль:</strong> <?php echo $role['role_name']; ?></p>
        <p><strong>Аккаунт создан:</strong> <?php echo $user['created_at']; ?></p>

        <a class="profile-button" href="/users/editprofile/<?php echo $user['id']; ?>">Редактировать</a>
    </div>


    <!--<div class="telegram">
        <h1 class="pofile-title"><strong>Генерация одноразового пароля</strong></h1>
        <h2 class="pofile-subtitle"><strong>Ваш пароль для телеграма:</strong><?= $otp; ?></h2>
        <p>Перейдите в телеграм и найдите в поиске бота: <a class="profile-link" target="_blank" href="https://t.me/leanMbot">@leanMbot</a>. Введите там команду <strong>/start</strong> и следуйте инструкции</p>
        <?php if ($visible) : ?>
            <p>Данный единоразовый пароль после нажатия "Сохранить пароль будет записан в базу данных и в течении 1 часа будет доступен для авторизации в телеграм боте"</p>

            <form action="/users/otpstore" method="POST">
                <input type="hidden" name="otp" value="<?= $otp; ?>">
                <input type="hidden" name="user_id" value="<?= $_SESSION['user_id']; ?>">
                <button type="submit" class="button">Сохранить пароль</button>
            </form>
        <?php endif ?>
    </div>
</div>-->


    <?php $content = ob_get_clean();

    include 'app/views/layout.php';
    ?>