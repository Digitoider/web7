<?php

/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 08.05.2017
 * Time: 11:11
 */
class Photoalbum_controller extends Controller
{
    private $model;

    public function __construct(){
        parent::__construct();
        $this->model = new Photoalbum_model();
    }

    public function index(){
        $this->view->render('photoalbum');
    }

    public function getPhotosPaths()
    {
        return $this->model->getPhotosPaths();
    }
}