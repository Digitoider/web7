<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 07.05.2017
 * Time: 21:25
 */
class View{
    public function __construct(){

    }

    public function render($name, $includeHeader = true, $includeFooter = true){
        if($includeHeader){
            require_once "views/includes/header.php";
        }

        require_once 'views/' . $name . '.php';

        if($includeFooter){
            require_once 'views/includes/footer.php';
        }
    }
}