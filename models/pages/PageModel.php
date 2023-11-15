<?php

namespace models\pages;

use models\Database;
use models\roles\Role;

class PageModel{
    private $db;

    public function __construct(){
        $this->db = Database::getInstance()->getConnection();

        try{
            $result = $this->db->query("SELECT 1 FROM `pages` LIMIT 1"); //Если таблица существует то получаем результат
        } catch(\PDOException $e){
            $this->createTable(); // Если нету такой таблицы то отраьатывает метод создания таблицы
        }
    }

    //Метод для создания таблицы
    public function createTable(){
        $pageTableQuery = "CREATE TABLE IF NOT EXISTS `pages` (
            `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `title` VARCHAR(255) NOT NULL,
            `slug` VARCHAR(255) NOT NULL,
            `role` VARCHAR(255) NOT NULL,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            `update_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            ) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;
            ";
        
        try {

            $this->db->exec($pageTableQuery);
            return true;

        } catch (\PDOException $e) {

            return false;

        }
    }

    public function insertPages(){
        $insertPagesQuery = "INSERT INTO `pages` (`id`, `title`, `slug`, `role`, `created_at`, `update_at`) VALUES
        (6, 'Список страниц', 'pages', '3', '2023-10-16 00:00:01', '2023-10-16 00:00:02'),
        (7, 'Список ролей', 'roles', '3', '2023-10-16 00:00:01', '2023-10-16 00:00:02'),
        (8, 'Добавить страницу', 'pages/create', '3', '2023-10-16 00:00:01', '2023-10-16 00:00:02'),
        (10, 'Редактировать страницу', 'pages/edit', '3', '2023-10-16 00:00:01', '2023-10-16 00:00:02'),
        (11, 'Добавить роли', 'roles/create', '3', '2023-10-16 00:00:01', '2023-10-16 00:00:02'),
        (12, 'Редактировать роли', 'roles/edit', '3', '2023-10-16 00:00:01', '2023-10-16 00:00:02'),
        (13, 'Список пользователей', 'users', '3', '2023-10-16 00:00:01', '2023-10-16 00:00:02'),
        (14, 'Добавить пользователя', 'users/create', '3', '2023-10-16 00:00:01', '2023-10-16 00:00:02'),
        (15, 'Редактировать пользователя', 'users/edit', '3', '2023-10-16 00:00:01', '2023-10-16 00:00:02'),
        (17, 'Список категории', 'todo/category', '3', '2023-10-16 00:00:01', '2023-10-16 00:00:02'),
        (18, 'Добавление категорий проектов', 'todo/category/create', '3', '2023-10-16 00:00:01', '2023-10-16 00:00:02'),
        (19, 'Обновление категорий проектов', 'todo/category/edit', '3', '2023-10-16 00:00:01', '2023-10-16 00:00:02'),
        (20, 'Список проектов', 'todo/tasks', '1,2,3,5', '2023-10-16 00:00:01', '2023-10-16 00:00:02'),
        (21, 'Добавить проект', 'todo/tasks/create', '1,2,3,5', '2023-10-16 00:00:01', '2023-10-16 00:00:02'),
        (22, 'Удалить проект', 'todo/tasks/delete', '3', '2023-10-16 00:00:01', '2023-10-16 00:00:02'),
        (23, 'Редактировать проект', 'todo/tasks/edit', '1,2,3,5', '2023-10-16 00:00:01', '2023-10-16 00:00:02'),
        (24, 'Проверенные проекты', '/todo/tasks/completed', '3, 5', '2023-10-16 00:00:01', '2023-10-16 00:00:02'),
        (25, 'Проекты на проверке', '/todo/tasks/onchek', '3, 5', '2023-10-16 00:00:01', '2023-10-16 00:00:02'),
        (26, 'Проекты на доработке', '/todo/tasks/expired', '3, 5', '2023-10-16 00:00:01', '2023-10-16 00:00:02');";

        try{
            $this->db->exec($insertPagesQuery);
            return true;
        } catch(\PDOException $e){
            return false;
        }
    }

    //Функция для получения всех ролей из базы данных
    public function getAllPages(){
        try{

            $stmt = $this->db->query($query = "SELECT * FROM pages");
            $pages = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $pages[] = $row;
            }
            return $pages;

        } catch (\PDOException $e) {
            return false;
        }

    }

    //Функция для вывода одной записи из БД
    public function getPageByID($id){
        $query = "SELECT * FROM pages WHERE id= ?";
       
        try{

            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            $page = $stmt->fetch(\PDO::FETCH_ASSOC);
            return  $page ? $page : false;

        } catch(\PDOException $e){
            return false;
        }
    }

    public function findBySlug($slug){
        $query = "SELECT * FROM pages WHERE slug = ?";
       
        try{

            $stmt = $this->db->prepare($query);
            $stmt->execute([$slug]);
            $page = $stmt->fetch(\PDO::FETCH_ASSOC);
            return  $page ? $page : false;

        } catch(\PDOException $e){
            return false;
        }
    }

    //Функция для создания роли
    public function createPage($title, $slug, $roles){

        $query = "INSERT INTO pages (title, slug, role) VALUES (?, ?, ?)";

        try{

            $stmt = $this->db->prepare($query);
            $stmt->execute([$title, $slug, $roles]);
            return true;

        } catch(\PDOException $e){
            return false;
        }
    }  

    //Функция для обновлении/UPDATE данных ролей
    public function updatePage($id, $title, $slug, $roles){

        $query = "UPDATE pages SET title = ?, slug = ?, role = ? WHERE id = ?";

        try{

            $stmt = $this->db->prepare($query);
            $stmt->execute([$title, $slug, $roles, $id]);
            return  true;

        } catch(\PDOException $e){
            return false;
        }
    }

    //Функция для УДАЛЕНИЯ/DELETE данных ролей
    public function deletePage($id){
        $query = "DELETE FROM pages WHERE id= ?";

        try{

            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            return  true;

        } catch(\PDOException $e){
            return false;
        }

    }
}