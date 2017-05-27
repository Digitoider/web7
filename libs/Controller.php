<?php

/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 07.05.2017
 * Time: 21:33
 */
class Controller
{
    public $view;

    public function __construct(){
        $this->view = new View();
    }
}