<?php
// http://leanmanager/index.php?page=pages&action=create
ob_start(); 
?>

<form class="form" method="POST" action="/pages/store">
    <h1 class="form-title">Добавить страницу</h1>
    <div class="form-fields">
        <input type="text" placeholder="Заголовок страницы" id="title" name="title" required>
        <input type="text" placeholder="Адрес страницы" id="slug" name="slug" required>
        <div class="form-checkbox">
            <label>Роли</label>
            <?php foreach ($roles as $role): ?>
            <input type="checkbox" id="remember" name="roles[]" value="<?php echo $role['id']; ?>">
            <span><?php echo $role['role_name']; ?></span>
            <?php endforeach;?>
        </div>
    </div>
    <div class="form-button">
        <button type="submit" class="button">Создать страницу</button>
    </div>
</form>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>