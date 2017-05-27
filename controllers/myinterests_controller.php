<?php

/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 08.05.2017
 * Time: 11:10
 */
class Myinterests_controller extends Controller
{
    private $model;

    public function __construct(){
        parent::__construct();
        $this->model = new Myinterests_model();
    }

    public function index(){
        $this->view->render('myinterests');
    }

    public function getMyInterests($interestType)
    {
        switch($interestType){
            case "hobby": return $this->model->getHobbies();
            case "books": return $this->model->getBooks();
            case "music": return $this->model->getMusic();
            case "movies": return $this->model->getMovies();
        }
    }
}