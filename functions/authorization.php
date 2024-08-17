<?php
session_start();

require_once('../classes/Database.php');
require_once ('../classes/Authorization.php');

$username = $_POST['username'];
$password = $_POST['password'];

$db_instance = new \classes\Database('127.127.126.50', 'root', '', 'php_authorization');
$connected_db = $db_instance->connect();

$authorization = new \classes\Login($username, $password);
$authorization->hashPassword();

$is_user_existst = $authorization->check_if_existst($connected_db, 'users');
if($is_user_existst){
    $authorization->login();
} else {
    echo 'invalid credentials';
}