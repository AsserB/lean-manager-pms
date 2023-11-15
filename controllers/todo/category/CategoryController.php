<?php

namespace controllers\todo\category;

use models\todo\category\CategoryModel;
use models\Check;

class CategoryController{

    private $check;

    public function __construct(){

        $userRole = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : null;
        $this->check = new Check($userRole);

    }

    //Метод для вывода всех категорий на странице index
    public function index(){
        $this->check->requirePermission();

        $todoCategoryModel = new CategoryModel();
        $categories = $todoCategoryModel->getAllCategories();

        include 'app/views/todo/category/index.php';
    }

    //Вызов функции для создания ролей с файла
    public function create(){
        $this->check->requirePermission();
        
        include 'app/views/todo/category/create.php';
    }

    //Фукция для работы с формой
    public function store(){
        $this->check->requirePermission();

        if (isset($_POST['title']) && isset($_POST['description'])){
            $title = trim($_POST['title']);
            $description = trim($_POST['description']);
            $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

            if (empty($title) || empty($description)) {
                echo "Отсуствует название Категории";
                return;
            }

            $todoCategoryModel = new CategoryModel();
            $todoCategoryModel->createCategory($title, $description, $user_id);
        }

        header("Location:  /todo/category"); // Перенаправление на страницу со всеми ролями
    }

    //Функция для редактирования ролей
    public function edit($params){
        $this->check->requirePermission();

        $todoCategoryModel = new CategoryModel();
        $category = $todoCategoryModel->getCategoryByID($params['id']);

        if (!$category) {
            echo "Категория не найдена";
            return;
        }

        include 'app/views/todo/category/edit.php';
    }

    //Функция для обнвовления ролей
    public function update($params){
        $this->check->requirePermission();

        if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['description'])){

            $id = trim($params['id']);
            $title = trim($_POST['title']);
            $description = trim($_POST['description']);
            $usability = isset($_POST['usability']) ? $_POST['usability'] : 0;

            if (empty($title) || empty($description)) {
                echo "Отсуствует название или описание Категории";
                return;
            }

            $todoCategoryModel = new CategoryModel();
            $todoCategoryModel->updateCategory($id, $title, $description, $usability);

        }
       
        header("Location:  /todo/category"); // Перенаправление на страницу со всеми Категориями
    }

    //Функция для удаления ролей
    public function delete($params){
        $this->check->requirePermission();

        $todoCategoryModel = new CategoryModel();
        $todoCategoryModel->deleteCategory($params['id']);

        header("Location:  /todo/category"); // Перенаправление на страницу со всеми Категориями
    }

}