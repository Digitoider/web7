<?php

/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 14.05.2017
 * Time: 0:51
 */
class LoadMessages_controller extends Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view->render('loadmessages');
    }
}