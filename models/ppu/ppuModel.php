<?php

namespace models\ppu;

use models\Database;

class ppuModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();

        try {
            $result = $this->db->query("SELECT 1 FROM `ppu` LIMIT 1"); //Если таблица существует то получаем результат
        } catch (\PDOException $e) {
            $this->createTable(); // Если нету такой таблицы то отраьатывает метод создания таблицы
        }
    }

    //Метод для создания таблицы

    public function createTable()
    {

        $query = "CREATE TABLE IF NOT EXISTS `ppu` (
            `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `user_id` INT(11) NOT NULL,
            `username` VARCHAR(255) NOT NULL,
            `job_title` VARCHAR(255) NOT NULL,
            `job_sp` VARCHAR(255) NOT NULL,
            `ppu_title` VARCHAR(255) NOT NULL,
            `ppu_type` VARCHAR(255) NOT NULL,
            `ppu_description` VARCHAR(255) NOT NULL,
            `ppu_solution` VARCHAR(255) NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        )";

        try {
            $this->db->exec($query);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getAllPpus()
    {
        try {

            $stmt = $this->db->query($query = "SELECT * FROM ppu");
            $todo_list = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $todo_list[] = $row;
            }
            return $todo_list ? $todo_list : [];
        } catch (\PDOException $e) {
            return [];
        }
    }

    //Функция для создания комментария
    public function createPpu($data)
    {

        $query = "INSERT INTO ppu (username, job_title, job_sp, ppu_title, ppu_type, ppu_description, ppu_solution) VALUES (?, ?, ?, ?, ?, ?, ?)";

        try {

            $stmt = $this->db->prepare($query);
            $stmt->execute([$data['username'], $data['job_title'], $data['job_sp'], $data['ppu_title'], $data['ppu_type'], $data['ppu_description'], $data['ppu_solution']]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function delete($id)
    {
        $query = "DELETE FROM ppu WHERE id= ?";

        try {

            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }
}
