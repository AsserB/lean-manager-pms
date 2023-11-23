<?php
// http://leanmanager/index.php?page=category
ob_start();
?>

<header class="content-header">
    <h1 class="title">Проекты на проверке</h1>
</header>

<ol class="accordion" id="tasks-accordion">
    <?php foreach ($onChektasks as $oneTask) : ?>

        <?php
        //Разделение проектов по цвету в зависимости от статуса проекта
        $moderationColor = '';
        switch ($oneTask['moderation']) {
            case 'Проект на проверке':
                $moderationColor = '#4169E1';
                break;
            case 'Проект не доделан':
                $moderationColor = '#FF4500';
                break;
            case 'Проект проверен':
                $moderationColor = '#228B22';
                break;
        }

        $statusColor = '';
        switch ($oneTask['status']) {
            case 'В разработке':
                $statusColor = '#4169E1';
                break;
            case 'Проект запущен':
                $statusColor = '#228B22';
                break;
            case 'В стадии реализации':
                $statusColor = '#4054b2';
                break;
            case 'Проект завершен':
                $statusColor = '#696969';
                break;
            case 'Проект просрочен':
                $statusColor = '#FF0000';
                break;
        }

        ?>

        <li class="accordion-item mb-2">
            <div class="accordion-header" id="task-<?php echo $oneTask['id']; ?>">
                <h2 class="accordion-header col-12 col-md-6">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#task-collapse-<?php echo $oneTask['id']; ?>" aria-expanded="false" aria-controls="task-collapse-<?php echo $oneTask['id']; ?>">
                        <span class="accordion-header-item"><strong><?php echo $oneTask['title']; ?></strong></span>
                        <span class="accordion-header-item accardion-header-item-hide"><strong>Статус проекта:</strong><span style="background-color: <?= $statusColor ?>;" class="span-border"><?php echo $oneTask['status']; ?></span></span>
                        <span class="accordion-header-item"><strong class="accordion-header-item-moderation">Статус модерации:</strong><span style="background-color: <?= $moderationColor ?>;" class="span-border"><?php echo $oneTask['moderation']; ?></span></span>
                        <span class="accordion-header-item accardion-header-item-hide"><strong>Срок проекта:</strong> <span class="due-date"><?php echo $oneTask['finish_date']; ?></span></span>
                    </button>
                </h2>
            </div>
            <div id="task-collapse-<?php echo $oneTask['id']; ?>" class="accordion-collapse collapse row" aria-labelledby="task-<?php echo $oneTask['id']; ?>" data-bs-parent="#tasks-accordion">
                <div class="accordion-body">
                    <div class="accordion-body-row">
                        <div class="accordion-body-row">
                            <div class="row row-one">
                                <p><strong>Подпроект:</strong> <?php echo htmlspecialchars($oneTask['category_id'] ?? 'N/A'); ?>
                                </p>
                                <p><strong>Название проекта:</strong>
                                    <?php echo htmlspecialchars($oneTask['title'] ?? 'N/A'); ?>
                                </p>
                                <p><strong>Тип организации:</strong>
                                    <?php echo htmlspecialchars($oneTask['org_type'] ?? 'N/A'); ?>
                                </p>
                                <p><strong>Название организации:</strong>
                                    <?php echo htmlspecialchars($oneTask['job_place'] ?? 'N/A'); ?></p>
                                <p><strong>Заказчик:</strong> <?php echo htmlspecialchars($oneTask['customer'] ?? 'N/A'); ?></p>
                                <p><strong>Руководитель проекта:</strong>
                                    <?php echo htmlspecialchars($oneTask['team_lead'] ?? 'N/A'); ?>
                                </p>
                                <p><strong>Контакты руководителя:</strong>
                                    <?php echo htmlspecialchars($oneTask['lead_email'] ?? 'N/A'); ?>
                                </p>
                                <p><strong>Краткое описание проекта:</strong>
                                    <?php echo htmlspecialchars($oneTask['description'] ?? ''); ?></p>
                            </div>
                            <div class="row row-two">
                                <p><strong>Статус проекта:</strong> <?php echo htmlspecialchars($oneTask['status']); ?></p>
                                <p><strong>Модерация:</strong> <?php echo htmlspecialchars($oneTask['moderation']); ?></p>
                                <p><strong>Дата открытия проекта:</strong>
                                    <?php echo htmlspecialchars($oneTask['start_date']); ?>
                                </p>
                                <p><strong>Дата Кик-офф:</strong> <?php echo htmlspecialchars($oneTask['kick_off_date']); ?></p>
                                <p><strong>Дата завершения проекта:</strong>
                                    <?php echo htmlspecialchars($oneTask['finish_date']); ?>
                                </p>
                            </div>
                            <div class="row row-three">
                                <h3><strong>Этапы реализации проекта</strong></h3>
                                <h4><strong>1. Этап подготовки:</strong></h4>
                                <p><a class="text-primary" href="<?php echo $oneTask['passport_project'] ?>" target=»_blank><strong>Ссылка на паспорт проекта:</strong>
                                        <?php echo htmlspecialchars($oneTask['passport_project'] ?? 'N/A'); ?></a></p>
                                <p><a class="text-primary" href="<?php echo $oneTask['start_protocol'] ?>" target=»_blank><strong>Ссылка на приказ о начале проекта:</strong>
                                        <?php echo htmlspecialchars($oneTask['start_protocol'] ?? 'N/A'); ?></a></p>
                                <p><a class="text-primary" href="<?php echo $oneTask['photo_before'] ?>" target=»_blank><strong>Ссылка на фото "до старта проекта":</strong>
                                        <?php echo htmlspecialchars($oneTask['photo_before'] ?? 'N/A'); ?></a></p>
                                <h4><strong>2. Этап реализации:</strong></h4>
                                <p><a class="text-primary" href="<?php echo $oneTask['presentation_project'] ?>" target=»_blank><strong>Ссылка на презентацию проекта:</strong>
                                        <?php echo htmlspecialchars($oneTask['presentation_project'] ?? 'N/A'); ?></a></p>
                                <p><a class="text-primary" href="<?php echo $oneTask['kickoff_protocol'] ?>" target=»_blank><strong>Ссылка на протокол запускающего совещания(Kick-off):</strong>
                                        <?php echo htmlspecialchars($oneTask['kickoff_protocol'] ?? 'N/A'); ?></a></p>
                                <h4><strong>3. Этап мониторинга:</strong></h4>
                                <p><a class="text-primary" href="<?php echo $oneTask['photo_after'] ?>" target=»_blank><strong>Ссылка на фото "после реализации проекта":</strong>
                                        <?php echo htmlspecialchars($oneTask['photo_after'] ?? 'N/A'); ?></a></p>
                                <h4><strong>4. Этап завершения:</strong></h4>
                                <p><a class="text-primary" href="<?php echo $oneTask['presentation_project'] ?>" target=»_blank><strong>Ссылка на презентацию проекта:</strong>
                                        <?php echo htmlspecialchars($oneTask['presentation_project'] ?? 'N/A'); ?></a></p>
                                <p><a class="text-primary" href="<?php echo $oneTask['finish_protocol'] ?>" target=»_blank><strong>Ссылка на протокол закрытия проекта:</strong>
                                        <?php echo htmlspecialchars($oneTask['finish_protocol'] ?? 'N/A'); ?></a></p>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="/todo/tasks/edit/<?php echo $oneTask['id']; ?>" class="btn btn-primary me-2">Редактировать</a>
                    </div>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
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