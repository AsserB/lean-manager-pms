<?php
// http://leanmanager/index.php?page=users
ob_start();
?>

<header class="content-header">
    <h1 class="title">Отчет по проектам</h1>
</header>
<button class="button" id="button-excel">Сохранить excel</button>
<table class="report-table" cols="15" id="simpleTable1">
    <thead>
        <tr>
            <th>Организация</th>
            <th>Наименование проекта</th>
            <th>Подпроект</th>
            <th class="report-table-desc-header">Результаты проекта</th>
            <th scope="col">Начало проекта</th>
            <th scope="col">Кик-офф</th>
            <th scope="col">Закрытие проекта</th>
            <th scope="col">Руководитель проекта</th>
            <th scope="col">Приказ о начале проекта</th>
            <th scope="col">Паспорт проекта</th>
            <th class="report-table-desc-header">Презентация проекта</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reportTasks as $oneTask) : ?>
            <tr>
                <td>
                    <p><?php echo $oneTask['job_place']; ?></p>
                </td>
                <td>
                    <p><?php echo $oneTask['title']; ?></p>
                </td>
                <td>
                    <p><?php echo $oneTask['category_id']; ?></p>
                </td>
                <td>
                    <p class="report-table-max"><?php echo $oneTask['description']; ?></p>
                </td>
                <td>
                    <p><?php echo $oneTask['start_date']; ?></p>
                </td>
                <td>
                    <p><?php echo $oneTask['kick_off_date']; ?></p>
                </td>
                <td>
                    <p><?php echo $oneTask['finish_date']; ?></p>
                </td>
                <td>
                    <p><?php echo $oneTask['team_lead']; ?></p>
                </td>
                <td>
                    <p><?php echo $oneTask['start_protocol']; ?></p>
                </td>
                <td>
                    <p><?php echo $oneTask['passport_project']; ?></p>
                </td>
                <td>
                    <p class="report-table-min"><?php echo $oneTask['presentation_project']; ?></p>
                </td>
                <td></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>



<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>

<script>
    let button = document.querySelector("#button-excel");

    button.addEventListener("click", e => {
        let table = document.querySelector("#simpleTable1");
        TableToExcel.convert(table);
    });
</script>

<?php $content = ob_get_clean();


include 'app/views/layout.php'
?>