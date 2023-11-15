<?php
// http://leanmanager/index.php?page=pages
ob_start(); 
?>

<header class="content-header">
    <h1 class="title">Список страниц</h1>
</header>

<div class="users-header">
    <a href="/pages/create" class="btn">Добавить страницу</a>
</div>


<table class="table">
    <thead>
        <tr>
            <th class="table-row" scope="col">id</th>
            <th class="table-row" scope="col">Название страницы</th>
            <th class="table-row" scope="col">Адрес страницы</th>
            <th class="table-row" scope="col">Уровни доступа (роли)</th>
            <th class="table-row" scope="col">Действие</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($pages as $page): ?>
        <tr>
            <td><?php echo $page['id']; ?></td>
            <td><?php echo $page['title']; ?></td>
            <td><?php echo $page['slug']; ?></td>
            <td><?php echo $page['role']; ?></td>
            <td>
                <div class="td-wrapper">
                    <a class="green"
                        href="/pages/edit/<?php echo $page['id']; ?>">Редактировать</a>
                   <a class="red" onclick="return confirm('Вы уверены в этом')"
                        href="/pages/delete/<?php echo $page['id']; ?>">Удалить</a>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>