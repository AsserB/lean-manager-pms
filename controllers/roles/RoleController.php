<?php

namespace controllers\roles;

use models\roles\Role;
use models\Check;


//--Контроллер для CRUD пользователя--//
class RoleController{

    private $check;

    public function __construct(){

        $userRole = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : null;
        $this->check = new Check($userRole);

    }

    //Метод для вывода всех пользователей на странице index
    public function index(){
        $this->check->requirePermission();

        $roleModel = new Role();
        $roles = $roleModel->getAllRoles();

        include 'app/views/roles/index.php';
    }

    //Вызов функции для создания ролей с файла
    public function create(){
        $this->check->requirePermission();
        
        include 'app/views/roles/create.php';
    }

    //Фукция для работы с формой
    public function store(){
        $this->check->requirePermission();

        if (isset($_POST['role_name']) && isset($_POST['role_description'])){
            $role_name = trim($_POST['role_name']);
            $role_description = trim($_POST['role_description']);

            if (empty($role_name)) {
                echo "Отсуствует название роли";
                return;
            }

            $roleModel = new Role();
            $roleModel->createRole($role_name, $role_description);
        }
        header("Location: /roles"); // Перенаправление на страницу со всеми ролями
    }

    //Функция для редактирования ролей
    public function edit($params){
        $this->check->requirePermission();

        $roleModel = new Role();
        $role = $roleModel->getRoleByID($params['id']);

        if (!$role) {
            echo "Роль не найдена";
            return;
        }

        include 'app/views/roles/edit.php';
    }

    //Функция для обнвовления ролей
    public function update(){
        $this->check->requirePermission();

        if (isset($_POST['id']) && isset($_POST['role_name']) && isset($_POST['role_description'])){

            $id = trim($_POST['id']);
            $role_name = trim($_POST['role_name']);
            $role_description = trim($_POST['role_description']);

            if (empty($role_name)) {
                echo "Отсуствует название роли";
                return;
            }

            $roleModel = new Role();
            $roleModel->updateRole($id, $role_name, $role_description);

        }

        header("Location:  /roles"); // Перенаправление на страницу со всеми ролями
    }

    //Функция для удаления ролей
    public function delete($params){
        $this->check->requirePermission();

        $userModel = new Role();
        $userModel->deleteRole($params['id']);

        header("Location:  /roles"); // Перенаправление на страницу со всеми ролями
    }

}