<?php
// http://leanmanager/index.php?page=category
ob_start();
?>

<header class="content-header">
    <h1 class="title">Список комментарий</h1>
</header>

<div class="users-header">
    <a href="/todo/comments/create" class="btn">Добавить Категории</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th class="table-row" scope="col">id</th>
            <th class="table-row" scope="col">user_id</th>
            <th class="table-row" scope="col">task_id</th>
            <th class="table-row" scope="col">Комментарий</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($comments as $comment) : ?>
            <tr>
                <td><?php echo $comment['id']; ?></td>
                <td><?php echo $comment['username']; ?></td>
                <td><?php echo $comment['task_id']; ?></td>
                <td><?php echo $comment['comment_text']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>