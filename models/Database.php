<?php
namespace models;

class Database {

    private static $instance = null;

    private $connect; 

    private function __construct(){
        $db_host = DB_HOST;
        $db_user = DB_USER;
        $db_password = DB_PASS;
        $db_name = DB_NAME;
        
        //Коннектор для подключения к базе данных
        try{
            $dsn = "mysql:host=$db_host; dbname=$db_name";
            $this->connect = new \PDO($dsn, $db_user, $db_password);
            $this->connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $e){
            echo "Ошибка подключения к базе данных" . $e->getMessage();
        }
    }

    //Возврашает сам объект класса "Database"
    public static function getInstance(){

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // метод возврата объект подключения к БД
    public function getConnection(){
        
        return $this->connect;
    }

}