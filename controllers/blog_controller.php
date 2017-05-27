<?php

/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 22.05.2017
 * Time: 12:37
 */
class Blog_controller extends Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view->render('blog');
    }
}