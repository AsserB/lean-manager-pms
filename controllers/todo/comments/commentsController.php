<?php

namespace controllers\todo\comments;

use Exception;
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

        if (!isset($_POST['comment_text'])) { // Проверка наличия поля 'comment'
            echo "Отсутствует комментарий";
            return;
        }

        $data['comment_text'] = trim($_POST['comment_text']);
        $data['user_id'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
        $data['task_id'] = $_POST['task_id'];

        // Валидация и очистка входных данных
        $data['comment_text'] = filter_var($data['comment_text'], FILTER_SANITIZE_STRING);
        $data['user_id'] = filter_var($data['user_id'], FILTER_VALIDATE_INT);
        $data['task_id'] = filter_var($data['task_id'], FILTER_VALIDATE_INT);

        try {
            $commentsModel = new commentsModel();
            $commentsModel->createComments($data);

            $taskModel = new TaskModel();
            $tasks = $taskModel->getAllTasks();

            $leadEmail = $_POST['lead_email'];
            $TaskTitle = $_POST['title'];

            // Валидация и очистка входных данных
            $leadEmail = filter_var($leadEmail, FILTER_SANITIZE_EMAIL);
            $TaskTitle = filter_var($TaskTitle, FILTER_SANITIZE_STRING);


            $to = $_POST['lead_email'];
            $subject = 'Замечание к проекту';
            $message = 'Новое замечание к проекту ' . $TaskTitle . ': ' . $_POST['comment_text'];
            $headers = 'From: lean-manager.ru' . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);
        } catch (Exception $e) {
            echo 'Произошла ошибка при создании комментария или отправке электронной почты: ' . $e->getMessage();
            return;
        }
        header("Location:  /todo/tasks/onchek"); // Перенаправление на страницу с проектом expired
    }

    public function delete($params)
    {
        //$this->check->requirePermission();

        $commentsModel = new commentsModel();
        $commentsModel->delete($params['id']);

        header("Location:  /todo/tasks/onchek");
    }
}
