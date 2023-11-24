<?php
// http://leanmanager/index.php?page=category
ob_start();
?>

<header class="content-header">
    <h1 class="title">Список предложений по улучшению</h1>
</header>

<div class="users-header">
    <a href="/ppu/create" class="btn">Добавить ППУ</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th class="table-row" scope="col">ФИО</th>
            <th class="table-row" scope="col">Должность</th>
            <th class="table-row" scope="col">Подразделение</th>
            <th class="table-row" scope="col">Название ППУ</th>
            <th class="table-row" scope="col">Область улучшений</th>
            <th class="table-row" scope="col">Описание проблемы</th>
            <th class="table-row" scope="col">Метод решения проблемы</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ppu as $ppus) : ?>
            <tr>
                <td><?php echo $ppus['username']; ?></td>
                <td><?php echo $ppus['job_title']; ?></td>
                <td><?php echo $ppus['job_sp']; ?></td>
                <td><?php echo $ppus['ppu_title']; ?></td>
                <td><?php echo $ppus['ppu_type']; ?></td>
                <td><?php echo $ppus['ppu_description']; ?></td>
                <td><?php echo $ppus['ppu_solution']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>