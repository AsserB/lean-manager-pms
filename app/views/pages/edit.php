<?php
// http://leanmanager/index.php?page=pages&action=create
ob_start(); 
?>

<form class="form" method="POST" action="/pages/update/<?php echo $page['id'];?>">
    <input type="hidden" name="id" value="<?= $page['id'] ?>">
    <h1 class="form-title">Редактирование страницы</h1>
    <div class="form-fields">

        <label>Заголовок страницы</label>
        <input type="text" placeholder="Заголовок страницы" id="title" name="title" value="<?php echo $page['title']?>"
            required>

        <label>Адрес страницы</label>
        <input type="text" placeholder="Адрес страницы" id="slug" name="slug" value="<?php echo $page['slug']?>"
            required>

    </div>

    <div class="form-checkbox">
        <label>Роли</label>
        <?php $page_roles = explode(',', $page['role']); ?>
        <?php foreach ($roles as $role): ?>
        <input type="checkbox" id="remember" name="roles[]" value="<?php echo $role['id']; ?>" <?php echo in_array($role['id'], $page_roles) ? 'checked' : '';?>>
        <span><?php echo $role['role_name']; ?></span>
        <?php endforeach;?>
    </div>

    <div class="form-button">
        <button type="submit" class="button">Обновить</button>
    </div>
</form>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>