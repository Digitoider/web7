<?php

/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 23.05.2017
 * Time: 14:12
 */
require_once 'models/VisitorsTable.php';
class Visitors_model
{

    public function saveVisitor()
    {
        $record = new VisitorsTable();
        $record->ip = filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP);
        $record->browser = (new Browser())->getBrowser();
        $record->page = Registry::getInstance()['page'];
        $record->visitedAt = date("Y-m-d H:i:s");

        $record->insert();
    }
}