<?php

namespace models\dashboards;

use models\Database;

class dashboardsModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();

        try {
            $result = $this->db->query("SELECT 1 FROM `pages` LIMIT 1"); //Если таблица существует то получаем результат
        } catch (\PDOException $e) {
            false;
        }
    }

    // Вывод общего количества "Проектов"
    public function getTasksForDb()
    {
        $query = "SELECT COUNT(*) FROM `todo_list`";
        $stmt = $this->db->query($query);
        return $stmt->fetchColumn();
    }

    // Доля проектов по категории
    public function getTasksForDbSchool()
    {
        $query = "SELECT COUNT(*) FROM `todo_list` WHERE category_id = 'Комфортная школа'";
        $stmt = $this->db->query($query);
        return $stmt->fetchColumn();
    }

    // Доля проектов по категории
    public function getTasksForDbRegion()
    {
        $query = "SELECT COUNT(*) FROM `todo_list` WHERE category_id = 'Эффективный регион'";
        $stmt = $this->db->query($query);
        return $stmt->fetchColumn();
    }

    // Доля проектов по категории
    public function getTasksForDbEvent()
    {
        $query = "SELECT COUNT(*) FROM `todo_list` WHERE category_id LIKE 'Конкурс%'";
        $stmt = $this->db->query($query);
        return $stmt->fetchColumn();
    }

    public function getUsersForDb()
    {
        $query = "SELECT COUNT(*) FROM `users`";
        $stmt = $this->db->query($query);
        return $stmt->fetchColumn();
    }

    // Вывод количества проектов от Детских садов
    public function getUsersForDbOrgTypeDO()
    {
        $query = "SELECT COUNT(*) FROM `users` WHERE org_type = 'Дошкольное образование'";
        $stmt = $this->db->query($query);
        return $stmt->fetchColumn();
    }

    // Вывод количества проектов от Общее образование
    public function getUsersForDbOrgTypeOO()
    {
        $query = "SELECT COUNT(*) FROM `users` WHERE org_type = 'Общее образование'";
        $stmt = $this->db->query($query);
        return $stmt->fetchColumn();
    }

    // Вывод количества проектов от Среднее профессиональное образование
    public function getUsersForDbOrgTypeSPO()
    {
        $query = "SELECT COUNT(*) FROM `users` WHERE org_type = 'Среднее профессиональное образование'";
        $stmt = $this->db->query($query);
        return $stmt->fetchColumn();
    }

    // Вывод количества проектов от Высшее образование
    public function getUsersForDbOrgTypeVO()
    {
        $query = "SELECT COUNT(*) FROM `users` WHERE org_type = 'Высшее образование'";
        $stmt = $this->db->query($query);
        return $stmt->fetchColumn();
    }

    // Вывод количества проектов от Институты развития
    public function getUsersForDbOrgTypeIR()
    {
        $query = "SELECT COUNT(*) FROM `users` WHERE org_type = 'Институты развития'";
        $stmt = $this->db->query($query);
        return $stmt->fetchColumn();
    }

    // Вывод количества проектов от Институты развития
    public function getUsersForDbOrgTypeDPO()
    {
        $query = "SELECT COUNT(*) FROM `users` WHERE org_type = 'Доп. профессиональное образование'";
        $stmt = $this->db->query($query);
        return $stmt->fetchColumn();
    }

    // Вывод количества уникальных организаций в таблице "users"
    public function getJobPlaceForDb()
    {
        $query = "SELECT COUNT(DISTINCT job_place) FROM `users`";
        $stmt = $this->db->query($query);
        return $stmt->fetchColumn();
    }
}
