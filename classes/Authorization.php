<?php

namespace classes;

class Authorization
{
    public string $username;
    public string $reg_date;
    protected string $password;
    public string $md5_password;


    public function __construct(string $username, string $password, string $reg_date)
    {
        $this->username = $username;
        $this->password = $password;
        $this->reg_date = $reg_date;
    }
    public function hashPassword(): void
    {
        if(!isset($this->md5_password)){
        $this->md5_password = md5($this->password);
        } else {
            print_r('password already set!');
        }
    }
    public function get_db_query($db, $db_table_name){
        if(!$this->username) echo 'error : change username to correct value';

        return mysqli_query($db, "SELECT * FROM `{$db_table_name}` WHERE `username` = '{$this->username}'");
    }
}
class Login extends Authorization {

    public function __construct(string $username, string $password){

        $reg_date = date('Y-m-d H:i:s');

        parent::__construct($username, $password, $reg_date);
    }
    public function get_db_query($db, $db_table_name){
        if(!$this->username) echo 'error : change username to correct value';

        return mysqli_query($db, "SELECT * FROM `{$db_table_name}` WHERE `username` = '{$this->username}' AND `password` = '{$this->md5_password}'");
    }
    public function check_if_existst($db, $db_table): bool
    {
        $query = $this->get_db_query($db, $db_table);

        if(mysqli_num_rows($query) == 1){
            return true;
        } else {
            return false;
        }
    }
    public function login(): void
    {
        $_SESSION['username'] = $this->username;
        header('Location: ../pages/user.php');
    }

}
class Register extends Authorization {

    public function __construct(string $username, string $password)
    {
        $reg_date = date('Y-m-d H:i:s');
        parent::__construct($username, $password, $reg_date);
    }

    public function check_if_unused($db, $db_table): bool
    {
        $query = $this->get_db_query($db, $db_table);
        if(mysqli_num_rows($query) == 0){
            return true;
        } else {
            return false;
        }
    }

    public function create_user($db, $db_table): void
    {
        $_SESSION['username'] = $this->username;
        mysqli_query($db, "INSERT INTO `{$db_table}` (`username`, `password`, `reg_date`) VALUES ('{$this->username}', '{$this->md5_password}', '{$this->reg_date}')");
        header('Location: ../pages/user.php');
    }
}
