<?php

namespace models\roles;

use models\Database;

class Role{
    private $db;

    public function __construct(){
        $this->db = Database::getInstance()->getConnection();

        try{
            $result = $this->db->query("SELECT 1 FROM `roles` LIMIT 1"); //Если таблица существует то получаем результат
        } catch(\PDOException $e){
            $this->createTable(); // Если нету такой таблицы то отраьатывает метод создания таблицы
        }
    }

    //Метод для создания таблицы
    public function createTable(){
        $roleTableQuery = "CREATE TABLE IF NOT EXISTS `roles` (
            `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `role_name` VARCHAR(255) NOT NULL,
            `role_description` TEXT
            )";
        
        try {
            $this->db->exec($roleTableQuery);
            
            return true;

        } catch (\PDOException $e) {

            return false;

        }
    }

    //Функция для получения всех ролей из базы данных
    public function getAllRoles(){
        try{

            $stmt = $this->db->query($query = "SELECT * FROM roles");
            $roles = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $roles[] = $row;
            }
            return $roles;

        } catch (\PDOException $e) {
            return false;
        }

    }

    //Функция для вывода одной записи из БД
    public function getRoleByID($id){
        $query = "SELECT * FROM roles WHERE id= ?";
       
        try{

            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            $role = $stmt->fetch(\PDO::FETCH_ASSOC);
            return  $role ? $role : false;

        } catch(\PDOException $e){
            return false;
        }
    }

    //Функция для создания роли
    public function createRole($role_name, $role_description){

        $query = "INSERT INTO roles (role_name, role_description) VALUES (?, ?)";

        try{

            $stmt = $this->db->prepare($query);
            $stmt->execute([$role_name, $role_description]);
            return true;

        } catch(\PDOException $e){
            return false;
        }
    }  

    //Функция для обновлении/UPDATE данных ролей
    public function updateRole($id, $role_name, $role_description){

        $query = "UPDATE roles SET role_name = ?, role_description = ? WHERE id = ?";

        try{

            $stmt = $this->db->prepare($query);
            $stmt->execute([$role_name, $role_description, $id]);
            return  true;

        } catch(\PDOException $e){
            return false;
        }
    }

    //Функция для УДАЛЕНИЯ/DELETE данных ролей
    public function deleteRole($id){
        $query = "DELETE FROM roles WHERE id= ?";

        try{

            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            return  true;

        } catch(\PDOException $e){
            return false;
        }

    }
}