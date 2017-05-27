<?php

/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 15.05.2017
 * Time: 11:07
 */
require_once "libs/ActiveRecord.php";
class TestTable extends ActiveRecord
{
    public static $table = 'test';
}