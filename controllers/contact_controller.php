<?php

/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 08.05.2017
 * Time: 11:08
 */
class Contact_controller extends Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view->render('contact');
    }

    public function checkForm()
    {
        require_once "libs/FormValidator.php";

        $fio = $birthDate = $age = $sex = $telephone = $email = '';

        if(isset($_POST['FIO'])){
            $FIO = $_POST['FIO'];
        }
        if(isset($_POST['optionsRadios'])){
            $sex = $_POST['optionsRadios'];
        }
        if(isset($_POST['age'])){
            $age = $_POST['age'];
        }
        if(isset($_POST['telephone'])){
            $telephone = $_POST['telephone'];
        }
        if(isset($_POST['email'])){
            $email = $_POST['email'];
        }

        $formValidator = new FormValidator();


        $formValidator->setRule("FIO", "isEmpty");
        $formValidator->setRule("sex", "isEmpty");
        $formValidator->setRule("telephone", "isEmpty");
        $formValidator->setRule("telephone", "isInteger");
// протокол HTTP
// интерфейс CGI

        $formValidator->validate(array("FIO" => $FIO, "sex" => $sex, "telephone" => $telephone));
        return $formValidator->getErrors();
    }
}


