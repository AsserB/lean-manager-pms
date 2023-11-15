<?php
// http://leanmanager/index.php?page=category
ob_start();
?>

<header class="content-header">
    <h1 class="title">Все проекты</h1>
</header>

<!--<h2 class="filter-status-title">Сортировка по статусу проекта</h2>
<div class="filter-status">
    <a data-status="Новый проект" class="sort-btn" href="#">Новый проект</a>
    <a data-status="Проект в работе" class="sort-btn" href="#">Проект в работе</a>
    <a data-status="Проект просрочен" class="sort-btn" href="#">Проект просрочен</a>
    <a data-status="Проект завершен" class="sort-btn" href="#">Проект завершен</a>
</div>-->

<ol class="accordion" id="tasks-accordion">
    <?php foreach ($tasks as $oneTask) : ?>

        <li class="accordion-item mb-2">
            <div class="accordion-header" id="task-<?php echo $oneTask['id']; ?>">
                <h2 class="accordion-header col-12 col-md-6">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#task-collapse-<?php echo $oneTask['id']; ?>" aria-expanded="false" aria-controls="task-collapse-<?php echo $oneTask['id']; ?>">
                        <span class="accordion-header-item"><strong><?php echo $oneTask['title']; ?></strong></span>
                        <span class="accordion-header-item"><span><span><strong>Организация</strong> </span><?php echo $oneTask['job_place']; ?></span></span>
                        <span class="accordion-header-item"><span><span><strong>Руководитель проекта</strong> </span><?php echo $oneTask['team_lead']; ?></span></span>
                    </button>
                </h2>
            </div>
            <div id="task-collapse-<?php echo $oneTask['id']; ?>" class="accordion-collapse collapse row" aria-labelledby="task-<?php echo $oneTask['id']; ?>" data-bs-parent="#tasks-accordion">
                <div class="accordion-body">
                    <div class="accordion-body-row">
                        <div class="row">
                            <p><strong>Краткое описание проекта:</strong><?php echo htmlspecialchars($oneTask['description'] ?? ''); ?></p>
                            <div class="row-info">
                                <img src="/app/vendors/img/icon/warning.png" alt="Для просмотра полной информации необходимо пройти авторизацию">
                                <p style="text-align: center;">Для просмотра полной информации необходимо пройти <a href="/auth/login">авторизацию</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
        </li>
</ol>

<script>
    //Обновление даты до истечения срока задачи в заголовке аккардиона
    function updateRemainingTime() {
        const dueDateElements = document.querySelectorAll('.due-date');
        const now = new Date();

        dueDateElements.forEach((element) => {
            const dueDate = new Date(element.textContent);
            const timeDiff = dueDate - now;

            if (timeDiff > 0) {
                const days = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
                const hours = Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));

                element.textContent = `Дней до окончания проекта: ${days}`;
            } else {
                element.textContent = 'Проект просрочен';
            }
        });
    }

    updateRemainingTime();
    setInterval(updateRemainingTime, 7200000); // Update every minute
</script>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>