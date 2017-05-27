<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 07.05.2017
 * Time: 19:26
 */
require_once 'libs/View.php';
require_once 'libs/Controller.php';
require_once 'libs/Bootstrap.php';
require_once 'libs/Registry.php';
require_once 'libs/Browser.php';
$registry = Registry::getInstance();

session_start();

$app = new Bootstrap();