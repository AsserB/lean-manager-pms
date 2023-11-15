<?php

namespace models\todo\category;

use models\Database;

class CategoryModel{
    private $db;

    public function __construct(){
        $this->db = Database::getInstance()->getConnection();

        try{
            $result = $this->db->query("SELECT 1 FROM `todo_category` LIMIT 1"); //Если таблица существует то получаем результат
        } catch(\PDOException $e){
            $this->createTable(); // Если нету такой таблицы то отраьатывает метод создания таблицы
        }
    }

    //Метод для создания таблицы
    public function createTable(){
        $query = "CREATE TABLE IF NOT EXISTS `todo_category` (
            `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `title` VARCHAR(255) NOT NULL,
            `description` TEXT,
            `usability` TINYINT DEFAULT 1,
            `user_id` INT(11) NOT NULL,
            FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
            )";
        
        try {
            $this->db->exec($query);
            
            return true;

        } catch (\PDOException $e) {

            return false;

        }
    }

    //Функция для получения всех ролей из базы данных
    public function getAllCategories(){
        try{

            $stmt = $this->db->query($query = "SELECT * FROM todo_category");
            $todo_category = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $todo_category[] = $row;
            }
            return $todo_category ? $todo_category : [];

        } catch (\PDOException $e) {
            return [];
        }

    }

    // Для использования внутри создания проекта
    public function getAllCategoriesWithUsability(){
        try{

            $stmt = $this->db->query($query = "SELECT * FROM todo_category WHERE usability = 1");
            $todo_category = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $todo_category[] = $row;
            }
            return $todo_category;

        } catch (\PDOException $e) {
            return false;
        }

    }

     //Функция для создания роли
     public function createCategory($title, $description, $user_id){

        $query = "INSERT INTO todo_category (title, description, user_id) VALUES (?, ?, ?)";

        try{

            $stmt = $this->db->prepare($query);
            $stmt->execute([$title, $description, $user_id]);
            return true;

        } catch(\PDOException $e){
            return false;
        }
    }  

    //Функция для вывода одной записи из БД
    public function getCategoryByID($id){
        $query = "SELECT * FROM todo_category WHERE id= ?";
       
        try{

            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            $todo_category = $stmt->fetch(\PDO::FETCH_ASSOC);
            return  $todo_category ? $todo_category : false;

        } catch(\PDOException $e){
            return false;
        }
    }

    //Функция для обновлении/UPDATE данных ролей
    public function updateCategory($id, $title, $description, $usability){

        $query = "UPDATE todo_category SET title = ?, description = ?, usability = ? WHERE id = ?";

        try{

            $stmt = $this->db->prepare($query);
            $stmt->execute([$title, $description, $usability, $id]);
            return  true;

        } catch(\PDOException $e){
            return false;
        }
    }

    //Функция для УДАЛЕНИЯ/DELETE данных ролей
    public function deleteCategory($id){
        $query = "DELETE FROM todo_category WHERE id= ?";

        try{

            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            return  true;

        } catch(\PDOException $e){
            return false;
        }

    }
}