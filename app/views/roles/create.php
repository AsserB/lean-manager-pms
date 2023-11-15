<?php
// http://leanmanager/index.php?page=roles&action=create
ob_start(); 
?>

<form class="form" method="POST" action="/roles/store">
    <h1 class="form-title">Добавить роли</h1>
    <div class="form-fields">
        <input type="text" placeholder="Название роли" id="rolename" name="role_name" required>
        <textarea type="text" placeholder="Описание роли" name="role_description" id="roledescription" cols="30" rows="5"></textarea>
    </div>
    <div class="form-button">
        <button type="submit" class="button">Создать роль</button>
    </div>
</form>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>