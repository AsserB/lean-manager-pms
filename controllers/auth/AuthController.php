<?php

namespace controllers\auth;

use models\AuthUser;
use models\users\User;

//--Контроллер для CRUD пользователя--//
class AuthController
{

    //Метод для вывода всех пользователей на странице index
    public function register()
    {
        include 'app/views/auth/register.php';
    }

    //Метод для работы с формой
    public function store()
    {
        if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['phone_number']) && isset($_POST['job_title']) && isset($_POST['job_place']) && isset($_POST['org_type']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
            $username = trim(htmlspecialchars($_POST['username']));
            $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
            $phone_number = trim($_POST['phone_number']);
            $job_title = trim($_POST['job_title']);
            $job_place = trim($_POST['job_place']);
            $org_type = trim($_POST['org_type']);
            $password = trim($_POST['password']);
            $confirm_password = trim($_POST['confirm_password']);


            if (empty($username) || empty($email) || empty($phone_number) || empty($job_title) || empty($job_place) || empty($org_type) || empty($password) || empty($confirm_password)) {
                echo "Не все поля были заполнены";
                return;
            }

            if ($password !== $confirm_password) {
                echo "Пароли не совподают";
                return;
            }

            $userModel = new AuthUser();
            $userModel->register($username, $email, $phone_number, $job_title, $job_place, $org_type, $password);
        }

        header("Location:  /auth/login"); // Перенаправление на страницу логина

    }

    //Метод для редактирования пользователя
    public function login()
    {
        include 'app/views/auth/login.php';
    }

    //Метод проверки авторизации
    public function authenticate()
    {
        $authModel = new AuthUser();

        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $remember = isset($_POST['remember']) ? $_POST['remember'] : '';

            $user = $authModel->findByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                //session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_role'] = $user['role'];
                $_SESSION['user_email'] = $user['email'];

                if ($remember == 'on') {
                    setcookie('user_email', $email, time() + (7 * 24 * 60 * 60), '/');
                    setcookie('user_password', $password, time() + (7 * 24 * 60 * 60), '/');
                }

                header("Location: /");
            } else {
                echo "Не правильно введен пароль или почта";
            }
        }
    }

    public function recover()
    {
        include 'app/views/auth/recover.php';
    }

    public function changepassword()
    {
        include 'app/views/auth/changepassword.php';
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location:  /"); // Перенаправление на главную страницу
    }
}
