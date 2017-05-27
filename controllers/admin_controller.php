<?php

/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 23.05.2017
 * Time: 0:27
 */
class Admin_controller extends Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $includeHeader = $includeFooter = false;
        $this->view->render('admin/admin', $includeHeader, $includeFooter);
    }

    public function getVisitorsAmount()
    {
        return VisitorsTable::count();
    }

    public function getVisitors($start, $amount)
    {
        return VisitorsTable::getAll('visitedAt', $start, $amount);
    }
}