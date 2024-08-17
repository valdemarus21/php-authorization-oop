<?php

    session_start();

    require_once('../classes/Database.php');
    require_once ('../classes/Authorization.php');


    $username = $_POST['username'];
    $password = $_POST['password'];

    $db_instance = new \classes\Database('127.127.126.50', 'root', '', 'php_authorization');
    $connected_db = $db_instance->connect();



    $registration = new \classes\Register($username, $password);
    $registration->hashPassword();

    $is_unused_username = $registration->check_if_unused($connected_db, 'users');
    if($is_unused_username){
        $registration->create_user($connected_db,'users');
    } else {
        echo 'Username already taken';
    }

