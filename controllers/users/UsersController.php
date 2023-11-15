<?php

namespace controllers\users;

use models\roles\Role;
use models\users\User;
use models\Check;

//--Контроллер для CRUD пользователя--//
class UsersController
{

    private $check;
    private $userId;

    public function __construct()
    {

        $userRole = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : null;
        $this->userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
        $this->check = new Check($userRole);
    }

    //Метод для вывода всех пользователей на странице index
    public function index()
    {
        $this->check->requirePermission();

        $userModel = new User();
        $users = $userModel->readAll();

        include 'app/views/users/index.php';
    }

    //Вызов метода для создания пользователя с файла /models/User.php
    public function create()
    {
        $this->check->requirePermission();

        include 'app/views/users/create.php';
    }

    //Метод для работы с формой
    public function store()
    {

        if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['phone_number']) && isset($_POST['job_title']) && isset($_POST['job_place']) && isset($_POST['org_type']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $email = $_POST['email'];

            if ($password !== $confirm_password) {
                echo "Пароли не совподают";
                return;
            }



            $userModel = new User();
            //$config = require_once __DIR__ . '/../../../config.php';
            $data = [
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'phone_number' => $_POST['phone_number'],
                'job_title' => $_POST['job_title'],
                'job_place' => $_POST['job_place'],
                'org_type' => $_POST['org_type'],
                'password' => $password,
                'role' => 1 //по умолчанию
            ];

            if ($userModel->findByEmail($email)) {
                echo "Данный email уже зарегистрирован. Пожалуйста, введите другой email.";
                return;
            }

            $userModel->create($data);
        }

        header("Location:  /auth/login"); // Перенаправление на страницу со всеми пользователями
    }

    //Метод для редактирования пользователя
    public function edit($params)
    {
        $this->check->requirePermission();

        $userModel = new User();
        $user = $userModel->read($params['id']);

        $roleModel = new Role();
        $roles = $roleModel->getAllRoles();

        include 'app/views/users/edit.php';
    }

    public function editprofile($params)
    {
        //$this->check->requirePermission();

        $userModel = new User();
        $user = $userModel->read($params['id']);

        $roleModel = new Role();
        $roles = $roleModel->getAllRoles();

        include 'app/views/users/editprofile.php';
    }

    public function updateprofile()
    {
        //$this->check->requirePermission();

        if (isset($_POST['id']) && isset($_POST['username']) && isset($_POST['email'])) {
            $data['id'] = trim($_POST['id']);
            $data['username'] = trim($_POST['username']);
            $data['email'] = trim($_POST['email']);
            $data['phone_number'] = trim($_POST['phone_number']);
            $data['job_title'] = trim($_POST['job_title']);
            $data['job_place'] = trim($_POST['job_place']);
            $data['user_id'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;


            $userModel = new User();
            $userModel->updateProfile($data);
        }

        header("Location: /users/profile");
    }

    public function update($params)
    {
        $this->check->requirePermission();

        $userModel = new User();
        $userModel->update($params['id'], $_POST);
        if (isset($_POST['email'])) {
            $newEmail = trim(htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8'));

            // Проверяем, совпадает ли роль текущего пользователя с обновленной ролью
            if ($newEmail == $_SESSION['user_email']) {
                header("Location: /auth/logout");
                exit();
            }
        }
        header("Location: /users");
    }

    //Метод для удаления пользователя
    public function delete($params)
    {
        $this->check->requirePermission();

        $userModel = new User();
        $userModel->delete($params['id']);

        header("Location:  /users"); // Перенаправление на страницу со всеми пользователями
    }

    public function profile()
    {
        //$this->check->requirePermission();
        $user_id = $this->userId;
        $userModel = new User();
        $user = $userModel->read($user_id);

        $roleModel = new Role();
        $role = $roleModel->getRoleByID($user['role']);

        //$otp = generateOTP();

        include 'app/views/users/profile.php';
    }
}
