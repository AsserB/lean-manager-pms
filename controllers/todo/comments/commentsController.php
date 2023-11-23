<?php

namespace controllers\todo\comments;

use models\todo\tasks\TaskModel;
use models\todo\tasks\TagsModel;
use models\todo\category\CategoryModel;
use models\Check;
use models\comments\commentsModel;
use models\users\User;


class commentsController
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

        $commentsModel = new commentsModel();
        $comments = $commentsModel->getAllComments();

        include 'app/views/todo/comments/index.php';
    }

    public function create()
    {
        //$this->check->requirePermission();

        $commentsModel = new commentsModel();

        include 'app/views/todo/comments/create.php';
    }

    //Фукция для работы с формой
    public function store()
    {
        //$this->check->requirePermission();

        if (isset($_POST['title'])) {
            $data['title'] = trim($_POST['title']);
            $data['user_id'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
            $data['task_id'] = $_POST['task_id'];


            if (!isset($_POST['title'])) { // Проверка наличия поля 'comment'
                echo "Отсутствует комментарий";
                return;
            }

            $commentsModel = new commentsModel();
            $commentsModel->createComments($data);

            $taskModel = new TaskModel();
            $tasks = $taskModel->getAllTasks();

            $leadEmail = $_POST['lead_email'];

            $to = $leadEmail;
            $subject = 'Замечание к проекты';
            $message = 'Новое замечание' . ' ' . $_POST['title'];
            $headers = 'From: lean-manager.ru' . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);
        }

        header("Location:  /todo/tasks/expired"); // Перенаправление на страницу с проектом expired
    }

    public function delete($params)
    {
        //$this->check->requirePermission();

        $commentsModel = new commentsModel();
        $commentsModel->delete($params['id']);

        header("Location:  /todo/tasks/expired");
    }
}
