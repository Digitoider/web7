<?php

require_once 'models/UsersTable.php';
class Authorization_model
{


    public function checkUser($fields)
    {
        $users = UsersTable::getByFields($fields);

        // user должен быть единственным, но UsersTable::getByField возвращает массив,
        // а потому лучше пробежаться по users в цикле
        $user['notfound'] = true;
        foreach ($users as $usr){
            if($usr->email == $fields['email']){
                if(array_key_exists('password', $fields)){
                    if($usr->password == $fields['password']){
                        $user = $usr;
                        break;
                    }
                }
                else{
                    $user = $usr;
                    break;
                }
            }
        }
        return $user;
    }

    public function saveUserTo_SESSION($user)
    {
        $_SESSION['login'] = $user->email;
        $_SESSION['password'] = $user->password;
        $_SESSION['firstName'] = $user->name;
        $_SESSION['lastName'] = $user->surname;
        $_SESSION['middleName'] = $user->middleName;

        $_SESSION['fio'] = $user->surname . " " .
            mb_substr($user->name, 0, 1) . "." .
            mb_substr($user->middleName, 0, 1) . ".";
    }

    public function signInUser($name, $surname, $middleName, $email, $password)
    {
        $record = new UsersTable();
        $record->name = $name;
        $record->surname = $surname;
        $record->middleName = $middleName;
        $record->email = $email;
        $record->password = $password;

        $record->insert();
    }

    public function removeUserFrom_SESSION()
    {
        session_destroy();
    }

    public function saveAdminTo_SESSION()
    {
        $registry = Registry::getInstance();
        $_SESSION['login'] = $registry['adminLogin'];
        $_SESSION['password'] = $registry['adminPassword'];
        $_SESSION['fio'] = 'Админ';
    }
}