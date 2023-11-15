<?php

namespace models;
use models\Database;

class AuthUser{
    private $db;

    public function __construct(){
        $this->db = Database::getInstance()->getConnection();

        try{
            $result = $this->db->query("SELECT 1 FROM `users` LIMIT 1"); //Если таблица существует то получаем результат
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
        
        $userTableQuery = "CREATE TABLE IF NOT EXISTS `users` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `username` VARCHAR(255) NOT NULL,
            `email` VARCHAR(255) NOT NULL,
            `email_verification` TINYINT(1) NOT NULL DEFAULT 0,
            `phone_number` VARCHAR(20) NOT NULL,
            `job_title` VARCHAR(255) NOT NULL,
            `job_place` VARCHAR(255) NOT NULL,
            `org_type` VARCHAR(255) NOT NULL,
            `password` VARCHAR(255) NOT NULL,
            `is_admin` TINYINT(1) NOT NULL DEFAULT 0,
            `role` INT(11) NOT NULL DEFAULT 0,
            `is_active` TINYINT(1) NOT NULL DEFAULT 1,
            `last_login` TIMESTAMP NULL,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY(`id`)
            )";
        
        try {
            $this->db->exec($roleTableQuery);
            $this->db->exec($userTableQuery);
            
            return true;

        } catch (\PDOException $e) {

            return false;

        }
    }

    public function register($username, $email, $phone_number, $job_title, $job_place, $org_type, $password){

        $created_at = date('Y-m-d H:i:s');

        $query = "INSERT INTO users (username, email, phone_number, job_title, job_place, org_type, password, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        try{
            $stmt = $this->db->prepare($query);
            $stmt->execute([$username, $email, $phone_number, $job_title, $job_place, $org_type, password_hash($password, PASSWORD_DEFAULT), $created_at]);
            return true;

        } catch(\PDOException $e){
            return false;
        }
    }  

    public function login($email, $password){

        try{
            $query = "SELECT * FROM users WHERE email = ? LIMIT 1";

            $stmt = $this->db->prepare($query);
            $stmt->execute([$email]);
            $user = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                return $user;
            }

            return  false;
        } catch(\PDOException $e){
            return false;
        }
    }

    public function findByEmail($email){

        try{
            $query = "SELECT * FROM users WHERE email = ? LIMIT 1";

            $stmt = $this->db->prepare($query);
            $stmt->execute([$email]);
            $user = $stmt->fetch(\PDO::FETCH_ASSOC);

            return  $user ? $user : false;
        } catch(\PDOException $e){
            return false;
        }
    }
}