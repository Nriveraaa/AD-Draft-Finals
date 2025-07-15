<?php
define('BASE_PATH', realpath(__DIR__));
define('APP_ROOT', BASE_PATH);
chdir(BASE_PATH);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once APP_ROOT . '/staticDatas/products.staticdata.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}