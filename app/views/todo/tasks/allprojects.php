<title>Реестр проектов бережливого производства в РС(Я)</title>
<meta name="description" content="Бережливый менеджер - система управления проектами, обеспечивающая эффективное использование ресурсов и сбережение. 
    Минимизация потерь и прозрачная модерация на всех этапах работы.">
<meta name="keywords" content="бережливый менеджер система управления проектами проектное управление эффективный регион комфортный колледж бережливое производство lean manager">

<meta property="og:type" content="website">
<meta property="og:title" content="Бережливый менеджер - система управления проектами">
<meta property="og:url" content="https://lean-manager.ru/">
<meta property="og:image" content="https://i.postimg.cc/HW5SxnhJ/16-11-2023-144359.jpg">
<meta property="og:description" content="Бережливый менеджер - система управления проектами, обеспечивающая эффективное использование ресурсов и сбережение. Минимизация потерь и прозрачная модерация на всех этапах работы.">


<?php
// http://leanmanager/index.php?page=category
ob_start();
?>

<header class="content-header">
    <h1 class="title">Все проекты</h1>
</header>

<!-- <div class="filter">
    <h2 class="filter__title">Сортировать по:</h2>
    <ul class="filter_list">
        <li class="filter_status">
            <a id="sort-button-project">типу проектов</a>
            <div class="filter-project-content hide-content" id="filter-project-content">
                <a data-projetcs-type="Эффективный регион" class="filter-button">Эффективный регион</a>
                <a data-projetcs-type="Комфортная школа" class="filter-button">Комфортная школа</a>
                <a data-projetcs-type="Лидер бережливости" class="filter-button">Лидер бережливости</a>
            </div>
        </li>
    </ul>

</div> -->



<ol class="accordion" id="tasks-accordion">



    <form method="POST" action="/todo/tasks/allprojects" class="filter">
        <label for="taskType">Категория проекта</label>
        <select class="form-select mb-2" id="taskType" name="taskType">
            <option value="">Выберите категорию проекта</option>
            <option value="Все проекты" <?php if (isset($_POST['taskType']) && $_POST['taskType'] == 'Все проекты') {
                                            echo 'selected="selected"';
                                        } ?>>Все проекты</option>
            <option value="Эффективный регион" <?php if (isset($_POST['taskType']) && $_POST['taskType'] == 'Эффективный регион') {
                                                    echo 'selected="selected"';
                                                }  ?>>Эффективный регион</option>
            <option value="Комфортная школа" <?php if (isset($_POST['taskType']) && $_POST['taskType'] == 'Комфортная школа') {
                                                    echo 'selected="selected"';
                                                } ?>>Комфортная школа</option>
            <option value="Лидер бережливости" <?php if (isset($_POST['taskType']) && $_POST['taskType'] == 'Лидер бережливости') {
                                                    echo 'selected="selected"';
                                                } ?>>Конкурс "Лидер бережливости"</option>
        </select>
        <label for="taskOrgType">Организации</label>
        <div class="form-button">
            <button type="submit" class="button">Применить фильтр</button>
        </div>
    </form>

    <?php foreach ($tasks as $oneTask) : ?>

        <?php
        //Разделение проектов по цвету в зависимости от статуса проекта
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
                        <span class="accordion-header-item accardion-header-item-hide"><span><span><strong>Организация</strong>
                                </span><?php echo $oneTask['job_place']; ?></span></span>
                        <span class="accordion-header-item accardion-header-item-hide"><strong>Статус проекта:</strong><span style="background-color: <?= $statusColor ?>;" class="span-border"><?php echo $oneTask['status']; ?></span></span>
                    </button>
                </h2>
            </div>
            <div id="task-collapse-<?php echo $oneTask['id']; ?>" class="accordion-collapse collapse row" aria-labelledby="task-<?php echo $oneTask['id']; ?>" data-bs-parent="#tasks-accordion">
                <div class="accordion-body">
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


<script>
    let projectType = "<?= $oneTask['category_id'] ?>";
</script>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>