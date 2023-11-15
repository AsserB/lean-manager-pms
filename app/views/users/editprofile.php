<?php
// http://leanmanager/index.php?page=users&action=create
ob_start();
?>

<form class="form" method="POST" action="/users/updateprofile/<?php echo $user['id']; ?>">
    <input type="hidden" name="id" value="<?= $user['id'] ?>">
    <h1 class="form-title">Редактирование пользователя</h1>
    <div class="form-fields">

        <label>ФИО пользователя</label>
        <input type="text" placeholder="ФИО" id="username" name="username" value="<?php echo $user['username'] ?>">

        <label>Электронная почта</label>
        <input type="email" placeholder="Электронная почта" id="email" name="email" value="<?php echo $user['email'] ?>">

        <label>Номер телефона</label>
        <input type="tel" placeholder="Номер телефона" id="phone_number" name="phone_number" value="<?php echo $user['phone_number'] ?>">

        <label>Должность</label>
        <input type="text" placeholder="Должность" id="job_title" name="job_title" value="<?php echo $user['job_title'] ?>">

        <label>Место работы</label>
        <input type="text" placeholder="Место работы" id="job_place" name="job_place" value="<?php echo $user['job_place'] ?>">

    </div>
    <div class="form-button">
        <button type="submit" class="button">Обновить</button>
    </div>
</form>

<?php $content = ob_get_clean();

include 'app/views/layout.php'

?>