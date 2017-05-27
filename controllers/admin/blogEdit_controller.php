<?php

/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 21.05.2017
 * Time: 12:57
 */
require_once 'libs/ActiveRecord.php';
require_once 'models/BlogTable.php';
class BlogEdit_controller extends Controller
{
    private $subject = '';
    private $content = '';
    private $imageType = '';

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view->render('blogEdit');
    }

    public function checkForm()
    {
        if(isset($_POST['subject'])){
            $this->subject = $_POST['subject'];
        }
        if(isset($_POST['content'])){
            $this->content = $_POST['content'];
        }
        if(isset($_FILES['image'])){
            $this->imageType = $_FILES['image']['type'];
        }

        require_once 'libs/FormValidator.php';
        $formValidator = new FormValidator();
        $formValidator->setRule("subject", "isEmpty");
        $formValidator->setRule("content", "isEmpty");
        if($this->imageType != ''){
            $formValidator->setRule("image", "isImage");
        }

        $validatorParams = ['subject' => $this->subject, 'content' => $this->content];
        if($this->imageType != ''){
            $validatorParams['image'] = $this->imageType;
        }

        $formValidator->validate($validatorParams);
        $errors = $formValidator->getErrors();

        return $errors;
    }

    public function save()
    {
        $record = new BlogTable();
        $record->subject = $this->subject;
        $record->content = $this->content;
        $record->savingDateTime = date("Y-m-d H:i:s");

        $record->insert();

        if($this->imageType != ''){
            require_once 'models/Blog_model.php';
            $blogModel = new Blog_model();
            $imagePath = $blogModel->saveImage($record->id);
            if($imagePath != "error"){
                $record->imagePath = $imagePath;
                $record->update();
            }else{
                return false;
            }
        }
        return true;
    }

    public function getPostsAmount()
    {
        return BlogTable::count();
    }

    public function getPosts($start, $amount)
    {
        return BlogTable::getAll('savingDateTime', $start, $amount);
    }

}