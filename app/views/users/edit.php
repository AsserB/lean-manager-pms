<?php
// http://leanmanager/index.php?page=users&action=create
ob_start(); 
?>

<form class="form" method="POST" action="/users/update/<?php echo $user['id']; ?>">
    <h1 class="form-title">Редактирование пользователя</h1>
    <div class="form-fields">

        <label>ФИО пользователя</label>
        <input type="text" placeholder="ФИО" id="username" name="username" value="<?php echo $user['username']?>"
            required>

        <label>Электронная почта</label>
        <input type="email" placeholder="Электронная почта" id="email" name="email" value="<?php echo $user['email']?>"
            required>

        <label>Роль пользователя</label>
        <div class="form-select-wrapper">
            <select class="form-select mb-3" name="role">
                <?php foreach($roles as $role): ?>
                    <option value="<?php echo $role['id'];?>"<?php echo $user['role'] == $role['id'] ? 'selected' : ''; ?>> <?php echo $role['role_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

    </div>
    <div class="form-button">
        <button type="submit" class="button">Обновить</button>
    </div>
</form>

<?php $content = ob_get_clean();

include 'app/views/layout.php'

?>