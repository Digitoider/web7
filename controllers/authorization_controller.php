<?php

/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 22.05.2017
 * Time: 20:21
 */
class Authorization_controller extends Controller
{
    private $authorization_model;
    public function __construct(){
        parent::__construct();
        $this->authorization_model = new Authorization_model();
    }

    public function index(){
        $this->view->render('authorization/authorization');
    }

    public function checkUser($email, $password='')
    {
        if($password == ''){
            return $this->authorization_model->checkUser(['email' => $email]);
        }
        return $this->authorization_model->checkUser(['email' => $email, 'password' => $password]);
    }

    public function saveUserTo_SESSION($user)
    {
        $this->authorization_model->saveUserTo_SESSION($user);
    }

    public function signInUser($name, $surname, $middleName, $email, $password)
    {
        $this->authorization_model->signInUser($name, $surname, $middleName, $email, $password);
    }

    public function validateRegistrationForm($surname, $name, $middleName, $email, $password)
    {
        require_once 'libs/FormValidator.php';
        $formValidator = new FormValidator();
        $formValidator->setRule("surname", "isEmpty");
        $formValidator->setRule("name", "isEmpty");
        $formValidator->setRule("middleName", "isEmpty");
        $formValidator->setRule("email", "isEmpty");
        $formValidator->setRule("password", "isEmpty");

        $formValidator->validate( array('surname' => $surname,
            'name' => $name,
            'middleName' => $middleName,
            'email' => $email,
            'password' => $password));

        return $formValidator->getErrors();
    }

    public function removeUserFrom_SESSION()
    {
        $this->authorization_model->removeUserFrom_SESSION();
    }

    public function saveAdminTo_SESSION()
    {
        $this->authorization_model->saveAdminTo_SESSION();
    }
}