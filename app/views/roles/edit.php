<?php
// http://leanmanager/index.php?page=roles&action=create
ob_start(); 
?>

<form class="form" method="POST" action="/roles/update">
    <input type="hidden" name="id" value="<?= $role['id'] ?>">
    <h1 class="form-title">Редактирование роли</h1>
    <div class="form-fields">

        <label>Название роли</label>
        <input type="text" placeholder="Название роли" id="rolename" name="role_name"
            value="<?php echo $role['role_name']?>" required>

        <label>Описание роли</label>
        <textarea type="text" placeholder="Описание роли" name="role_description" id="role_description" cols="30"
            rows="5" required><?php echo $role['role_description']?></textarea>

    </div>
    <div class="form-button">
        <button type="submit" class="button">Обновить</button>
    </div>
</form>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>