<?php
// http://leanmanager/index.php?page=users
ob_start();
?>

<header class="content-header">
    <h1 class="title">Список пользователей</h1>
</header>

<div class="users-header">
    <a href="/users/create" class="btn">Добавить пользователя</a>
</div>


<table class="table">
    <thead>
        <tr>
            <th class="table-row" scope="col">id</th>
            <th class="table-row" scope="col">ФИО</th>
            <th class="table-row" scope="col">Электронная почта</th>
            <th class="table-row" scope="col">Номер телефона</th>
            <th class="table-row" scope="col">Должность</th>
            <th class="table-row" scope="col">Место работы</th>
            <th class="table-row" scope="col">Тип организации</th>
            <th class="table-row" scope="col">Админ</th>
            <th class="table-row" scope="col">Роль</th>
            <th class="table-row" scope="col">Действие</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['phone_number']; ?></td>
                <td><?php echo $user['job_title']; ?></td>
                <td><?php echo $user['job_place']; ?></td>
                <td><?php echo $user['org_type']; ?></td>
                <td><?php echo $user['is_admin'] ? 'Да' : 'Нет'; ?></td>
                <td><?php echo $user['role']; ?></td>


                <td>
                    <div class="td-wrapper">
                        <a class="green" href="/users/edit/<?php echo $user['id']; ?>">Редактировать</a>
                        <a class="red" onclick="return confirm('Вы уверены в этом')" href="/users/delete/<?php echo $user['id']; ?>">Удалить</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>