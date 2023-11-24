<?php
// http://leanmanager/index.php?page=roles&action=create
ob_start();
?>

<form class="form" method="POST" action="/todo/comments/store">
    <h1 class="form-title">Добавить комментарий</h1>
    <div class="form-fields">
        <textarea type="text" placeholder="введите комментарий" name="comment_text" id="comment_text" cols="30" rows="5"></textarea>
    </div>
    <div class="form-button">
        <button type="submit" class="button">Добавить комментарий</button>
    </div>
</form>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>