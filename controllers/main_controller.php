<?php

/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 07.05.2017
 * Time: 22:02
 */
class Main_controller extends Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view->render('main');
    }

}