<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function tt($str){
    echo "<pre>";
        print_r($str);
    echo "<pre>";
}
function tte($str){
    echo "<pre>";
        print_r($str);
    echo "<pre>";
    exit();
}

//Конфиг для подключения к базе данных

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'lean_manager');

define('ENABLE_PERMISSION_CHEK', true); // Установка значения в false отключит проверки разрашений в контроллерах
