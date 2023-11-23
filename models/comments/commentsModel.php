<?php

namespace models\comments;

use models\Database;

class commentsModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();

        try {
            $result = $this->db->query("SELECT 1 FROM `comment` LIMIT 1"); //Если таблица существует то получаем результат
        } catch (\PDOException $e) {
            $this->createTable(); // Если нету такой таблицы то отраьатывает метод создания таблицы
        }
    }

    //Метод для создания таблицы

    public function createTable()
    {

        $query = "CREATE TABLE IF NOT EXISTS `comment` (
            `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `user_id` INT(11) NOT NULL,
            `task_id` INT(11) NOT NULL,
            `title` VARCHAR(255) NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
            FOREIGN KEY (task_id) REFERENCES todo_list(id)
        )";

        try {
            $this->db->exec($query);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getAllComments()
    {
        try {

            $stmt = $this->db->query($query = "SELECT comment.*, users.username FROM comment JOIN users ON comment.user_id = users.id");
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
    public function createComments($data)
    {

        $query = "INSERT INTO comment (user_id, task_id, title) VALUES (?, ?, ?)";

        try {

            $stmt = $this->db->prepare($query);
            $stmt->execute([$data['user_id'], $data['task_id'], $data['title']]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function delete($id)
    {
        $query = "DELETE FROM comment WHERE id= ?";

        try {

            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }
}
