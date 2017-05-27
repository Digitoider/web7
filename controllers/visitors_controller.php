<?php

/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 23.05.2017
 * Time: 12:58
 */
class Visitors_controller extends Controller// ????????
{
    private $visitorsModel;
    public function __construct(){
        parent::__construct();
        $this->visitorsModel = new Visitors_model();
    }

    public function index(){
        $this->view->render('aboutme');
    }

    public function saveVisitor()
    {
        $this->visitorsModel->saveVisitor();
    }
}