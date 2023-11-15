<?php

namespace controllers\todo\tasks;

use models\todo\tasks\TaskModel;
use models\todo\tasks\TagsModel;
use models\todo\category\CategoryModel;
use models\Check;
use models\users\User;

class TaskController
{

    private $check;

    public function __construct()
    {
        $userRole = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : null;
        $this->check = new Check($userRole);
    }

    //Метод для вывода всех категорий на странице index
    public function index()
    {

        $taskModel = new TaskModel();
        $tasks = $taskModel->getAllTasksForGuest();

        include 'app/views/todo/tasks/index.php';
    }

    public function allProjects()
    {

        $taskModel = new TaskModel();
        $tasks = $taskModel->getAllTasks();

        include 'app/views/todo/tasks/allprojects.php';
    }

    public function myProject()
    {
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

        $taskModel = new TaskModel();
        $userTask = $taskModel->getAllTasksByIdUser($user_id);

        include 'app/views/todo/tasks/myproject.php';
    }

    public function onChek()
    {
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

        $taskModel = new TaskModel();
        $onChektasks = $taskModel->getAllOnChekTasksByIdUser($user_id);

        include 'app/views/todo/tasks/onchek.php';
    }

    public function completed()
    {
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

        $taskModel = new TaskModel();
        $completedTasks = $taskModel->getAllCompletedTasksByIdUser($user_id);

        include 'app/views/todo/tasks/completed.php';
    }

    public function expired()
    {
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

        $taskModel = new TaskModel();
        $expiredTasks = $taskModel->getAllExpiredTasksByIdUser($user_id);

        include 'app/views/todo/tasks/expired.php';
    }

    public function report()
    {

        $taskModel = new TaskModel();
        $reportTasks = $taskModel->getAllTasks();

        include 'app/views/todo/tasks/report.php';
    }

    public function create()
    {
        $this->check->requirePermission();

        $todoCategoryModel = new CategoryModel();
        $categories = $todoCategoryModel->getAllCategoriesWithUsability();

        include 'app/views/todo/tasks/create.php';
    }

    //Фукция для работы с формой
    public function store()
    {
        $this->check->requirePermission();

        if (isset($_POST['title']) && isset($_POST['category_id']) && isset($_POST['finish_date'])) {
            $data['user_id'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
            $data['title'] = trim($_POST['title']);
            $data['org_type'] = trim($_POST['org_type']);
            $data['job_place'] = trim($_POST['job_place']);
            $data['customer'] = trim($_POST['customer']);
            $data['team_lead'] = trim($_POST['team_lead']);
            $data['lead_email'] = trim($_POST['lead_email']);
            $data['passport_project'] = trim($_POST['passport_project']);
            $data['presentation_project'] = trim($_POST['presentation_project']);
            $data['description'] = trim($_POST['description']);
            $data['category_id'] = trim($_POST['category_id']);
            $data['start_date'] = trim($_POST['start_date']);
            $data['kick_off_date'] = trim($_POST['kick_off_date']);
            $data['finish_date'] = trim($_POST['finish_date']);
            $data['status'] = 'В разработке';
            $data['moderation'] = 'Проект на проверке';

            $taskModel = new TaskModel();
            $taskModel->createTask($data);

            $to = 'rcbt-irpo@mail.ru';
            $subject = 'Новый проект';
            $message = 'Новый проект' . ' ' . $_POST['title'] . ' ' . $_POST['job_place'];
            $headers = 'From: lean-manager.ru' . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);
        }

        header("Location: /todo/tasks/allprojects");
    }

    //Функция для редактирования проекта
    public function edit($params)
    {
        $this->check->requirePermission();

        $taskModel = new TaskModel();
        $task = $taskModel->getTaskByID($params['id']);

        $todoCategoryModel = new CategoryModel();
        $categories = $todoCategoryModel->getAllCategoriesWithUsability();

        if (!$task) {
            echo "Проект не найден";
            return;
        }

        $tagsModel = new TagsModel();
        $tags = $tagsModel->getTagsByTaskId($task['id']);

        include 'app/views/todo/tasks/edit.php';
    }

    //Функция для обнвовления проекта
    public function update()
    {
        $this->check->requirePermission();

        if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['category_id']) && isset($_POST['finish_date'])) {
            $data['id'] = trim($_POST['id']);
            $data['title'] = trim($_POST['title']);
            $data['customer'] = trim($_POST['customer']);
            $data['passport_project'] = trim($_POST['passport_project']);
            $data['presentation_project'] = trim($_POST['presentation_project']);
            $data['category_id'] = trim($_POST['category_id']);
            $data['kick_off_date'] = trim($_POST['kick_off_date']);
            $data['finish_date'] = trim($_POST['finish_date']);
            $data['reminder_at'] = trim($_POST['reminder_at']);
            $data['status'] = trim($_POST['status']);
            $data['moderation'] = trim($_POST['moderation']);
            $data['description']  = trim($_POST['description']);
            $data['start_protocol'] = trim($_POST['start_protocol']);
            $data['kickoff_protocol'] = trim($_POST['kickoff_protocol']);
            $data['finish_protocol'] = trim($_POST['finish_protocol']);
            $data['photo_before'] = trim($_POST['photo_before']);
            $data['photo_after'] = trim($_POST['photo_after']);
            $data['user_id'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

            // Обработка даты окончания и напоминания
            $finish_date_value = $data['finish_date'];
            $reminder_at_option = $data['reminder_at'];
            $finish_date = new \DateTime($finish_date_value);

            switch ($reminder_at_option) {
                case 'month':
                    $interval = new \DateInterval('P30D');
                    break;
                case 'week':
                    $interval = new \DateInterval('P7D');
                    break;
                case 'day':
                    $interval = new \DateInterval('P1D');
                    break;
            }
            $reminder_at = $finish_date->sub($interval);
            $data['reminder_at'] = $reminder_at->format('Y-m-d');

            $taskModel = new TaskModel();
            $taskModel->updateTask($data);
        }

        header("Location: /todo/tasks/allprojects");
    }

    public function task($params)
    {
        $this->check->requirePermission();

        $task_id = isset($params['id']) ? intval($params['id']) : 0;
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

        $taskModel = new TaskModel();
        $task = $taskModel->getTaskByIdAndByIdUser($params['id'], $user_id);

        if (!$task || $task['user_id' != $user_id]) {
            http_response_code(404);
            include 'app/views/errors/404.php';
            return;
        }
    }
}
