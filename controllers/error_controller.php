<?php

/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 07.05.2017
 * Time: 22:05
 */
class Error_controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        //echo 'Ошибка! Страницы не существует';
    }

    public function index(){
        $this->view->render('error');
    }

}