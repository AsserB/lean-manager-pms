<?php

namespace models\users;

use models\Database;

class User
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();

        try {
            $result = $this->db->query("SELECT 1 FROM `users` LIMIT 1"); //Если таблица существует то получаем результат
        } catch (\PDOException $e) {
            $this->createTable(); // Если нету такой таблицы то отраьатывает метод создания таблицы
        }
    }

    // Проверка на наличие таблиц и записей в базе
    private function rolesExist()
    {
        $query = "SELECT COUNT(*) FROM `roles`";
        $stmt = $this->db->query($query);
        return $stmt->fetchColumn() > 0;
    }

    private function adminUserExists()
    {
        $query = "SELECT COUNT(*) FROM `users` WHERE `username` = 'Admin' AND `is_admin` = 1";
        $stmt = $this->db->query($query);
        return $stmt->fetchColumn() > 0;
    }

    //Метод для создания таблицы
    public function createTable()
    {
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
            PRIMARY KEY(`id`),
            FOREIGN KEY (`role`) REFERENCES `roles` (`id`)
            )";

        try {
            $this->db->exec($roleTableQuery);
            $this->db->exec($userTableQuery);

            //Вставка записей в таблицу `roles`
            if (!$this->rolesExist()) {
                $insertRolesQuery = "INSERT INTO `roles` (`id`, `role_name`, `role_description`) VALUES
                (1, 'Подписчик', 'Роль, которая может управлять только своим профилем.'),
                (2, 'Проект-менеджер', 'Роль, которая может публиковать и управлять проектами.'),
                (3, 'Администратор', 'Роль, у которой есть доступ ко всем функциям администрирования на одном сайте.'),
                (5, 'Модератор', 'Для сотрудников ИРПО РЦБТ');";
                $this->db->exec($insertRolesQuery);
            }

            //Вставка записи в таблицу `users`
            if (!$this->adminUserExists()) {
                $insertAdminQuery = "INSERT INTO `users` (`username`, `email`, `phone_number`, `job_title`, `job_place`, `org_type`, `password`, `is_admin`, `role`) VALUES
                ('Admin', 'asserxlv@gmail.com', '79142929425', 'Администратор', 'ГАУ ДПО РС(Я) ИРПО', 'Среднее профессиональное образование', '\$2y\$10\$8Di5hGWPP7cvpD09SsHz5.Ll9TGlB8xBIL5TScxbWKH8WiO9z0IDe', 1, (SELECT `id` FROM `roles` WHERE `role_name` = 'Администратор'));";
                $this->db->exec($insertAdminQuery);
            }

            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    //Метод для вывода всех пользователей на странице
    public function readAll()
    {
        try {

            $stmt = $this->db->query("SELECT * FROM `users`"); //новый способ написания запроса могут быть ошибки в зависимости от версии базы данных
            $users = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $users[] = $row;
            }

            return $users;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function readAllUniqueJobPlace()
    {
        try {

            $stmt = $this->db->query("SELECT DISTINCT job_place, org_type FROM `users`"); //новый способ написания запроса могут быть ошибки в зависимости от версии базы данных
            $users = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $users[] = $row;
            }

            return $users;
        } catch (\PDOException $e) {
            return false;
        }
    }

    //Метод для создания пользователя взаимодействие с SQL
    public function create($data)
    {
        $username = $data['username'];
        $email = $data['email'];
        $phone_number = $data['phone_number'];
        $job_title = $data['job_title'];
        $job_place = $data['job_place'];
        $org_type = $data['org_type'];
        $password = $data['password'];
        $role = $data['role'];

        $created_at = date('Y-m-d H:i:s');

        $query = "INSERT INTO users (username, email, phone_number, job_title, job_place, org_type, password, role, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        try {

            $stmt = $this->db->prepare($query);
            $stmt->execute([$username, $email, $phone_number, $job_title, $job_place, $org_type, password_hash($password, PASSWORD_DEFAULT), $role, $created_at]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    //Метод для обновления пользователя взаимодействие с SQL для поиска по id пользователя
    public function read($id)
    {
        $query = "SELECT * FROM users WHERE id= ?";

        try {

            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            $res = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $res;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function updateProfile($data)
    {
        $query = "UPDATE users SET username = ?, email = ?, phone_number = ?, job_title = ?, job_place = ? WHERE id = ?";;

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$data['username'], $data['email'], $data['phone_number'], $data['job_title'], $data['job_place'], $data['id']]);

            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }


    //Обновление данных пользователя в SQL с ранее вытянутых данных (вверхний метод) 
    public function update($id, $data)
    {
        $username = $data['username'];
        $email = $data['email'];
        $admin = !empty($data['admin']) && $data['admin'] !== 0 ? 1 : 0;
        $role = $data['role'];
        $is_active = isset($data['is_active']) ? 1 : 0;

        $query = "UPDATE users SET username = ?, email = ? , is_admin = ?, role = ?, is_active = ? WHERE id = ?";

        try {

            $stmt = $this->db->prepare($query);
            $stmt->execute([$username, $email, $admin, $role, $is_active, $id]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    //Метод для удаления пользователя взаимодействие с SQL
    public function delete($id)
    {
        $query = "DELETE FROM users WHERE id= ?";

        try {

            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function findByEmail($email)
    {

        try {
            $query = "SELECT * FROM users WHERE email = ? LIMIT 1";

            $stmt = $this->db->prepare($query);
            $stmt->execute([$email]);
            $user = $stmt->fetch(\PDO::FETCH_ASSOC);

            return  $user ? $user : false;
        } catch (\PDOException $e) {
            return false;
        }
    }
}
