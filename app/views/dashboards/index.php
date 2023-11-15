<?php
// http://leanmanager/index.php?page=pages
ob_start();
?>

<header class="content-header">
    <h1 class="title">Дашборд</h1>
</header>

<div class="dashboards">
    <div class="dashboards-list">
        <div class="dashboards-item">
            <h2 class="dashboards-title">Количество проектов</h2>
            <div class="dashboards-item-body">
                <img src="/app/vendors/img/dashboards/projects.png" alt="Количество проектов">
                <p><?= $dashboardsTasks ?></p>
            </div>
        </div>

        <div class="dashboards-item">
            <h2 class="dashboards-title">Количество пользователей</h2>
            <div class="dashboards-item-body">
                <img src="/app/vendors/img/dashboards/users.png" alt="Количество пользователей">
                <p><?= $dashboardsUsers ?></p>
            </div>
        </div>

        <div class="dashboards-item">
            <h2 class="dashboards-title">Количество организаций</h2>
            <div class="dashboards-item-body">
                <img src="/app/vendors/img/dashboards/jobplace.png" alt="Количество организаций">
                <p><?= $dashboardsJobPlace ?></p>
            </div>
        </div>

        <div class="dashboards-item">
            <h2 class="dashboards-title">Доля проектов</h2>
            <div class="dashboards-item-body">
                <div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
        <div class="dashboards-item">
            <h2 class="dashboards-title">Типы организаций</h2>
            <div class="dashboards-item-body">
                <div>
                    <canvas id="myChartOrgType"></canvas>
                </div>
            </div>
        </div>
        <div class="dashboards-item dashboards-item-scroll">
            <h2 class="dashboards-title">Реестр организаций</h2>
            <div class="dashboards-item-body">
                <table class="table dashboards-table">
                    <thead>
                        <tr>
                            <th class="table-row" scope="col">Место работы</th>
                            <th class="table-row" scope="col">Тип организации</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?php echo $user['job_place']; ?></td>
                                <td><?php echo $user['org_type']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="dashboards-item dashboards-item-scroll">
            <h2 class="dashboards-title">Реестр проектов</h2>
            <div class="dashboards-item-body">
                <table class="table dashboards-table">
                    <thead>
                        <tr>
                            <th class="table-row" scope="col">Название проекта</th>
                            <th class="table-row" scope="col">организация</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tasks as $oneTask) : ?>
                            <tr>
                                <td><?php echo $oneTask['title']; ?></td>
                                <td><?php echo $oneTask['job_place']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="dashboards-item dashboards-item-scroll">
            <h2 class="dashboards-title">Статус образца</h2>
            <div class="dashboards-item-body">
                <ul class="dashboards-item-body-list">
                    <li class="dashboards-item-body-item">
                        <img src="/app/vendors/img/dashboards/logo-college/yadt.png" alt="ГАПОУ РС(Я) «Якутский автодорожный техникум»">
                        <p>ГАПОУ РС(Я) «Якутский автодорожный техникум»</p>
                        <p class="dashboards-item-body-list-icon">Ф</p>
                    </li>
                    <li class="dashboards-item-body-item">
                        <img src="/app/vendors/img/dashboards/logo-college/yaipk.jpg" alt="ГБПОУ РС (Я) «Якутский индустриально-педагогический колледж имени В.М. Членова»">
                        <p>ГБПОУ РС (Я) «Якутский индустриально-педагогический колледж имени В.М. Членова»</p>
                        <p class="dashboards-item-body-list-icon">Р</p>
                    </li>
                    <li class="dashboards-item-body-item">
                        <img src="/app/vendors/img/dashboards/logo-college/yamk.png" alt="ГАПОУ РС(Я) «Якутский медицинский колледж»">
                        <p>ГАПОУ РС(Я) «Якутский медицинский колледж»</p>
                        <p class="dashboards-item-body-list-icon">М</p>
                    </li>
                    <li class="dashboards-item-body-item">
                        <img src="/app/vendors/img/dashboards/logo-college/yapk.png" alt="ГАПОУ РС(Я) Якутский педагогический колледж им. С.Ф.Гоголева">
                        <p>ГАПОУ РС(Я) Якутский педагогический колледж им. С.Ф.Гоголева</p>
                        <p class="dashboards-item-body-list-icon">М</p>
                    </li>
                </ul>
            </div>
        </div>

        <div class="dashboards-item dashboards-item-scroll">
            <h2 class="dashboards-title">Фабрика процессов</h2>
            <div class="dashboards-item-body">
                <ul class="dashboards-item-body-list">
                    <li class="dashboards-item-body-item">
                        <img src="/app/vendors/img/dashboards/logo-college/yadt.png" alt="ГАПОУ РС(Я) «Якутский автодорожный техникум»">
                        <p>ГАПОУ РС(Я) «Якутский автодорожный техникум»</p>
                        <p class="dashboards-item-body-list-icon">2</p>
                    </li>
                    <li class="dashboards-item-body-item">
                        <img src="/app/vendors/img/dashboards/logo-college/yaipk.jpg" alt="ГБПОУ РС (Я) «Якутский индустриально-педагогический колледж имени В.М. Членова»">
                        <p>ГБПОУ РС (Я) «Якутский индустриально-педагогический колледж имени В.М. Членова»</p>
                        <p class="dashboards-item-body-list-icon">1</p>
                    </li>
                </ul>
            </div>
        </div>

        <div style="box-shadow: unset;" class="dashboards-item">

        </div>

        <div style="box-shadow: unset;" class="dashboards-item">

        </div>

    </div>
</div>

<script>
    //По типам организации
    let dbDO = <?= $dashboardsDO ?>;
    let dbOO = <?= $dashboardsOO ?>;
    let dbSPO = <?= $dashboardsSPO ?>;
    let dbVO = <?= $dashboardsVO ?>;
    let dbIR = <?= $dashboardsIR ?>;
    let dbDPO = <?= $dashboardsDPO ?>;
</script>

<script>
    //По категориям
    let dbSchool = <?= $dashboardsSchool ?>;
    let dbRegion = <?= $dashboardsRegion ?>;
    let dbEvent = <?= $dashboardsEvent ?>;
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>