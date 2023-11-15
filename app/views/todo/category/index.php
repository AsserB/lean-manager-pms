<?php
// http://leanmanager/index.php?page=category
ob_start(); 
?>

<header class="content-header">
    <h1 class="title">Список Категорий</h1>
</header>

<div class="users-header">
    <a href="/todo/category/create" class="btn">Добавить Категории</a>
</div>


<table class="table">
    <thead>
        <tr>
            <th class="table-row" scope="col">id</th>
            <th class="table-row" scope="col">Заголовок</th>
            <th class="table-row" scope="col">Описание категории</th>
            <th class="table-row" scope="col">usability</th>
            <th class="table-row" scope="col">Действие</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($categories as $category): ?>
        <tr>
            <td><?php echo $category['id']; ?></td>
            <td><?php echo $category['title']; ?></td>
            <td><?php echo $category['description']; ?></td>
            <td><?php echo $category['usability'] == 1 ? 'Да' : 'Нет'; ?></td>
            <td>
                <div class="td-wrapper">
                    <a class="green"
                        href="/todo/category/edit/<?php echo $category['id']; ?>">Редактировать</a>
                    <a class="red" onclick="return confirm('Вы уверены в этом')"
                        href="/todo/category/delete/<?php echo $category['id']; ?>">Удалить</a>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>