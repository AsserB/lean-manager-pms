<?php

namespace controllers\dashboards;

use models\dashboards\dashboardsModel;
use models\users\User;
use models\todo\tasks\TaskModel;
use models\Check;

//--Контроллер для CRUD пользователя--//
class dashboardsController
{
    private $check;
    private $userId;

    public function __construct()
    {
        $userRole = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : null;
        $this->userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
        $this->check = new Check($userRole);
    }

    //Метод для вывода всех пользователей на странице index
    public function index()
    {
        //вывод количество проектов
        $dashboardsModel = new dashboardsModel();
        $dashboardsTasks = $dashboardsModel->getTasksForDb();

        //Доля проектов по категории
        $dashboardsModel = new dashboardsModel();
        $dashboardsSchool = $dashboardsModel->getTasksForDbSchool();

        //Доля проектов по категории
        $dashboardsModel = new dashboardsModel();
        $dashboardsRegion = $dashboardsModel->getTasksForDbRegion();

        //Доля проектов по категории
        $dashboardsModel = new dashboardsModel();
        $dashboardsEvent = $dashboardsModel->getTasksForDbEvent();

        //вывод количество пользователей
        $dashboardsModel = new dashboardsModel();
        $dashboardsUsers = $dashboardsModel->getUsersForDb();

        //вывод количество проектов дошкольных организаций
        $dashboardsModel = new dashboardsModel();
        $dashboardsDO = $dashboardsModel->getUsersForDbOrgTypeDO();

        //вывод количество проектов Общего образование
        $dashboardsModel = new dashboardsModel();
        $dashboardsOO = $dashboardsModel->getUsersForDbOrgTypeOO();

        //вывод количество проектов СПО
        $dashboardsModel = new dashboardsModel();
        $dashboardsSPO = $dashboardsModel->getUsersForDbOrgTypeSPO();

        //вывод количество проектов СПО
        $dashboardsModel = new dashboardsModel();
        $dashboardsVO = $dashboardsModel->getUsersForDbOrgTypeVO();

        //вывод количество проектов СПО
        $dashboardsModel = new dashboardsModel();
        $dashboardsIR = $dashboardsModel->getUsersForDbOrgTypeIR();

        //вывод количество проектов СПО
        $dashboardsModel = new dashboardsModel();
        $dashboardsDPO = $dashboardsModel->getUsersForDbOrgTypeDPO();

        //вывод количество уникальных организаций из табоицы 'users'
        $dashboardsModel = new dashboardsModel();
        $dashboardsJobPlace = $dashboardsModel->getJobPlaceForDb();

        //вывод реестра уникальных организаций из табоицы 'users'
        $userModel = new User();
        $users = $userModel->readAllUniqueJobPlace();

        //вывод реестра уникальных организаций из табоицы 'users'
        $taskModel = new TaskModel();
        $tasks = $taskModel->getAllTasks();

        include 'app/views/dashboards/index.php';
    }
}
