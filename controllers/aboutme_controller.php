<?php

/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 08.05.2017
 * Time: 11:08
 */
class Aboutme_controller extends Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view->render('aboutme');
    }
}