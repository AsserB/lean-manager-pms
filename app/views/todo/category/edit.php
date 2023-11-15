<?php
// http://leanmanager/index.php?page=roles&action=create
ob_start(); 
?>

<form class="form" method="POST" action="/todo/category/update/<?php echo $category['id'];?>">
    <input type="hidden" name="id" value="<?= $category['id'] ?>">
    <h1 class="form-title">Редактирование категории</h1>
    <div class="form-fields">

        <label>Название категории</label>
        <input type="text" placeholder="Название категории" id="title" name="title"
            value="<?php echo $category['title']?>" required>

        <label>Описание категории</label>
        <textarea type="text" placeholder="Описание категории" name="description" id="description" cols="30" rows="5"
            required><?php echo $category['description']?></textarea>

        <div class="form-checkbox">
            <label>Использования</label>
            <input type="checkbox" id="usability" name="usability" value="1" <?php echo $category['usability'] ? 'checked' : ''; ?>>    
        </div>

    </div>
    <div class="form-button">
        <button type="submit" class="button">Обновить</button>
    </div>
</form>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>