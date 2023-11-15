<?php
// http://leanmanager/index.php?page=roles&action=create
ob_start(); 
?>

<form class="form" method="POST" action="/todo/category/store">
    <h1 class="form-title">Добавить категорию</h1>
    <div class="form-fields">
        <input type="text" placeholder="Название категории" id="title" name="title" required>
        <textarea type="text" placeholder="Описание категории" name="description" id="description" cols="30" rows="5"></textarea>
    </div>
    <div class="form-button">
        <button type="submit" class="button">Создать категорию</button>
    </div>
</form>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>