<?php
class GuestBook_controller extends Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view->render('guestbook');
    }

    public function checkForm()
    {
        $surname = $name = $middleName = $email = $content = '';

        if(isset($_POST['surname'])){
            $surname = $_POST['surname'];
        }
        if(isset($_POST['name'])){
            $name = $_POST['name'];
        }
        if(isset($_POST['middleName'])){
            $middleName = $_POST['middleName'];
        }
        if(isset($_POST['email'])){
            $email = $_POST['email'];
        }
        if(isset($_POST['content'])){
            $content = $_POST['content'];
        }

        require_once 'libs/FormValidator.php';
        $testFormValidator = new FormValidator();
        $testFormValidator->setRule("surname", "isEmpty");
        $testFormValidator->setRule("name", "isEmpty");
        $testFormValidator->setRule("middleName", "isEmpty");
        $testFormValidator->setRule("email", "isEmpty");
        $testFormValidator->setRule("content", "isEmpty");

        $testFormValidator->validate( array('surname' => $surname,
                                            'name' => $name,
                                            'middleName' => $middleName,
                                            'email' => $email,
                                            'content' => $content));
        $errors = $testFormValidator->getErrors();
        if(count($errors) == 0){
            //TODO save data to file 'massages.inc'
        }

        return $errors;
    }
}