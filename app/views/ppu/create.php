<?php
// http://leanmanager/index.php?page=roles&action=create
ob_start();
?>

<form class="form" method="POST" action="/ppu/store">
    <h1 class="form-title">Добавить ППУ</h1>
    <div class="form-fields">
        <label for="ppu_type">ФИО</label>
        <input type="text" placeholder="Мой ответ" id="username" name="username" required>
        <label for="ppu_type">Должность</label>
        <input type="text" placeholder="Мой ответ" id="job_title" name="job_title" required>
        <label for="ppu_type">Подразделение</label>
        <input type="text" placeholder="Мой ответ" id="job_sp" name="job_sp" required>
        <label for="ppu_type">Название предложения по улучшению</label>
        <input type="text" placeholder="Мой ответ" id="ppu_title" name="ppu_title" required>
        <div class="form-select-wrapper">
            <label for="ppu_type">Предполагаемая область улучшений </label>
            <select class="form-select mb-3" name="ppu_type" id="ppu_type">
                <option>Улучшение качества образования</option>
                <option>Повышение уровня безопасности</option>
                <option>Снижение «потерь» и экономия ресурсов</option>
                <option>Улучшение организации рабочего места и условий труда</option>
                <option>Улучшение качества выполняемых работ</option>
                <option>Оптимизация процессов, в том числе сокращение времени протекания процессов</option>
            </select>
        </div>
        <label for="ppu_type">Описание проблемы (Текущее состояние)</label>
        <textarea type="text" placeholder="Мой ответ" name="ppu_description" id="ppu_description" cols="30" rows="5"></textarea>
        <label for="ppu_type">Метод решения проблемы (текст), (рисунок, схема - ссылка на облачный диск)</label>
        <textarea type="text" placeholder="Мой ответ" name="ppu_solution" id="ppu_solution" cols="30" rows="5"></textarea>
    </div>
    <div class="form-button">
        <button type="submit" class="button">Отправить</button>
    </div>
</form>

<?php $content = ob_get_clean();

include 'app/views/layout.php'
?>