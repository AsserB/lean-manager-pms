<?php

namespace controllers\ppu;

use Exception;

use models\Check;
use models\ppu\ppuModel;
use models\users\User;


class ppuController
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

        $ppuModel = new ppuModel();
        $ppu = $ppuModel->getAllPpus();

        include 'app/views/ppu/index.php';
    }

    public function create()
    {

        // Проверка, зарегистрирован ли пользователь
        if (!isset($_SESSION['user_id'])) {
            // Если пользователь не зарегистрирован, перенаправляем его на страницу входа
            header('Location: /auth/login');
            exit;
        }

        //$this->check->requirePermission();

        $ppuModel = new ppuModel();

        include 'app/views/ppu/create.php';
    }

    //Фукция для работы с формой
    public function store()
    {
        //$this->check->requirePermission();

        if (isset($_POST['username']) && isset($_POST['job_sp']) && isset($_POST['ppu_title'])) {
            $data['user_id'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
            $data['username'] = trim($_POST['username']);
            $data['job_title'] = trim($_POST['job_title']);
            $data['job_sp'] = trim($_POST['job_sp']);
            $data['ppu_title'] = trim($_POST['ppu_title']);
            $data['ppu_type'] = trim($_POST['ppu_type']);
            $data['ppu_description'] = trim($_POST['ppu_description']);
            $data['ppu_solution'] = trim($_POST['ppu_solution']);

            $ppuModel = new ppuModel();
            $ppuModel->createPpu($data);

            $to = 'rcbt-irpo@mail.ru';
            $subject = 'Новое ППУ';
            $message = 'ППУ' . ' ' . $_POST['ppu_title'] . ' от ' . $_POST['username'] . ' СП: ' . $_POST['job_sp'];
            $headers = 'From: lean-manager.ru' . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);
        }

        header("Location: /");
    }
}
