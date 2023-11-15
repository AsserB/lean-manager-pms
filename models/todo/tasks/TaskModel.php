<?php

namespace models\todo\tasks;

use models\Database;

class TaskModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();

        try {
            $result = $this->db->query("SELECT 1 FROM `todo_list` LIMIT 1"); //Если таблица существует то получаем результат
        } catch (\PDOException $e) {
            $this->createTable(); // Если нету такой таблицы то отраьатывает метод создания таблицы
        }
    }

    //Метод для создания таблицы

    public function createTable()
    {

        $query = "CREATE TABLE IF NOT EXISTS `todo_list` (
            `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `user_id` INT(11) NOT NULL,
            `title` VARCHAR(255) NOT NULL,
            `org_type` VARCHAR(255) NOT NULL,
            `job_place` VARCHAR(255) NOT NULL,
            `customer` VARCHAR(255) NOT NULL,
            `team_lead` VARCHAR(255) NOT NULL,
            `lead_email` VARCHAR(255) NOT NULL,
            `passport_project` VARCHAR(255) NOT NULL,
            `presentation_project` VARCHAR(255) NOT NULL,
            `description` TEXT,
            `category_id` VARCHAR(255) NOT NULL,
            `status` ENUM('В разработке', 'Проект запущен', 'В стадии реализации', 'Проект завершен', 'Проект просрочен') NOT NULL,
            `moderation` ENUM('Проект на проверке', 'Проект не доделан', 'Проект проверен') NOT NULL,
            `assigned_to` INT,
            `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
            `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            `start_date` DATE,
            `kick_off_date` DATE,
            `finish_date` DATE,
            `copleted_at` DATE,
            `reminder_at` DATE,
            `start_protocol` VARCHAR(255) NOT NULL,
            `kickoff_protocol` VARCHAR(255) NOT NULL,
            `finish_protocol` VARCHAR(255) NOT NULL,
            `photo_before` VARCHAR(255) NOT NULL,
            `photo_after` VARCHAR(255) NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        )";

        try {
            $this->db->exec($query);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    //Функция для получения всех проектов для не авторизованных из базы данных
    public function getAllTasksForGuest()
    {
        try {

            $stmt = $this->db->query($query = "SELECT * FROM todo_list");
            $todo_list = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $todo_list[] = $row;
            }
            return $todo_list ? $todo_list : [];
        } catch (\PDOException $e) {
            return [];
        }
    }

    //Функция для получения всех проектов для авторизованных из базы данных
    public function getAllTasks()
    {
        try {

            $stmt = $this->db->query($query = "SELECT * FROM todo_list");
            $todo_list = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $todo_list[] = $row;
            }
            return $todo_list ? $todo_list : [];
        } catch (\PDOException $e) {
            return [];
        }
    }

    public function getAllTasksByIdUser($user_id)
    {
        try {

            $stmt = $this->db->prepare($query = "SELECT * FROM todo_list WHERE user_id = :user_id ORDER BY ABS(TIMESTAMPDIFF(SECOND, NOW(), finish_date))");
            $stmt->bindParam(':user_id', $user_id, \PDO::PARAM_INT);
            $stmt->execute();
            $todo_list = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $todo_list[] = $row;
            }
            return $todo_list ? $todo_list : [];
        } catch (\PDOException $e) {
            return [];
        }
    }

    public function getAllOnChekTasksByIdUser($user_id)
    {
        try {

            $stmt = $this->db->prepare($query = "SELECT * FROM todo_list WHERE moderation = 'Проект на проверке' ORDER BY ABS(TIMESTAMPDIFF(SECOND, NOW(), finish_date))");
            $stmt->execute();
            $todo_list = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $todo_list[] = $row;
            }
            return $todo_list ? $todo_list : [];
        } catch (\PDOException $e) {
            return [];
        }
    }

    public function getAllCompletedTasksByIdUser($user_id)
    {
        try {

            $stmt = $this->db->prepare($query = "SELECT * FROM todo_list WHERE moderation = 'Проект проверен' ORDER BY ABS(TIMESTAMPDIFF(SECOND, NOW(), finish_date))");
            $stmt->execute();
            $todo_list = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $todo_list[] = $row;
            }
            return $todo_list ? $todo_list : [];
        } catch (\PDOException $e) {
            return [];
        }
    }

    public function getAllExpiredTasksByIdUser($user_id)
    {
        try {

            $stmt = $this->db->prepare($query = "SELECT * FROM todo_list WHERE moderation = 'Проект не доделан' ORDER BY ABS(TIMESTAMPDIFF(SECOND, NOW(), finish_date))");
            $stmt->execute();
            $todo_list = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $todo_list[] = $row;
            }
            return $todo_list ? $todo_list : [];
        } catch (\PDOException $e) {
            return [];
        }
    }

    //Функция для создания проекта
    public function createTask($data)
    {

        $query = "INSERT INTO todo_list (user_id, title, org_type, job_place, customer, team_lead, lead_email, passport_project, presentation_project, description, category_id, status, moderation, start_date, kick_off_date, finish_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$data['user_id'], $data['title'], $data['org_type'], $data['job_place'], $data['customer'], $data['team_lead'], $data['lead_email'], $data['passport_project'], $data['presentation_project'], $data['description'], $data['category_id'], $data['status'], $data['moderation'], $data['start_date'], $data['kick_off_date'], $data['finish_date']]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    //Функция для вывода одной записи из БД
    public function getTaskByID($id)
    {
        $query = "SELECT * FROM todo_list WHERE id= ?";

        try {

            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            $todo_task  = $stmt->fetch(\PDO::FETCH_ASSOC);
            return  $todo_task  ? $todo_task : false;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getTaskByIdAndByIdUser($id_task, $id_user)
    {
        $query = "SELECT * FROM todo_list WHERE id = ? AND user_id = ?";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$id_task, $id_user]);
            $todo_task = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $todo_task ? $todo_task : [];
        } catch (\PDOException $e) {
            return false;
        }
    }

    //Функция для обновлении/UPDATE данных проекта
    public function updateTask($data)
    {
        $query = "UPDATE todo_list SET title = ?, customer = ?, passport_project = ?, presentation_project = ?, category_id = ?, kick_off_date = ?, finish_date = ?, reminder_at = ?, status = ?, moderation = ?, description = ?, start_protocol = ?, kickoff_protocol = ?, finish_protocol = ?, photo_before = ?, photo_after = ? WHERE id = ?";;

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$data['title'], $data['customer'], $data['passport_project'], $data['presentation_project'], $data['category_id'], $data['kick_off_date'], $data['finish_date'], $data['reminder_at'], $data['status'], $data['moderation'], $data['description'], $data['start_protocol'], $data['kickoff_protocol'], $data['finish_protocol'], $data['photo_before'], $data['photo_after'], $data['id']]);

            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }
}
