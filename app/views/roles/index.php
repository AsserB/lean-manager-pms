<?php
// http://leanmanager/index.php?page=roles
ob_start(); 
?>

<header class="content-header">
    <h1 class="title">Список ролей</h1>
</header>

<div class="users-header">
    <a href="/roles/create" class="btn">Добавить роли</a>
</div>


<table class="table">
    <thead>
        <tr>
            <th class="table-row" scope="col">id</th>
            <th class="table-row" scope="col">Роль</th>
            <th class="table-row" scope="col">Описание роли</th>
            <th class="table-row" scope="col">Действие</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($roles as $role): ?>
        <tr>
            <td><?php echo $role['id']; ?></td>
            <td><?php echo $role['role_name']; ?></td>
            <td><?php echo $role['role_description']; ?></td>
            <td>
                <div class="td-wrapper">
                    <a class="green"
                        href="/roles/edit/<?php echo $role['id']; ?>">Редактировать</a>
                    <!--<a class="red" onclick="return confirm('Вы уверены в этом')"
                        href="/roles/delete/<?php echo $role['id']; ?>">Удалить</a>-->
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>