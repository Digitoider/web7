<?php

/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 21.05.2017
 * Time: 14:33
 */
require_once "libs/ActiveRecord.php";
class BlogTable extends ActiveRecord
{
    public static $table = 'blog';
}